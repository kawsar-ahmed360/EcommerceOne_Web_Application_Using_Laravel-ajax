@extends('backend/master')

@section('content')

  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title text-center" style="margin:0px;padding:0px">New Shop Ecommerce </h4>
                                                  <span style="margin-left: 43%">Mobile: 018947384343</span> <br>
                                                  <span style="margin-left: 42%">Address: Dhaka,Bangladesh</span>

                                         <table width="100%">
                                           <thead>
                                             <tr>
                                               <th width="30%">
                                                 <h6 style="text-decoration: underline;">Customer Info:</h6>
                                                 <span><strong>Name</strong>: {{ $ord['0']->fname }}</span> <br>
                                                 <span><strong>Mobile</strong>: {{ $ord['0']->mobile }}</span><br>
                                                 <span><strong>Email</strong>: {{ $ord['0']->email }}</span><br>
                                                 <span><strong>Address</strong>: {{ $ord['0']->address }}</span>

                                               </th>
                                               <th width="40%"></th>
                                               <th style="" width="30%">
                                                 <h6 style="text-decoration: underline;">Shipping Onfo:</h6>
                                                <span><strong>Order Date</strong>: {{ $ord['0']->created_at }}</span> <br>
                                                 <span><strong>Mobile</strong>: {{ $ord['0']->mobile }}</span><br>
                                                 {{-- <span><strong>Email</strong>: {{ $ord['0']->email }}</span><br> --}}
                                                 <span><strong>Address</strong>: {{ $ord['0']->address }}</span>
                                               </th>
                                             </tr>
                                           </thead>
                                           
                                         </table>
                                  

                                        <table id="" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>Sl</th>
                                                <th>Product Name</th>
                                                <th>Product Price</th>
                                                <th>Product Qty</th>
                                                <th>Product Color</th>
                                                <th>Product size</th>
                                            {{--     <th>Tax</th>
                                                <th>Subtotal</th> --}}
                                                <th>Image</th>
                                                
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                            </thead>


                                            <tbody id="color_show">

                                            @php($sl=1) 
                                               @foreach($details as $d)
                                                 <tr style="text-align: center">
                                                   <td>{{ $sl++ }}</td>
                                                   <td>{{ $d->product_name }}</td>
                                                   <td>{{ $d->product_price }}</td>
                                                   <td>{{ $d->product_qty }}</td>
                                                   <td>{{ $d->color_name }}</td>
                                                   <td>{{ $d->size_name }}</td>
                                                   <td><img src="{{ url('backend/product_image/'.$d->image) }}" width="50px" alt=""></td>
                                                  
                                                 </tr>
                                               @endforeach

                                               <tr>
                                                 <td colspan="7" style="text-align: center;font-size: 20px"><span style="color:red">Pyament Method :</span> {{ $d->payment }}</td>
                                               </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
{{-- 
                         @include('backend/color/modal/add_color')
                         @include('backend/color/modal/edite') --}}

@endsection


@section('footer')


@endsection