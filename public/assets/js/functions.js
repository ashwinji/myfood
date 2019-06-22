$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});

function changeAccountStatus(app_key)
{
	if($('.custom-switch-input').is(":checked")) 
	{
		var status = 'Active';
	} 
	else
  	{
  		var status = 'Inactive';
  	}
   $.ajax({
    type: "POST",
    url: appurl+"update-status",
    data:'cmbaction='+status+'&app_key='+app_key,
    success: function(data){
    	if(data['type']=='success')
    	{
    		toastr.success(data['message'], {timeOut: 5000})
    	}
    	else
    	{
    		toastr.error(data['message'], {timeOut: 5000})
    	}
    }
  });
}