@extends('backend/master')

@section('content')

  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Customer Order List View </h4>
                                  

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr align="center">
                                                <th>Sl</th>
                                                <th>Customer Name</th>
                                                <th>Customer Mobile</th>
                                                <th>Product Qty</th>
                                            {{--     <th>Tax</th>
                                                <th>Subtotal</th> --}}
                                                <th>Total Include</th>
                                                <th>Order Date</th>
                                                <th>Order Status</th>
                                                <th>Payment Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="color_show">

                                            @php($sl=1) 
                                               @foreach($order as $o)
                                                    <tr style="text-align: center">
                                                      <td>{{ $sl++ }}</td>
                                                      <td>{{ $o->fname.' '.$o->lname }}</td>
                                                      <td>{{ $o->mobile }}</td>
                                                      <td>{{ $o->total_qty }} Item</td>
                                                   {{--    <td>${{ $o->tax }}</td>
                                                      <td>${{ $o->subtotal }}</td> --}}
                                                      <td>${{ $o->total_price }}</td>
                                                      <td>{{ $o->created_at }}</td>
                                                      <td>
                                                        @if($o->status=='1')
                                                        <span class="badge badge-warning">Panding</span>
                                                        @else
                                                        <span class="badge badge-success">Approve</span>

                                                        @endif
                                                      </td> 

                                                       <td>
                                                        @if($o->payment_status=='1')
                                                        <span class="badge badge-warning">Panding</span>
                                                        @else
                                                        <span class="badge badge-success">Approve</span>

                                                        @endif
                                                      </td>
                                                      {{-- <td>{{ $o->created_at }}</td> --}}
                                                      <td>
                                                        <a href="{{ route('cus_order_details',$o->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                        <a href="{{ route('cus_order_detailspdf',$o->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a>
                                                        <a href="{{ route('OrderExportDownload',$o->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-download"></i></a>
                                                        <a href="{{ route('orderApprove',$o->id) }}" title="Prrove Product" class="btn btn-info btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></a>
                                                        <a href="{{ route('orderDelete',$o->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                      </td>
                                                    </tr>
                                               @endforeach
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

<script type="text/javascript">
@if(Session::has('message'))
      var type = "{{ Session::get('alert-type','success') }}";
      switch(type){
        case "success":
        toastr.success("{{ Session::get('message') }}");
        break;

        case "error":
        toastr.error("{{ Session::get('message') }}");
        break;
      }
  @else

  @endif
</script>


@endsection