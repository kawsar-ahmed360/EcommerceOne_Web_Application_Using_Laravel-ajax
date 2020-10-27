@extends('backend/master')

@section('content')

<style type="text/css">
  label {
    font-weight: 500;
    color: white;
}
</style>

  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title" style="color:white">{{ (@$edite)?"Product Edite":"Product Add" }} <a href="{!! route('ProductView') !!}" class="btn btn-success btn-sm"><i class="fa fa-list"></i>View Product</a></h4>
                                  
                                        <div class="card">
                                            <div class="card-body">
                                              <form action="{!! (@$edite)?route('ProductUpdate'):route('ProductSave') !!}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                @csrf
                                                
                                                <input type="hidden" value="{{ @$edite->id }}" name="product_id">
                                              
                                                 <div class="form-row">

                                                      <div class="form-group col-md-4">
                                                          <label for="">Product Name</label>
                                                          <input type="text" class="form-control form-control-sm @error('product_name') is-invalid @enderror" name="product_name" value="{{ @$edite->product_name }}" id="product_name" placeholder="Entry Porduct Name..........">
                                                      </div>

                                                      @error('product_name')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror

                                                        <div class="form-group col-md-4">
                                                          <label for="">Category Name</label>
                                                           <select class="form-control form-control-sm @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                                               <option disabled="" selected="">---Select Category---</option>
                                                               @foreach($cat as $c)
                                                                <option value="{{ $c->id }}" {{ @$edite->category_id == $c->id?"selected":"" }}>{{ $c->category_name }}</option>
                                                                
                                                               @endforeach
                                                           </select>

                                                           @error('category_id')
                                                           <span class="invalid-feedback">
                                                               {{ $message }}
                                                           </span>
                                                           @enderror
                                                      </div>

                                                      <div class="form-group col-md-4">
                                                          <label for="">SubCategory Name</label>
                                                           <select class="form-control form-control-sm @error('subcategory_id') is-invalid @enderror" id="subcategory_id" name="subcategory_id">
                                                               <option disabled="" selected="">---Select SubCategory---</option>
                                                            {{--    @foreach($sub_cat as $s)
                                                                <option value="{{ $s->id }}" {{ @$edite->subcategory_id == $s->id?"selected":"" }}>{{ $s->sub_category }}</option>}
                                                                
                                                               @endforeach --}}
                                                           </select>

                                                           @error('subcategory_id')
                                                           <span class="invalid-feedback">
                                                               {{ $message }}
                                                           </span>
                                                           @enderror
                                                      </div>


                                                      <div class="form-group col-md-4">
                                                          <label for="">Color Name</label>
                                                           <select class="form-control form-control-sm @error('color_id') is-invalid @enderror" multiple id="color_id" name="color_id[]">
                                                               <option disabled="" selected="">---Select Color---</option>
                                                               @foreach($color as $co)
                                                                <option value="{{ $co->id }}" {{(@in_array(['color_id'=>$co->id],$product_color))?"selected":"" }}>{{ $co->color_name }}</option>
                                                                
                                                               @endforeach
                                                           </select>

                                                           @error('color_id')
                                                           <span class="invalid-feedback">
                                                               {{ $message }}
                                                           </span>
                                                           @enderror
                                                      </div>

                                                       <div class="form-group col-md-4">
                                                          <label for="">size Name</label>
                                                           <select class="form-control form-control-sm @error('size_id') is-invalid @enderror" multiple id="size_id" name="size_id[]">
                                                               <option disabled="" selected="">---Select Size---</option>
                                                               @foreach($size as $si)
                                                                <option value="{{ $si->id }}" {{(@in_array(['size_id'=>$si->id],$product_size))?"selected":"" }}>{{ $si->size_name }}</option>}
                                                                
                                                               @endforeach
                                                           </select>

                                                           @error('size_id')
                                                           <span class="invalid-feedback">
                                                               {{ $message }}
                                                           </span>
                                                           @enderror
                                                      </div>

                                                      <div class="form-group col-md-4">
                                                          <label for="">Brand Name</label>
                                                           <select class="form-control form-control-sm @error('brand_id') is-invalid @enderror" id="brand_id" name="brand_id">
                                                               <option disabled="" selected="">---Select Brand---</option>
                                                               @foreach($brand as $b)
                                                                <option value="{{ $b->id }}" {{ @$edite->brand_id == $b->id?"selected":"" }}>{{ $b->brand_name }}</option>}
                                                                
                                                               @endforeach
                                                           </select>

                                                           @error('brand_id')
                                                           <span class="invalid-feedback">
                                                               {{ $message }}
                                                           </span>
                                                           @enderror
                                                      </div>

                                                      <div class="form-group col-md-12">
                                                          <label for="">Short Description</label>
                                                          <textarea class="form-control form-control-sm @error('summary') is-invalid @enderror" name="summary" id="summary" placeholder="Enter Your Summery...">{{ @$edite->summary }}</textarea>

                                                          @error('summary')
                                                           <span class="invalid-feedback">
                                                             <strong>{{ $message }}</strong>
                                                           </span>
                                                          @enderror
                                                      </div>


                                                      <div class="form-group col-md-12">
                                                          <label for="">Description</label>
                                                  
                                                          <textarea class="form-control form-control-sm" name="description" id="editor" placeholder="Enter Your description...">{{ @$edite->description }}</textarea>
                                                            
                                                          
                                                      </div>

                                                      <div class="form-group col-md-4">
                                                          <label for="">Price</label>
                                                  
                                                        <input type="text" class="form-control form-control-sm @error('price') is-invalid @enderror" name="price" id="price" value="{{ @$edite->price }}" placeholder="Enter price $454">

                                                        @error('price')
                                                         <span class="invalid-feedback">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
           
                                                      </div>

                                                       <div class="form-group col-md-4">
                                                          <label for="">Quentity</label>
                                                  
                                                        <input type="text" class="form-control form-control-sm @error('quentity') is-invalid @enderror" name="quentity" id="quentity" value="{{ @$edite->quentity }}" placeholder="Enter quentity ..">

                                                        @error('quentity')
                                                         <span class="invalid-feedback">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
           
                                                      </div>

                                                       <div class="form-group col-md-3">
                                                          <label for="">Image</label>
                                                  
                                                        <input type="file" class="form-control form-control-sm @error('image') is-invalid @enderror" name="image" id="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                                        @error('image')
                                                         <span class="invalid-feedback">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
           
                                                      </div>

                                                       <div class="form-group col-md-2">
                                                          <label for="">Preview Image</label><br>
                                                  
                                                         <img id="blah" alt="your image" width="100" height="100" / style="border-radius: 6px">
           
                                                      </div>

                                                       <div class="form-group col-md-2">
                                                          <label for="">Old Image</label><br>
                                                  
                                                         <img src="{{ @$edite->image?url('backend/product_image/'.$edite->image):"" }}" width="100px " alt="">
           
                                                      </div>

                                                      <div class="form-group col-md-4">
                                                          <label for="">Product Gellary</label><br>
                                                  
                                                           <input type="file" class="form-control form-control-sm" multiple name="product_gallery[]" id="product_gallery">
           
                                                      </div>

                                                        <div class="form-group col-md-3" style="padding: 33px">
                                                          <div class="" style="display: inline-block;">
                                                            
                                                           <button class="btn btn-success btn-sm" type="submit">Product {{ (@$edite)?"Update":"Save" }}</button>
                                                           {{-- <button class="btn btn-success btn-sm" type="submit">Submit</button> --}}

                                                          </div>
           
                                                      </div>

                                                      </form>

                                                 </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        

@endsection


@section('footer')

<script type="text/javascript">
  $(document).on('change','#category_id',function(){
    var cat = $(this).val();

    if (cat) {
      $.ajax({
        url:"{{ route('Productsubcatajax') }}",
        type:"GET",
        data:{cat:cat},
        success:function(data){

          var html = '<option value="">----Select Sub_Cateogory--</option>';

          $.each(data,function(key,v){
            html+='<option value="'+v.id+'">'+v.sub_category+'</option>';
          });
          $('#subcategory_id').empty().html(html);
        }
      });
    }
  });
</script>

@endsection