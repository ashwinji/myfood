@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title ">Purchase Indent</h3>
             <div class="card-options">
                <a class="btn btn-sm btn-outline-primary" href="javascript:void(0)" id="createNewPurchase"> Create Purchase Item</a>
                &nbsp;&nbsp;&nbsp;<a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-primary"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Go To Back"><i class="fa fa-mail-reply"></i></a>
            </div>
         </div>

        <div class="card-body">
            <div class="table-responsive">

                <!-- <table id="example" class="table table-striped table-bordered w-100"> -->
                   <table class="table table-striped table-bordered w-100" id="example">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Indent Date</th>                  
                            <th scope="col">Complete Date</th>              
                            <th scope="col" width="15%">Action</th>
                        </tr>
                    </thead>
                <tbody>
            </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="purchaseForm" name="purchaseForm" class="form-horizontal" method="post">
                   <input type="hidden" name="id" id="indent_id">
                    <div class="form-group">
                        <div class="col-sm-6">
                          <strong>Purchase Indent date</strong>
                            <select name="indent_date" id="indent_datee" class="form-control" required>
                          <option value="">--Select Date--</option>
                          @if($purchaseindent->count()>0)
                         @foreach($purchaseindent as $getpurchaseindent)
                          <option value="{{$getpurchaseindent->id}}">{{$getpurchaseindent->indent_date}}
                        </option>
                         @endforeach
                         @endif
                        </select>
                        </div>
                      </div>

                    <table class="table" id="dynamic_field">  
                    <tr> 
                       <td width="25%"><select name="raw_material" id="raw_material" class="form-control name_list"><option value="">--Select Item--</option>
                        @if($rawmaterialmaster->count()>0)
                         @foreach($rawmaterialmaster as $getrawmaterialmaster)
                        <option value="{{$getrawmaterialmaster->id}}">{{$getrawmaterialmaster->item_name}}
                        @endforeach
                        @endif
                        </option>           
                        </select></td>
                        <td width="25%"> <select name="unit" id ="unit" class="form-control" required><option value="">--Select Child--</option></td> 
                         <td><input type="number" name="price" id="price" placeholder="Item Price" min="1" class="form-control name_list" step="any"/></td>
                         <td><input type="number" name="required_qty" id="required_qty" placeholder="Required Qty" min="1" class="form-control name_list" step="any"/></td>
                         <td><input type="number" name="accept_qty" id="accept_qty" placeholder="Accept qty" min="1" class="form-control name_list" step="any"/></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></button></td>  
                    </tr>  
                 </table>

                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="Submit" class="btn btn-primary" id="saveBtn" value="create">Save
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 <!-- Modal for Show Section -->

 <div class="modal fade" id="showModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeadingg"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="purchaseForm" name="purchaseForm" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                          <strong>Indent date</strong>
                            <input type="date" class="form-control" id="indent_date" name="indent_date" placeholder="Enter Date" value="" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                          <strong>Status</strong>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Enter Date" value="" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                          <strong>Indent Complete Date</strong>
                            <input type="date" class="form-control" id="indent_complete" name="indent_complete" placeholder="Enter Date" value="" readonly>
                        </div>
                    </div>

     
                    <div class="form-group">
                        <div class="col-sm-12">
                          <strong>Remark</strong>
                            <textarea id="remark" name="remark" placeholder="Enter Remark" class="form-control" cols="40" rows="5" readonly></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
 <script type="text/javascript">
  $(function () {
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
   
   var table = $('#example').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin-purchaseindent.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'indent_date', name: 'indent_date'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    $('#createNewPurchase').click(function () {
        $('#saveBtn').val("create-product");
        $('#indent_id').val('');
        $('#purchaseForm').trigger("reset");
        $('#modelHeading').html("Manage Purchase Indent");
        $('#ajaxModel').modal('show');
        //$('#indent_datee').validate(true);
        //$('#remarkk').validate(true);
    });
    
    $('body').on('click', '.editProduct', function () {
      var product_id = $(this).data('id');
      $.get("{{ route('admin-purchaseindent.index') }}" +'/' + product_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Purchase Indent");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#indent_id').val(data.id);
          $('#indent_datee').val(data.indent_date);
          $('#remarkk').val(data.remark);
      })
   });

   /**/
     $('#saveBtn').click(function (e) {
      
      e.preventDefault();
        
        $(this).html('Save');
       
        $.ajax({
          data: $('#purchaseForm').serialize(),
          url: "{{ route('admin-purchaseindent.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              //alert(data);
              $('#purchaseForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save');
          }
      });
    });
    
      $('body').on('click', '.deleteProduct', function () {
     
        var product_id = $(this).data("id");
        if (confirm("Are You Sure You Want To Delete!") == true) {

        $.ajax({
            type: "DELETE",
            url: "{{ route('admin-purchaseindent.store') }}"+'/'+product_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
      }
    });

      $('body').on('click', '.showProduct', function () {
      var product_id = $(this).data('id');
      $.get("{{ route('admin-purchaseindent.index') }}" +'/' + product_id, function (data) {
          $('#modelHeadingg').html("Purchase Indent");
          $('#showModel').modal('show');
          $('#indent_date').val(data.indent_date);
          $('#status').val(data.status);
          $('#indent_complete').val(data.indent_complete);
          $('#remark').val(data.remark);
      })
   });
     
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){  
      var i=1;  
     $('#add').click(function(){  
      i++;  
    $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td width="25%"><select name="raw_material" id="raw_material" class="form-control name_list"><option value="">--Select Item--</option>@if($rawmaterialmaster->count()>0)@foreach($rawmaterialmaster as $getrawmaterialmaster)<option value="{{$getrawmaterialmaster->id}}">{{$getrawmaterialmaster->item_name}}@endforeach @endif</option></select></td><td><input type="text" name="unit" id="unit" placeholder="Unit" class="form-control name_list" readonly/></td><td><input type="number" name="price" id="price" placeholder="Item Price" class="form-control name_list" step="any"/></td><td><input type="number" name="required_qty" id="required_qty" placeholder="Required Qty" class="form-control name_list" step="any"/></td><td><input type="number" name="accept_qty" id="accept_qty" placeholder="Accept qty" class="form-control name_list" step="any"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btm-sm">X</button></td></tr>');  
      });  
       $(document).on('click','.btm-sm', function(){  
       var button_id = $(this).attr("id");   
       $('#row'+button_id+'').remove();
      });
      });
   </script>
  <script>
   $(document).ready(function(){
   $('#raw_material').change(function(){
    var menu = $(this).val();    
    if(menu){
        $.ajax({
           type:"GET",
           url:"{{ route('data')}}?raw_material="+menu,
           success:function(res){               
            if(res){
                $("#unit").empty();
                $("#unit").append('<option>--Select Unit--</option>');
                $.each(res,function(key,value){
                    $("#unit").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#unit").empty();
            }
           }
        });
    }      
   });
});
 </script>

