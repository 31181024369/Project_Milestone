<?php

namespace App\Repositories;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository
{
    public function __construct()
    {
        //
    }
    public function get_product()
    {
        return $product=Product::orderBy('id','DESC')->paginate(4);
    }
    public function find_product($id)
    {
        return $product=Product::find($id);;
    }
    public function store_product($name,$image,$warehouse,$type)
    {
        $product=new Product();
        $product->Name=$name;
       
        
        
         //$file=$request->Image;
         $images=array();

         $file=$image;
         foreach($file as $value)
         {
            $image_name=$value->getClientOriginalName();
            $path=$value->move('public/uploads',$value->getClientOriginalName());
            $image='public/uploads/'.$image_name;
            $images[]=$image;
         }
        //  $image_name=$file->getClientOriginalName();
       
        //  $path=$file->move('public/uploads',$file->getClientOriginalName());
        //  $image='public/uploads/'.$image_name;
         //$product->Image=$images;
        //  $product->Image=implode('|',$images);
        $product->Image=implode('|',$images);
        
        
        
        $product->warehouse_id=$warehouse;
        $product->Type=$type;
        $product->save();
    }
    public function update_product($id,$name,$request,$warehouse,$type)
    {
        $product=Product::find($id);
        $product->Name=$name;
        // if($request->hasFile('Image'))
        // {
        //     $images=array();
        //     $file=$request->Image;
            
        //     foreach($file as $value)
        //     {
        //         $image_name=$value->getClientOriginalName();
        //         $path=$value->move('public/uploads',$value->getClientOriginalName());
        //         $image='public/uploads/'.$image_name;
        //         $images[]=$image;
        //         $product->Image=implode('|',$images);
        //     }
        // }

        if($request->hasFile('mutiple_file'))
        {
            $images=array();
            $file=$request->mutiple_file;
            
            foreach($file as $value)
            {
                $image_name=$value->getClientOriginalName();
                $path=$value->move('public/uploads',$value->getClientOriginalName());
                $image='public/uploads/'.$image_name;
                $images[]=$image;
                $product->Image=implode('|',$images);
            }
        }
        
        
       
        $product->warehouse_id=$warehouse;
        $product->Type=$type;
        $product->save();
    }
    
    public function destroy_product($id)
    {
        $product=Product::find($id);
        $path=$product->Image;
        if(file_exists($path))
        {
            unlink($path);
           
        }
        Product::find($id)->delete();
    }

}
