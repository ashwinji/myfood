$(document).ready(function(){




	});



function gettheunit(ingredientid,incrementnumber)
{

	$.ajax({
        type: "POST",
        url: appurl+'gettheunit',  
        data:'itemid='+ingredientid,
        success: function(data){
        	 //alert(data);
            //$splt = data.split('_');
             $("#unitname"+incrementnumber).html(data);
             // $("#unitname"+incrementnumber).html($splt[0]);
            //$("#price"+incrementnumber).val($splt[1]);

        }
        });

    
}



//////////this is for meal and recipe connection

$(document).on("click", "#takemealinfoid", function () {
 // $('#fillDetailsaccess').hide();
 // $('.loading').show();

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


////////////////////taskassignview new change


