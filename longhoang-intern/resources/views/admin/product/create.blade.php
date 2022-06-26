@extends('layouts.app')

@section('content')
{{-- @include('layouts.nav') --}}
<div class="container">
    <div class="row">
      <div class="col-md-3 sidebar">
        <a class="active" href="{{ route('home') }}">Admin</a>
        <a href="{{ route('warehouse.index') }}">warehouse</a>
        <a href="{{ route('product.index') }}">product</a>
        
    </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">thêm product</div>

                <div class="card-body">
                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="modal fade" id="demo-model">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>Modal body text goes here.</p>
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="control-group">
                                  <div class="field_wrapper">
                                    <div>
                                      <div class="row">
                                        <div class="col-md-2">
                                          <input type="text" name="color[]" placeholder="color" class="form-control">
                                          
                                        </div>
                                        <div class="col-md-2">
                                          <input type="text" name="size[]" placeholder="size" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                          <input type="text" name="quantity[]" placeholder="quantity" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                          <input type="text" name="prire[]" placeholder="prire" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                          <a href="javascript:void(0);" class="add_button" title="Add field">
                                            <img style="height: 30px;weight:30px" src="{{ asset('public/icon-add.jpeg') }}" alt="">
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name product</label>
                          <input type="text" class="form-control" value="" name="Name" aria-describedby="emailHelp" placeholder="name product..">
                          @error('Name')
                            <small class="font-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Image product</label>
                            <input type="file" class="form-control-file" name="Image[]" multiple>
                            @error('Image')
                              <small class="font-text text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Image product</label>
                          <input type="file" name="mutiple_file[]" id="mutiple_file" multiple />
                          <span id="error_mutiple_file"></span>
                          {{-- <input type="text"  name="image5" id="image5"> --}}

                          <div class="right">
    
                          </div>
                          @error('mutiple_file')
                            <small class="font-text text-danger">{{ $message }}</small>
                          @enderror
                      </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Quantity product</label>
                            <input type="text" class="form-control" value="" name="Quantity" aria-describedby="emailHelp" placeholder="Quantity product..">
                            @error('Quantity')
                              <small class="font-text text-danger">{{ $message }}</small>
                            @enderror
                          </div> --}}

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Price product</label>
                            <input type="text" class="form-control" value="" name="Price" aria-describedby="emailHelp" placeholder="Price product..">
                            @error('Price')
                              <small class="font-text text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">warehouse</label>
                            <select name="warehouse" class="custom-select" >
                                @foreach ($warehouse as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->Name }}</option>
                                @endforeach
                            </select>
                            @error('warehouse')
                              <small class="font-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                              <legend class="col-form-label col-sm-2 pt-0">Type</legend>
                              <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="Type" id="type_1" value="1" >
                                  <label class="form-check-label" for="gridRadios1">
                                    Sản phẩm có thuộc tính
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="Type" id="type_0" value="0">
                                  <label class="form-check-label" for="gridRadios2">
                                    Sản phẩm không có thuộc tính
                                  </label>
                                </div>
                                @error('Type')
                                <small class="font-text text-danger">{{ $message }}</small>
                              @enderror
                               
                              </div>
                            </div>
                        </fieldset>

                        
                        
                        <button style="margin-top: 20px" type="submit" name="" class="btn btn-primary">thêm</button>
                      </form>
                   
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <script type="text/javascript">
  $(document).ready(function(){
      var maxField = 10; //Input fields increment limitation
      var addButton = $('.add_button'); //Add button selector
      var wrapper = $('.field_wrapper'); //Input field wrapper
      var fieldHTML = `<div class="field_wrapper">
                                    <div>
                                      <div class="row">
                                        <div class="col-md-2">
                                          <input type="text" name="color[]" placeholder="color" class="form-control">
                                          
                                        </div>
                                        <div class="col-md-3">
                                          <input type="text" name="size[]" placeholder="size" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                          <input type="text" name="quantity[]" placeholder="quantity" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                          <input type="text" name="prire[]" placeholder="prire" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                          <a href="javascript:void(0);" class="add_button" title="Add field">
                                            <img style="height: 30px;weight:30px" src="{{ asset('public/icon-add.jpeg') }}" alt="">
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div> `;
      
      //Once add button is clicked
      $(addButton).click(function(){
          //Check maximum number of input fields
          if(x < maxField){ 
              x++; //Increment field counter
              $(wrapper).append(fieldHTML); //Add field html
          }
      });
      
      //Once remove button is clicked
      $(wrapper).on('click', '.remove_button', function(e){
          e.preventDefault();
          $(this).parent('div').remove(); //Remove field html
          x--; //Decrement field counter
      });
  });
  </script> --}}