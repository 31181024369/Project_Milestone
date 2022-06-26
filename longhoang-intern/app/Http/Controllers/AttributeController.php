<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttributeExport;
use App\Imports\AttributeImport;
class AttributeController extends Controller
{
    public function select_attribute($id)
    {
        $product=Product::find($id);
        return view('admin.Attribute.create',compact('product'));
        
    }
    public function delete_attribute($id)
    {
        Attribute::find($id)->delete();
        return redirect()->back()->with('status','xoá thuộc tính thành công');
    }
    public function store_attribute($id,Request $request)
    {
        $data=$request->validate(
            [
                'color' => 'required',
                'size' =>'required',
                'price' => 'required',
                'quantity' => 'required',
                'compare_at_price' => 'required',
                'image' => 'required'
                
            ]
        );
        // foreach($data['quantity'] as $key =>$val)
        // {
        //     if(!empty($val)){
        //     $attribute=new Attribute();
        //     $attribute->product_id=$id;
        //     $attribute->color=$data['color'][$key];
        //     $attribute->size=$data['size'][$key];
        //     $attribute->price=$data['price'][$key];
        //     $attribute->quantity=$data['quantity'][$key];
        //     $attribute->save();
        //     }
        // }
        //dd($data);

        foreach($data['quantity'] as $key =>$val)
        {
            if(!empty($val)){
            $attribute=new Attribute();
            $attribute->product_id=$id;
            $attribute->color=$data['color'][$key];
            $attribute->size=$data['size'][$key];
            $attribute->price=$data['price'][$key];
            $attribute->compare_at_price=$data['compare_at_price'][$key];

            if($request->hasFile('image'))
            {
                //$file=$request->file('image');
                $file=$data['image'][$key];
                $image_name=$file->getClientOriginalName();
            
                $path=$file->move('public/uploads',$file->getClientOriginalName());
                $image='public/uploads/'.$image_name;
                $attribute->image=$image;
            }
            //$attribute->image=$data['image'][$key];
            $attribute->quantity=$val;
            $attribute->save();
            }
           
        }
        return redirect()->back()->with('status','thêm thuộc tính thành công');

    }
    public function update_attribute($id,Request $request)
    {
        $data=$request->all();
        foreach($data['attr_id'] as $key =>$attr)
        {
            Attribute::where('id',$data['attr_id'][$key])->update([
                'color' => $data['color'][$key],
                'size' => $data['size'][$key],
                'price' => $data['price'][$key],
                'quantity' =>$data['quantity'][$key]
            ]);
        }
        return redirect()->back()->with('status','cập nhật thuộc tính thành công');
        //dd($data);
    }
    public function export_attribute()
    {
       return Excel::download(new AttributeExport,'attribute.xlsx');

    }
    public function import_attribute(Request $request)
    {
        Excel::import(new AttributeImport, $request->file('file'));
        return back();
    }
}
