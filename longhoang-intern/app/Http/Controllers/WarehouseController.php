<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\City;
use App\Models\Ward;
use App\Models\District;
use App\Repositories\WarehouseRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WarehouseExport;
use App\Imports\WarehouseImport;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $warehouseRepository;
    public function __construct(WarehouseRepository $warehouseRepository)
    {
       $this->warehouseRepository=$warehouseRepository;
    }
    public function index()
    {
       
        //$warehouse=Warehouse::orderBy('id','DESC')->get();
        //$warehouse=Warehouse::orderBy('id','DESC')->paginate(4);
        $warehouse=$this->warehouseRepository->get_warehouse();
        
       
        return view('admin/warehouse/index',compact('warehouse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citys=City::all();
        $ward=Ward::all();
        $district=District::all();
        //$warehouse=Warehouse::orderBy('id','DESC')->get();
        return view('admin/warehouse/create',compact('citys','ward','district'));
    }

    # select district
    function select_district(Request $request){
        $select_district = '<option value="">-- Chọn Quận/Huyện --</option>';
        $city = $request->get('city');
        $matp = City::where('name', $city)->get();
        $matp = $matp['0']->matp;
        if($matp){
            $list_district = District::where('matp', $matp)->get();
            foreach($list_district as $district){
                $select_district .= '
                    <option value="'.$district->name.'">'.$district->name.'</option>';
            }
        }
        $data = $select_district;
        return response()->json($data);
    }

    # select commune

    function select_ward(Request $request){
        $select_ward = '<option value="">-- Chọn Xã/Phường --</option>';
        $district = $request->get('district');
        $maqh = District::where('name', $district)->get();
        $maqh = $maqh['0']->maqh;
        if($maqh){
            $list_ward = Ward::where('maqh', $maqh)->get();
            foreach($list_ward as $ward){
                $select_ward .= '
                    <option value="'.$ward->name.'">'.$ward->name.'</option>
            ';
            }
        }
        $data = $select_ward;
        return response()->json($data);
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
                'Name' => 'required|unique:warehouse|max:255',
                'Address' => 'required|max:255',
                'Phone' => 'required|string|max:11',
                'city' => 'required',
                'district' => 'required',
                'ward' => 'required'
            ]
        );
        // $warehouse=new Warehouse();
        // $warehouse->Name=$data['Name'];
        // $warehouse->Address=$data['Address'];
        // $warehouse->Phone=$data['Phone'];
        // $warehouse->City=$data['city'];
        // $warehouse->District=$data['district'];
        // $warehouse->Ward=$data['ward'];
        // $warehouse->save();


        $this->warehouseRepository->store_warehouse($data['Name'],$data['Address'],$data['Phone'],$data['city'],$data['district'],$data['ward']);
       
        return redirect()->back()->with('status','thêm warehouse truyện thành công');
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
        $citys=City::all();
        $ward=Ward::all();
        $district=District::all();
        //$warehouse=Warehouse::find($id);
        $warehouse=$this->warehouseRepository->find_warehouse($id);
        

        return view('admin/warehouse/edit',compact('warehouse','citys','ward','district'));
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
                'Address' => 'required|max:255',
                'Phone' => 'required|string|max:11',
                'city' => 'required',
                'district' => 'required',
                'ward' => 'required'
            ]
        );
        // $warehouse=Warehouse::find($id);
        // $warehouse->Name=$data['Name'];
        // $warehouse->Address=$data['Address'];
        // $warehouse->Phone=$data['Phone'];
        // $warehouse->City=$data['city'];
        // $warehouse->District=$data['district'];
        // $warehouse->Ward=$data['ward'];
        // $warehouse->save();
        $this->warehouseRepository->update_warehouse($id,$data['Name'],$data['Address'],$data['Phone'],$data['city'],$data['district'],$data['ward']);

        return redirect()->back()->with('status','cập nhật warehouse truyện thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Warehouse::find($id)->delete();
        $warehouse=$this->warehouseRepository->destroy_warehouse($id);
        return redirect()->back()->with('status','xoá warehouse thành công');
    }
    public function export_warehouse()
    {
       return Excel::download(new WarehouseExport,'warehouse.xlsx');

    }
    public function import_warehouse(Request $request)
    {
        // $path = $request->file('file')->getRealPath();
        // Excel::import(new WarehouseImport, $path);
        Excel::import(new WarehouseImport, $request->file('file'));
        return back();

    }
}
