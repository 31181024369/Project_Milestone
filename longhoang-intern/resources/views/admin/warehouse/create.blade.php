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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">thêm warehouse</div>

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

                    <form method="POST" action="{{ route('warehouse.store') }}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name warehouse</label>
                          <input type="text" class="form-control" value="" name="Name" aria-describedby="emailHelp" placeholder="name warehouse..">
                            @error('Name')
                                <small class="font-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <select name="city" class="custom-select city" >
                                <option value="">-- Chọn Tỉnh/Thành Phố--</option>
                                @foreach ($citys as $key => $city)
                                    <option value="{{ $city->name }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city')
                                <small class="font-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">District</label>
                            <select name="district" class="custom-select district" >
                                <option value="">-- Chọn Quận/Huyện--</option>
                               
                            </select>
                            @error('district')
                                <small class="font-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ward</label>
                            <select name="ward" class="custom-select ward" >
                                <option value="">-- Chọn Xã/Phường--</option>
                               
                            </select>
                            @error('ward')
                                <small class="font-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Address warehouse</label>
                            <input type="text" class="form-control" value="" name="Address" aria-describedby="emailHelp" placeholder="address warehouse..">
                            @error('Address')
                                <small class="font-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone warehouse</label>
                            <input type="text" class="form-control" value="" name="Phone" aria-describedby="emailHelp" placeholder="phone warehouse..">
                            @error('Phone')
                                <small class="font-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" name="themtheloai" class="btn btn-primary">thêm</button>
                      </form>
                   
                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
