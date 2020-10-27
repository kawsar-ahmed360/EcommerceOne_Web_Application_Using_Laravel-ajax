@extends('backend/master')

@section('content')

  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Color Name View <button onclick="add_color()" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add Color</button></h4>
                                  

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>Sl</th>
                                                <th>Color Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="color_show">
 
                                               @include('backend/color/view_ajax')
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                         @include('backend/color/modal/add_color')
                         @include('backend/color/modal/edite')

@endsection


@section('footer')

<script type="text/javascript">
  function add_color(){

    $('#color_add').modal('show');
  }

  $('#ColorAdd').submit(function(e){
    e.preventDefault();

    var url = $('#ColorAdd').attr('action');
    var method = $('#ColorAdd').attr('method');
    var data = $('#ColorAdd').serialize();


    $('#color_add').modal('hide');

    if (url && method && data) {

      $.ajax({
        url:url,
        type:method,
        data:data,

        success:function(data){

          $('#color_show').empty().html(data);
        }
      });

    }else{

      alert('url or method or data not found!!!!!!!!!!');
    }

  });

  function active(ColorId){
    var alrm = "if you want to active this item,press ok";
    if (confirm(alrm)) {

       $.ajax({
        url:"{{ route('ColorActive') }}",
        type:"GET",
        data:{ColorId:ColorId},

        success:function(data){

          $('#color_show').empty().html(data);

        }
       });
    }
  }

  function deactive(ColorId){

    var alrm = "If You Want to deactive this item,press ok";

    if (confirm(alrm)) {
    $.ajax({
       url:"{{ route('ColorDeactive') }}",
      type:"GET",
      data:{ColorId:ColorId},
      success:function(data){

         $('#color_show').empty().html(data);
      }
    });
      
    }
  }

  function del(ColorId){
 var alrm ="If you want to delete this items,press ok";

 if (confirm(alrm)) {
  $.ajax({
    url:"{{ route('ColorDelete') }}",
    type:"GET",
    data:{ColorId:ColorId},

    success:function(data){
 
    $('#color_show').empty().html(data);
    }
  });
 }
  }

  function edite(ColorId,ColorName){

    $('#color_edite').modal('show');
    $('#color_edite').find('#color_name').val(ColorName);
    $('#color_edite').find('#ColorId').val(ColorId);
  }

  $('#ColorEdi').submit(function(e){
    e.preventDefault();

    var url = $('#ColorEdi').attr('action');
    var method = $('#ColorEdi').attr('method');
    var data = $('#ColorEdi').serialize();

     $('#color_edite').modal('hide');

     $.ajax({
      url:url,
      type:method,
      data:data,
      success:function(data){
        $('#color_show').empty().html(data);
      }
     });
  });
</script>

@endsection