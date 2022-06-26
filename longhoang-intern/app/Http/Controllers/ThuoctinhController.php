<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Thuoctinh;

class ThuoctinhController extends Controller
{
    public function chonthuoctinh($id)
    {
        $product=Product::find($id);
        return view('admin.thuoctinh.create',compact('product'));
    }
    public function store($id,Request $request)
    {
        $data=$request->validate(
            [
                'color' => 'required',
                'size' =>'required'
            ]
        );
        $thuoctinh=new Thuoctinh();
        $thuoctinh->color=$data['color'];
        $thuoctinh->size=$data['size'];
        $thuoctinh->product_id=$id;
        $thuoctinh->save();
        return redirect()->back()->with('status','thêm thuộc tính thành công');
    }
}
