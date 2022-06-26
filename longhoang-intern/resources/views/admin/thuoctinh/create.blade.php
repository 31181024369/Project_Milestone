@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                    <form method="POST" action="{{ route('thuoctinh.store',[$product->id]) }}" enctype="multipart/form-data">
                        @csrf
                        
                        

                        <div class="form-group">
                            <label for="exampleInputEmail1">Color</label>
                            <select name="color" class="custom-select" >
                                    <option value="Đỏ">Đỏ</option>
                                    <option value="Vàng">Vàng</option>
                                    <option value="Xanh">Xanh</option>
                                    <option value="Đen">Đen</option>
                                    <option value="Trắng">Trắng</option>
                                    <option value="Tím">Tím</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Size</label>
                            <select name="size" class="custom-select" >
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    
                            </select>
                        </div>

                        
                        
                        <button style="margin-top: 20px" type="submit" name="" class="btn btn-primary">thêm</button>
                      </form>
                   
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection