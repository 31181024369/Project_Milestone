@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">thêm thuộc tính cho {{ $product->Name }}</div>

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

                    <form method="POST" action="{{ route('attribute.store',[$product->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="control-group">
                            <div class="field_wrapper">
                              <div>
                                <div class="row">
                                  <div class="col-md-1">
                                    <input type="text" name="color[]" placeholder="color" class="form-control">
                                    
                                  </div>
                                  <div class="col-md-1">
                                    <input type="text" name="size[]" placeholder="size" class="form-control">
                                  </div>
                                  <div class="col-md-2">
                                    <input type="text" name="quantity[]" placeholder="quantity" class="form-control">
                                  </div>
                                  <div class="col-md-2">
                                    <input type="text" name="price[]" placeholder="price" class="form-control">
                                  </div>
                                  <div class="col-md-3">
                                    <input type="text" name="compare_at_price[]" placeholder="compare_at_price" class="form-control">
                                  </div>
                                  <div class="col-md-2">
                                    <input type="file" class="form-control-file" name="image[]">
                                  </div>
                                  <div class="col-md-1">
                                    <a href="javascript:void(0);" class="add_button" title="Add field">
                                      <img style="height: 30px;weight:30px" src="{{ asset('public/icon-add.jpeg') }}" alt="">
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        <button style="margin-top: 20px" type="submit" name="" class="btn btn-primary">thêm</button>
                      </form>
                   
                        
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      
        <div class="col-md-12">
            <div class="table-responsive">
              <form action="{{ route('attribute.update',$product->id) }}" method="post">
                @csrf
                <table class="table table-striped custom-table dataTable">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>image</th>
                            <th>color</th>
                            <th>size</th>
                            <th>quantity</th>
                            <th>price</th>
                            <th>compare_at_price</th>
                            <th class="text-right no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product['attribute'] as $attribute)
                            <input type="hidden" name="attr_id[]" value="{{ $attribute->id }}">
                            {{-- <tr>
                                <td>{{ $attribute->id }}</td>
                                <td>{{ $attribute->color }}</td>
                                <td>{{ $attribute->size }}</td>
                                <td>{{ $attribute->quantity }}</td>
                                <td>{{ $attribute->price }}</td>
                                <td> <a class="btn btn-danger" href="{{ url('/delete-attribute/'.$attribute->id) }}">xoá thuộc tính</a></td>
                            </tr> --}}
                            {{-- <form action="{{ route('attribute.update',$attribute->id) }}" method="post">
                              @csrf --}}
                              <tr>
                                <td>{{ $attribute->id }}</td>
                                <td>
                                  <img width="80px" height="80px" src="{{ asset($attribute->image) }}" alt="">
                                </td>
                                <td>
                                  <input type="text" name="color[]" value="{{ $attribute->color }}" class="form-control">
                                </td>
                                <td>
                                  <input type="text" name="size[]" value="{{ $attribute->size }}" class="form-control">
                                </td>
                                <td>
                                  <input type="text" name="quantity[]" value="{{ $attribute->quantity }}" class="form-control">
                                </td>
                                <td>
                                  <input type="text" name="price[]" value="{{ $attribute->price }}" class="form-control">
                                </td>
                                <td>
                                  <input type="text" name="compare_at_price[]" value="{{ $attribute->compare_at_price	 }}" class="form-control">
                                </td>
                                
                                <td> 
                                  <a class="btn btn-danger" style="margin-bottom: 10px" href="{{ url('/delete-attribute/'.$attribute->id) }}">delete</a>
                                  <input type="submit" class="btn btn-primary" value="update">
                                </td>
                              </tr>

                            {{-- </form> --}}
                            
                        @endforeach
                    </tbody>
                </table>

              </form>
             
            </div>
        </div>
    </div>
</div>
@endsection