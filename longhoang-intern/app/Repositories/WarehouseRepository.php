<?php

namespace App\Repositories;
use App\Models\Warehouse;


class WarehouseRepository
{
    public function __construct()
    {
       
    }
    public function get_warehouse()
    {
        return $warehouse=Warehouse::orderBy('id','DESC')->paginate(4);
    }
    public function destroy_warehouse($id)
    {
        Warehouse::find($id)->delete();
    }
    public function store_warehouse($name,$address,$phone,$city,$district,$ward)
    {
        $warehouse=new Warehouse();
        $warehouse->Name=$name;
        $warehouse->Address=$address;
        $warehouse->Phone=$phone;
        $warehouse->City=$city;
        $warehouse->District=$district;
        $warehouse->Ward=$ward;
        $warehouse->save();
    }
    public function find_warehouse($id)
    {
        return $warehouse=Warehouse::find($id);;
    }
    public function update_warehouse($id,$name,$address,$phone,$city,$district,$ward)
    {
        $warehouse=Warehouse::find($id);
        $warehouse->Name=$name;
        $warehouse->Address=$address;
        $warehouse->Phone=$phone;
        $warehouse->City=$city;
        $warehouse->District=$district;
        $warehouse->Ward=$ward;
        $warehouse->save();
    }
}
