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
                <div class="card-header">cập nhật warehouse</div>

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

                    <form method="POST" action="{{ route('warehouse.update',[$warehouse->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name warehouse</label>
                          <input type="text" class="form-control" value="{{ $warehouse->Name }}" name="Name" aria-describedby="emailHelp" placeholder="name warehouse..">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <select name="city" class="custom-select city" >
                                <option value="">-- Chọn Tỉnh/Thành Phố--</option>
                                @foreach ($citys as $key => $city)
                                    <option {{ $city->name==$warehouse->City ? 'selected' : '' }} value="{{ $city->name }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">District</label>
                            <select name="district" class="custom-select district" >
                                <option value="{{ $warehouse->District }}">{{ $warehouse->District }}</option>
                               
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ward</label>
                            <select name="ward" class="custom-select ward" >
                                <option value="{{ $warehouse->Ward }}">{{ $warehouse->Ward }}</option>
                               
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">Address warehouse</label>
                            <input type="text" class="form-control" value="{{ $warehouse->Address }}" name="Address" aria-describedby="emailHelp" placeholder="address warehouse..">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone warehouse</label>
                            <input type="text" class="form-control" value="{{ $warehouse->Phone }}" name="Phone" aria-describedby="emailHelp" placeholder="phone warehouse..">
                        </div>
                        <button type="submit" name="themtheloai" class="btn btn-primary">cập nhật</button>
                      </form>
                   
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection