@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3 sidebar">
            <a class="active" href="{{ route('home') }}">Admin</a>
            <a href="{{ route('warehouse.index') }}">warehouse</a>
            <a href="{{ route('product.index') }}">product</a>
            
        </div>
        <div class="col md-9 content">
            <div class="card">
                <div class="card-header">
                    <div class="menu-header">
                        <div id="left" style="float: left">
                            <p>thêm warehouse</p>
                        </div>
                        <div id="right" style="float: right">
                            <a style="margin-bottom: 10px" href="" class="btn btn-primary">thêm mới</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                   
                   

                    <form method="POST" action="">
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
                               
                            </select>
                           
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">District</label>
                            <select name="district" class="custom-select district" >
                                <option value="">-- Chọn Quận/Huyện--</option>
                               
                            </select>
                           
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ward</label>
                            <select name="ward" class="custom-select ward" >
                                <option value="">-- Chọn Xã/Phường--</option>
                               
                            </select>
                            
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Address warehouse</label>
                            <input type="text" class="form-control" value="" name="Address" aria-describedby="emailHelp" placeholder="address warehouse..">
                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone warehouse</label>
                            <input type="text" class="form-control" value="" name="Phone" aria-describedby="emailHelp" placeholder="phone warehouse..">
                           
                        </div>
                        <button type="submit" name="themtheloai" class="btn btn-primary">thêm</button>
                      </form>
                   
                        
                </div>
            </div>
        </div>
    </div>

</div>
@endsection