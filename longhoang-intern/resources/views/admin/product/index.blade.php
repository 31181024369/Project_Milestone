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
            <div class="card" style="margin-block: 10px">
                <div class="card-header">
                    <div id="left" style="float: left">
                        <p>liệt kê product</p>
                    </div>
                    <div id="right" style="float: right">
                        <a style="margin-bottom: 10px" href="{{ route('product.create') }}" class="btn btn-info">thêm mới product</a>
                    </div>
                </div>

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
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name product</th>
                            <th scope="col">Image product</th>
                            {{-- <th scope="col">Price product</th>
                            <th scope="col">Quantity product</th> --}}
                            <th scope="col">thuộc warehouse</th>
                            <th scope="col">Type product</th>
                            <th scope="col">Quản lí</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                            @foreach($product as $key =>$value)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $value->Name }}</td>
                                    @php
                                        $images=explode('|',$value->Image);
                                    @endphp
                                    <td><img width="100px" height="100px" src="{{URL::to($images[0])}}" alt=""></td>
                                    {{-- <td>${{ $value->Price }}</td>
                                    <td>{{ $value->Quantity }}</td> --}}
                                    <td>{{ $value->warehouse->Name }}</td>
                                    @if($value->Type =='1')
                                        <td>
                                            <a href="{{ url('/select-attribute/'.$value->id) }}">sản phẩm có thuộc tính</a>
                                        </td>
                                    @else
                                        <td>sản phẩm không có thuộc tính</td>
                                    @endif
                                    <td>
                                        <a style="margin-bottom: 10px" href="{{ route('product.edit',[$value->id]) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('product.destroy',[$value->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('bạn muốn xoá product này không?');" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                           
                         
                          
                        </tbody>
                      </table>
                      <form action="{{url('import-product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" accept=".xlsx"><br><br>
                        <input type="submit" value="Import product" name="import_product" class="btn btn-warning">
                    </form><br>
                    <form action="{{url('export-product')}}" method="POST">
                        @csrf
                        <input type="submit" value="Export product" name="export_product" class="btn btn-success">
                    </form>
                   
                        
                </div>
            </div>
            {{ $product->links() }}
        </div>
    </div>
</div>
@endsection