@extends('backend/master')

@section('content')

  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title" style="color:white">Product View Details <a href="{!! route('ProductAdd') !!}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add Product</a></h4>
                                  

                                         <div class="card">
                                            <div class="card-body">
                                                <div class="form-row">
                                                   <div class="form-group col-md-12">
                                                     <h3 style="color:white">Product Info:</h3>
                                                     <table style="color:white" class="table table-striped">
                                                     <thead>
                                                       <tr>
                                                         <th>Product Name</th>
                                                         <th>Category Name</th>
                                                         <th> Sub Category Name</th>
                                                         <th>Brand Name</th>
                                                         <th>Price</th>
                                                         <th>Quentity</th>
                                                         <th>Image</th>
                                                       </tr>
                                                     </thead>
                                                     <tbody>
                                                       <tr align="center">
                                                         <td>{{ $product_info['0']->product_name }}</td>
                                                         <td>{{ $product_info['0']->category_name }}</td>
                                                         <td>{{ $product_info['0']->sub_category }}</td>
                                                         <td>{{ $product_info['0']->brand_name }}</td>
                                                         <td>{{ $product_info['0']->price }} $</td>
                                                         <td>{{ $product_info['0']->quentity }} PEC</td>
                                                         <td><img src="{{ (@$product_info['0']->image)?url('backend/product_image/'.$product_info['0']->image):"" }}" width="60px" alt=""></td>
                                                       </tr>
                                                     </tbody>
                                                     </table>
                                                   </div>

                                                   <div class="form-group col-md-3">
                                                      <h4 style="color:white">Product Color: </h4>
                                                      <span style="color:red">@foreach($color as $c) {{ $c->color_name }} / @endforeach</span>
                                                   </div>

                                                   <div class="form-group col-md-3">
                                                      <h4 style="color:white">Product Size: </h4>
                                                      <span style="color:red">@foreach($size as $s) {{ $s->size_name }} / @endforeach</span>
                                                    
                                                   </div>

                                                   <div class="form-group col-md-3">
                                                      <h4 style="color:white">Product Gallary: </h4>
                                                      <span style="color:green">
                                                        
                                                      <span style="color:red">@foreach($gallery as $g) <img src="{{ (@$g->product_gallery)?url('backend/Gallery/'.$g->product_gallery):"" }}" width="60px" alt=""> @endforeach</span>

                                                      </span>
                                                   </div>

                                                   <div class="form-group col-md-12" style="color: white">
                                                      <h4 style="color:white">Product Summeary :</h4>
                                                      {{ $product_info['0']->summary }}
                                                   </div>


                                                   <div class="form-group col-md-12" style="color: white">
                                                      <h4 style="color:white">Product Deaciption :</h4>
                                                      {{ $product_info['0']->description }}
                                                   </div>

                                                   


                                                </div>
                                            </div>
                                         </div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        

@endsection


@section('footer')


@endsection