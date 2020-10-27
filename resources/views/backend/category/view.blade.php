@extends('backend/master')

@section('content')

  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Category Nmae <button onclick="add_cat()" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add Cateogry</button></h4>
                                  

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>Sl</th>
                                                <th>Category Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="category_show">
 
                                               @include('backend/category/view_ajax')
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                         @include('backend/category/modal/add_category')
                         @include('backend/category/modal/edite')

@endsection


@section('footer')


<script type="text/javascript">
	
function add_cat(){

	$('#cat_add').modal('show');
}

$('#CatAdd').submit(function(e){
	e.preventDefault();

	var url = $('#CatAdd').attr('action');
	var method = $('#CatAdd').attr('method');
	var data = $('#CatAdd').serialize();

	// alert(data);

	$('#cat_add').modal('hide');

	if (url && method && data) {
     
     $.ajax({
       url:url,
       type:method,
       data:data,
       
       success:function(data){

       	$('#category_show').empty().html(data);
       }  

	 });

	}else{

		alert('url or method or data is null please check this');
	}

	
});

function active(CatId){

	var alrm = "If You Want To Actve This Items";

	if (confirm(alrm)) {

		$.ajax({
			url:"{{ route('CategoryActive') }}",
			type:"GET",
			data:{CatId:CatId},

			success:function(data){

				$('#category_show').empty().html(data);
			}
		});
	}
}

function deactive(CatId){

  var alrm = "If You Want To Deactive This Item";

  if (confirm(alrm)) {

     $.ajax({
      url:"{{ route('CategoryDeactive') }}",
      type:"GET",
      data:{CatId:CatId},

      success:function(data){
        
        $('#category_show').empty().html(data);

      }
     });
  }
}

function del(CatId){

  var alrm = "If You Want to Delete This Item";

  if (confirm(alrm)) {

    $.ajax({
      url:"{{ route('CategoryDelete') }}",
      type:"GET",
      data:{CatId:CatId},

      success:function(data){
       
       $('#category_show').empty().html(data);

      }
    });
  }
}

function edite(CatId,CategoryName){

  $('#cat_edite').modal('show');
  $('#cat_edite').find('#category_name').val(CategoryName);
  $('#cat_edite').find('#CateoryId').val(CatId);

}

$('#CatEdite').submit(function(e){
  e.preventDefault();

  var url = $('#CatEdite').attr('action');
  var method = $('#CatEdite').attr('method');
  var data = $('#CatEdite').serialize();

    $('#cat_edite').modal('hide');

    $.ajax({
      url:url,
      type:method,
      data:data,

      success:function(data){

        $('#category_show').empty().html(data);
      }
    });

});

</script>

@endsection