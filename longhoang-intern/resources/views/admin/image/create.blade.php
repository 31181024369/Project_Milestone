@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">thêm image cho sản phẩm</div>

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

                    <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
                        @csrf
                       

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image product</label>
                            <input type="file" class="form-control-file" name="url">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">chọn sản phẩm</label>
                            <select name="product" class="custom-select" >
                                @foreach ($product as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->Name }}</option>
                                @endforeach
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