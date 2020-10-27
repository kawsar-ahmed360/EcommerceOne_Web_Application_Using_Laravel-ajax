@extends('backend/master')

@section('content')

  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Category Nmae <button onclick="add_subcat()" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add SubCateogry</button></h4>
                                  

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>Sl</th>
                                                <th>Category Name</th>
                                                <th>SubCategory Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="subcategory_show">
 
                                               @include('backend/sub_category/view_ajax')
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                         @include('backend/sub_category/modal/add_subcategory')
                         @include('backend/sub_category/modal/edite')

@endsection


@section('footer')

<script type="text/javascript">
    function add_subcat(){
        $('#subcat_add').modal('show');
    }

    $('#SubCatAdd').submit(function(e){
        e.preventDefault();

        var url = $('#SubCatAdd').attr('action');
        var method = $('#SubCatAdd').attr('method');
        var data = $('#SubCatAdd').serialize();

         $('#subcat_add').modal('hide');

        if (url && method && data) {
         $.ajax({
            url:url,
            type:method,
            data:data,

            success:function(data){

                $('#subcategory_show').empty().html(data);
            }
         });
        }else{

            alert('url or data or method is null please check');
        }
    });

    function active(SubId){

        alrm = "if you want to active this item";

        if(confirm(alrm)) {

            $.ajax({
                url:"{{ route('SubCategoryActive') }}",
                type:"GET",
                data:{SubId:SubId},

                success:function(data){

                     $('#subcategory_show').empty().html(data);
                }
            });
        }
    }

    function deactive(SubId){

        var alrm = "If You Want to Deactive This item";

        if (confirm(alrm)) {

            $.ajax({
                url:"{{ route('SubCategoryDeactive') }}",
                type:"GET",
                data:{SubId:SubId},

                success:function(data){

                   $('#subcategory_show').empty().html(data); 
                }
            });
        }
    }

    function dele(SubId){
        var alrm = "If you want to delete this item,press ok";

        if (confirm(alrm)) {

            $.ajax({
                url:"{{ route('SubCategoryDelete') }}",
                type:"GET",
                data:{SubId:SubId},

                success:function(data){

                    $('#subcategory_show').empty().html(data); 
                }
            });
        }
    }

    function edite(SubId,CatId,SubcatName){

        $('#subcat_edite').modal('show');
        $('#subcat_edite').find('#category_id').val(CatId);
        $('#subcat_edite').find('#sub_category').val(SubcatName);
        $('#subcat_edite').find('#subId').val(SubId);
    }

    $('#SubCatEdite').submit(function(e){
        e.preventDefault();

        var url = $('#SubCatEdite').attr('action');
        var method = $('#SubCatEdite').attr('method');
        var data = $('#SubCatEdite').serialize();
        
           $('#subcat_edite').modal('hide');

           $.ajax({
            url:url,
            type:method,
            data:data,

            success:function(data){

                $('#subcategory_show').empty().html(data);  
            }
           });

    });
</script>

@endsection