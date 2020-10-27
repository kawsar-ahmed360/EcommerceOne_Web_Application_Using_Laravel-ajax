@extends('backend/master')

@section('content')

  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Brand Name View <button onclick="add_brand()" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add Brand</button></h4>
                                  

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>Sl</th>
                                                <th>Brand Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="brand_show">
 
                                               @include('backend/brands/view_ajax')
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                         @include('backend/brands/modal/add_brand')
                         @include('backend/brands/modal/edite')

@endsection


@section('footer')


<script type="text/javascript">

function add_brand(){

  $('#brand_add').modal('show');
}

$('#BrandAdd').submit(function(e){
  e.preventDefault();

  var url = $('#BrandAdd').attr('action');
  var method = $('#BrandAdd').attr('method');
  var data = $('#BrandAdd').serialize();

  $('#brand_add').modal('hide');

  if (url && method && data) {
     $.ajax({
      url:url,
      type:method,
      data:data,

      success:function(data){

        $('#brand_show').empty().html(data);
      }
     });
  }else{

    alert('url or method or data not found!!!please check this');
  }
});

function active(brandId){

  var arlm = "If You Want to active this item";

  if (confirm(arlm)) {

  $.ajax({
    url:"{{ route('BrandActive') }}",
    type:"GET",
    data:{brandId:brandId},
    success:function(data){

     $('#brand_show').empty().html(data); 
    }
  });


  }
}

function deactive(brandId){

  var alrm = "If you want to deactive this item,press ok";

  if (confirm(alrm)) {

    $.ajax({
      url:"{{ route('BrandDeactive') }}",
      type:"GET",
      data:{brandId:brandId},

      success:function(data){

       $('#brand_show').empty().html(data); 
      }
    });
  } 
}	

function Del(brandId){

  var arlm = "If You Want to delete this items press ok";

  if (confirm(arlm)) {

    $.ajax({
      url:"{{ route('BrandDelete') }}",
      type:"GET",
      data:{brandId:brandId},
      success:function(data){

        $('#brand_show').empty().html(data); 
      }
    });
  }
}

function edite(brandId,BrandName){

  $('#brand_edite').modal('show');
  $('#brand_edite').find('#brand_name').val(BrandName);
  $('#brand_edite').find('#BrandId').val(brandId);
}

$('#BrandEdite').submit(function(e){
  e.preventDefault();
  var url = $('#BrandEdite').attr('action');
  var method = $('#BrandEdite').attr('method');
  var data = $('#BrandEdite').serialize();
 $('#brand_edite').modal('hide');

  $.ajax({

    url:url,
    type:method,
    data:data,
    success:function(data){

      $('#brand_show').empty().html(data); 
    }
  });

});

</script>

@endsection