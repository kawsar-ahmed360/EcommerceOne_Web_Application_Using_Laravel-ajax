@extends('backend/master')

@section('content')

  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Size Name View <button onclick="add_size()" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add Size</button></h4>
                                  

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>Sl</th>
                                                <th>Size Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="size_show">
 
                                               @include('backend/size/view_ajax')
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                         @include('backend/size/modal/add_size')
                         @include('backend/size/modal/edite')

@endsection


@section('footer')

<script type="text/javascript">
 function add_size(){

  $('#size_add').modal('show');
 }
 $('#sizeAdd').submit(function(e){
  e.preventDefault();

  var url = $('#sizeAdd').attr('action');
  var method = $('#sizeAdd').attr('method');
  var data = $('#sizeAdd').serialize();
$('#size_add').modal('hide');

  if (url && method && data) {
   
    $.ajax({
      url:url,
      type:method,
      data:data,

      success:function(data){

        $('#size_show').empty().html(data);
      }
    });

  }else{

    alert('url or method or data not found');
  }

 });

 function active(SizeId){

  var alrm = "If you want to active this item,press ok";

  if (confirm(alrm)) {
    $.ajax({
      url:"{{ route('SizeActive') }}",
      type:"GET",
      data:{SizeId:SizeId},

      success:function(data){

         $('#size_show').empty().html(data);
      }
    });
  }
 }

 function deactive(SizeId){

  var alrm = "If you want to Deactive This item,press ok";
  if (confirm(alrm)) {
       
       $.ajax({
        url:"{{ route('SizeDeactive') }}",
        type:"GET",
        data:{SizeId:SizeId},

        success:function(data){

          $('#size_show').empty().html(data);
        }
       });
  }
 }

 function del(SizeId){

   var alrm = "If you want to delete this item,press ok";

   if (confirm(alrm)) {
    $.ajax({
      url:"{{ route('SizeDelete') }}",
      type:"GET",
      data:{SizeId:SizeId},

      success:function(data){
        
         $('#size_show').empty().html(data);

      }
    });
   }
 }

 function edite(SizeId,SizeName){

  $('#size_Edite').modal('show');
  $('#size_Edite').find('#size_name').val(SizeName);
  $('#size_Edite').find('#SiseId').val(SizeId);
 }

$('#EditeSize').submit(function(e){
  e.preventDefault();
  var url = $('#EditeSize').attr('action');
  var method = $('#EditeSize').attr('method');
  var data = $('#EditeSize').serialize();

    $('#size_Edite').modal('hide');

  $.ajax({
    url:url,
    type:method,
    data:data,

    success:function(data){

       $('#size_show').empty().html(data);
    }
  });
});
 </script>

@endsection