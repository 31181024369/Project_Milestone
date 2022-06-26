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
            <div class="card" style="margin-bottom: 10px">
                {{-- <div class="card-header">liệt kê warehouse</div> --}}
                <div class="card-header">
                    <div id="left" style="float: left">
                        <p>liệt kê warehouse</p>
                    </div>
                    <div id="right" style="float: right">
                        <a style="margin-bottom: 10px" href="{{ route('warehouse.create') }}" class="btn btn-info">thêm mới warehouse</a>
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
                            <th scope="col">Name warehouse</th>
                            <th scope="col">City</th>
                            <th scope="col">District</th>
                            <th scope="col">Ward</th>
                            <th scope="col">Address warehouse</th>
                            <th scope="col">Phone warehouse</th>
                            <th scope="col">Quản lí</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                            @foreach($warehouse as $key =>$value)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $value->Name }}</td>
                                    <td>{{ $value->City }}</td>
                                    <td>{{ $value->District }}</td>
                                    <td>{{ $value->Ward }}</td>
                                    <td>{{ $value->Address }}</td>
                                    <td>{{ $value->Phone }}</td>
                                    <td>
                                        <a style="margin-bottom: 10px" href="{{ route('warehouse.edit',[$value->id]) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('warehouse.destroy',[$value->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('bạn muốn xoá warehouse này không?');" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                           
                         
                          
                        </tbody>
                        
                      </table>
                    
                    <form action="{{url('import-warehouse')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" accept=".xlsx"><br><br>
                        <input type="submit" value="Import warehouse" name="import_csv" class="btn btn-warning">
                    </form><br>
                    <form action="{{url('export-warehouse')}}" method="POST">
                        @csrf
                        <input type="submit" value="Export warehouse" name="export_csv" class="btn btn-success">
                    </form>
              
                   
                        
                </div>
                
            </div>
            {{ $warehouse->links() }}
        </div>
    </div>
</div>
@endsection