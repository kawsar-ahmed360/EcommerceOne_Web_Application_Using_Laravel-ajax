

  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                      

                                         <table width="100%">
                                           <thead>
                                             <tr>
                                             	<td width="30%"></td>
                                             	<td width="30%">
                                             		  <h4 class="card-title text-center" style="margin:0px;padding:0px">New Shop Ecommerce </h4>
                                                  <span style="margin-left: 43%">Mobile: 018947384343</span> <br>
                                                  <span style="margin-left: 42%">Address: Dhaka,Bangladesh</span>

                                             	</td>
                                             	<td width="30%"></td>
                                             	<td></td>
                                             	<td></td>
                                             </tr>

                                             <tr>
                                               <td width="40%">
                                                 <h4 style="text-decoration: underline;">Customer Info:</h4>
                                                 <span>Name: {{ $ord['0']->fname }}</span> <br>
                                                 <span>Mobile: {{ $ord['0']->mobile }}</span><br>
                                                 <span>Email: {{ $ord['0']->email }}</span>
                                                 <span>Address: {{ $ord['0']->address }}</span>

                                               </td>
                                               <td width="30%"></td>
                                               <td style="" width="40%">
                                                 <h4 style="text-decoration: underline;">Shipping Onfo:</h4>
                                                <span><strong>Order Date</strong>: {{ $ord['0']->created_at }}</span> <br>
                                                 <span><strong>Mobile</strong>: {{ $ord['0']->mobile }}</span><br>
                                                 {{-- <span><strong>Email</strong>: {{ $ord['0']->email }}</span><br> --}}
                                                 <span><strong>Address</strong>: {{ $ord['0']->address }}</span>
                                               </td>
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

                                        <hr>

                                        <table width="100%">
                                        	<thead>
                                        		<tr>
                                        			<td width="35%"><i>Printing Time : {{ date('d-M-Y') }}</i></td>
                                        			<td width="75%"></td>
                                        			
                                        		</tr>
                                        	</thead>
                                        
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
{{-- 
                         @include('backend/color/modal/add_color')
                         @include('backend/color/modal/edite') --}}

