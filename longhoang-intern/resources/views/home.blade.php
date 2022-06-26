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
                <div class="card-header">liệt kê sản phẩm có thuộc tính</div>

                <div class="card-body">
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
                            <th scope="col">Image</th>
                            <th scope="col">Color</th>
                            <th scope="col">Size</th>
                            <th scope="col">Price</th>
                            <th scope="col">Compare_at_price</th>
                            <th scope="col">Quantity</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key =>$value)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $value->product->Name }}</td>
                                    <td>
                                        <img width="80px" height="80px" src="{{ asset($value->image) }}" alt="">
                                    </td>
                                    <td>{{ $value->color }}</td>
                                    <td>{{ $value->size }}</td>
                                    <td>${{ $value->price }}</td>
                                    <td style="text-decoration: line-through">${{ $value->compare_at_price }}</td>
                                    <td>${{ $value->quantity }}</td>
                                    
                                </tr>
                            @endforeach
                            
                        </tbody>
                        
                      </table>
                      <form action="{{url('import-attribute')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" accept=".xlsx"><br><br>
                        <input type="submit" value="Import attribute" name="import_attribute" class="btn btn-warning">
                    </form><br>
                    <form action="{{url('export-attribute')}}" method="POST">
                        @csrf
                        <input type="submit" value="Export attribute" name="export_attribute" class="btn btn-success">
                    </form>
                </div>
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
