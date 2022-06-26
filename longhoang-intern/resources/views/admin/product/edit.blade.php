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
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('product.update',[$product->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name product</label>
                          <input type="text" class="form-control" value="{{ $product->Name }}" name="Name" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image product</label>
                            {{-- <input type="file" class="form-control-file" name="Image" ><br> --}}
                            {{-- <input type="file" class="form-control-file" name="Image[]" multiple><br> --}}
                            <input type="file" name="mutiple_file[]" id="mutiple_file" multiple />
                            @php
                              $images=explode('|',$product->Image);
                            @endphp
                            <div class="right">
                            @foreach($images as $item)
                              <img width="100px" height="100px" src="{{ URL::to($item) }}" alt="">
                            @endforeach
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Quantity product</label>
                            <input type="text" class="form-control" value="{{ $product->Quantity }}" name="Quantity" aria-describedby="emailHelp" placeholder="Quantity product..">
                          </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price product</label>
                            <input type="text" class="form-control" value="{{ $product->Price }}" name="Price" aria-describedby="emailHelp" placeholder="Price product..">
                        </div> --}}
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">warehouse</label>
                            <select name="warehouse" class="custom-select" >
                                @foreach ($warehouse as $key => $value)
                                    <option {{ $value->id==$product->warehouse_id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->Name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                              <legend class="col-form-label col-sm-2 pt-0">Type</legend>
                              <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="Type" id="type_1" value="1" {{ $product->Type =='1' ? 'checked' : '' }} >
                                  <label class="form-check-label" for="gridRadios1">
                                    Sản phẩm có thuộc tính
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="Type" id="type_0" value="0" {{ $product->Type =='0' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="gridRadios2">
                                    Sản phẩm không có thuộc tính
                                  </label>
                                </div>
                               
                              </div>
                            </div>
                        </fieldset>
                    
                       
                        <button type="submit" name="" class="btn btn-primary">thêm</button>
                      </form>
                   
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection