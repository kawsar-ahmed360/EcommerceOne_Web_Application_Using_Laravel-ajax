<div class="modal fade" id="subcat_add" tabindex="-1" style="display: none"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add SubCategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
             <div class="card">
                <div class="card-body">
                       
                    <form action="{{ route('SubCategorySave') }}" method="post" accept-charset="utf-8" id="SubCatAdd">
                      @csrf
                      
                          <div class="form-group">

                          <label style="color:white">Category Name </label>
                         <select name="category_id" id="category_id" class="form-control form-control-sm @error('category_id') is-invalid @enderror">
                           <option selected="" disabled="">--Select Class--</option>
                           @foreach($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                           @endforeach
                         </select>

                           @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>

                         <div class="form-group">

                          <label style="color:white">SubCategory Name </label>
                          <input type="text" class="form-control @error('sub_category') is-invalid @enderror" name="sub_category" id="sub_category" placeholder="Enter your sub_category..">

                           @error('sub_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>

                     

                      



    {{-- <input type="hidden" name="profileId" id="profileId"> --}}
                   


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="reset" class="btn btn-danger btn-sm">Clear Data</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
      </div>
                    </form>

                </div>
             </div>

      </div>
    </div>
  </div>
</div>