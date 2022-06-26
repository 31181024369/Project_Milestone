<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use App\Imports\ProductImport;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository=$productRepository;
    }
    public function index()
    {
        //$product=Product::orderBy('id','DESC')->paginate(4);
        $product=$this->productRepository->get_product();
        
        return view('admin/product/index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouse=Warehouse::orderBy('id','DESC')->get();
        return view('admin/product/create',compact('warehouse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate(
            [
                'Name' => 'required|unique:products|max:255',
                // 'Image' => 'required',
                'mutiple_file' => 'required',
                
                // 'Quantity' => 'required|integer',
                // 'Price' => 'required|integer',
                'warehouse' => 'required',
                'Type' =>'required'
                
            ]
        );
       //dd($request->all());
       

        $this->productRepository->store_product($data['Name'],$data['mutiple_file'],$data['warehouse'],$data['Type']);
        return redirect()->back()->with('status','thêm product thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse=Warehouse::orderBy('id','DESC')->get();
        //$product=Product::find($id);
        $product=$this->productRepository->find_product($id);
        return view('admin/product/edit',compact('product','warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->validate(
            [
                'Name' => 'required|max:255',
                // 'Image' => 'required',
                // 'Quantity' => 'required|integer',
                // 'Price' => 'required|integer',
                'warehouse' => 'required',
                'Type' => 'required'
                
            ]
        );

        // $product=Product::find($id);
        // $product->Name=$data['Name'];
        // if($request->hasFile('Image'))
        // {
        //  $file=$request->Image;
        //  $image_name=$file->getClientOriginalName();
       
        //  $path=$file->move('public/uploads',$file->getClientOriginalName());
        //  $image='public/uploads/'.$image_name;
        //  $product->Image=$image;
        // }
        
        // $product->Quantity=$data['Quantity'];
        // $product->Price=$data['Price'];
        // $product->warehouse_id=$data['warehouse'];
        // $product->Type=$data['Type'];
        // $product->save();

        $this->productRepository->update_product($id,$data['Name'],$request,$data['warehouse'],$data['Type']);
       //$this->productRepository->update_product($id,$data['Name'],$data['Image'],$data['Quantity'],$data['Price'],$data['warehouse'],$data['Type']);

       //$this->productRepository->update_product($id,$data);

        return redirect()->back()->with('status','cập nhật product thành công');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product=Product::find($id);
        // $path=$product->Image;
        // if(file_exists($path))
        // {
        //     unlink($path);
           
        // }
        // Product::find($id)->delete();
        $product=$this->productRepository->destroy_product($id);
        return redirect()->back()->with('status','xoá product thành công');
    }
    public function uploadanh(){
        $hinh=array($_FILES['file']['name']);
        for($count = 0;$count<count($_FILES['file']['name']);$count++){
            $file_name=$_FILES['file']['name'][$count];
            $tmp_name=$_FILES['file']['tmp_name'][$count];
            
            $file_array=explode(".",$file_name);
            $file_ext=end($file_array);
         
            $location='public/uploads/'.$file_name;
            if(move_uploaded_file($tmp_name,$location)){
              
            }
        }
        
        echo json_encode($hinh);
    }
    public function export_product()
    {
       return Excel::download(new ProductExport,'product.xlsx');

    }
    public function import_product(Request $request)
    {
        Excel::import(new ProductImport, $request->file('file'));
        return back();
    }

}
