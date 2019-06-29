$(document).ready(function(){




	});



function gettheunit(ingredientid,incrementnumber)
{

	$.ajax({
        type: "POST",
        url: appurl+'gettheunit',  
        data:'itemid='+ingredientid,
        success: function(data){
        	 
             $("#unitname"+incrementnumber).html(data);
       

        }
        });

    
}



//////////this is for meal and recipe connection

$(document).on("click", "#takemealinfoid", function () {


  var id = $(this).data('id');
  // alert(id);
  $.ajax({
    url: appurl+"admin/getmealinfofillform",
    type: 'POST',
    data:"id="+id,
    success:function(info){
    
      $('#fillmealinfo').html(info);
      $('#fillmealinfo').show();

    }
  });
});



$(document).on("click", "#takemealinfoid2", function () {
 
  var id = $(this).data('id');
   // alert(id);
  $.ajax({
    url: appurl+"admin/getmealinfofillform",
    type: 'POST',
    data:"id="+id,
    success:function(info){
    
      $('#fillmealinfo').html(info);
      $('#fillmealinfo').show();

    }
  });
});


///////////////////////Task asssign info
$(document).on("click", "#taskassigninfoid", function () {

  var id = $(this).data('id');
  // alert(id);
  $.ajax({
    url: appurl+"admin/gettaskassignfillform",
    type: 'POST',
    data:"id="+id,
    success:function(info){
    
      $('#filltaskassigninfoinfo').html(info);
      $('#filltaskassigninfoinfo').show();

    }
  });
});


/////////////////////////////editing assigned tasks
function changingvalue(rowid)
{
  var textboxid = rowid;
   $('#'+textboxid).attr('readonly', false);
   $('#'+textboxid).addClass('editingtextbox');

   
  
}

/////////////////now deducting the stock////////////////////////
function deductthestock(taskassignedcheckbox)
{
      
        var result = taskassignedcheckbox.checked ? "checked" : "unchecked";
        var taskassignedmasterid = taskassignedcheckbox.id;
        //alert(taskassignedmasterid);
      
      if(result == 'checked')
      {
        $.ajax({
          url: appurl+"/deductthestockquantity",
          type: 'POST',
          data:"id="+taskassignedmasterid,
         success:function(info){
          alert(info);
            }
        });
      }
      else
      {
        // alert('stock is already deducted');

      }

}




  function checkequal(id)
{
  //alert(id);
   var completedqty = $('#comp'+id).val();
  var assignedqty = $('#assqty'+id).val();
 //alert("===="+assignedqty);
  if(parseInt(completedqty)<parseInt(assignedqty))
  {
    $('.reasontxtbox').css('display','block');
    $('#reason'+id).css('display','block');
    // $('#reason'+id).prop('required','true');

  }
  else
  {
     $('#reason'+id).css('display','none');
     // $('#reason'+id).prop('required','false');
  }

}