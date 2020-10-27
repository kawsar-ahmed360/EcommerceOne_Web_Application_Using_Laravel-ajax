@extends('backend/master')

@section('content')

  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Product View <a href="{!! route('ProductAdd') !!}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add Product</a></h4>
                                  

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>Sl</th>
                                                <th>Product Name</th>
                                                <th>Categroy Name</th>
                                                <th>Subcategory Name</th>
                                                <th>Brand</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="color_show">
                                              @php($sl=1)

                                              @foreach($product as $p)
                                                  <tr align="center">
                                                    <td>{{ $sl++ }}</td>
                                                    <td>{!! $p->product_name !!}</td>
                                                    <td>{!! $p->category_name !!}</td>
                                                    <td>{!! $p->sub_category !!}</td>
                                                    <td>{!! $p->brand_name !!}</td>
                                                    <td>{!! $p->price !!} $</td>
                                                    <td><img src="{!! url('backend/product_image/'.$p->image) !!}" width="70px" style="border-radius: 20px" alt=""></td>
                                                    <td>
                                                      <a href="{{ route('ProductEdite',$p->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                      <a href="{{ route('ProductDelete',$p->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                      <a href="{{ route('ProductEye',$p->id) }}" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                  </tr>
                                              @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        

@endsection


@section('footer')


@endsection