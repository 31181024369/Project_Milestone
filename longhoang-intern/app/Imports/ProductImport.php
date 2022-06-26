<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'Name' => $row[0],
            'Image' => $row[1],
            'Type' => $row[2],
            'warehouse_id' => $row[3],
        ]);
    }
}
