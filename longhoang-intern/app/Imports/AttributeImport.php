<?php

namespace App\Imports;

use App\Models\Attribute;
use Maatwebsite\Excel\Concerns\ToModel;

class AttributeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Attribute([
            'product_id' => $row[0],
            'color' => $row[1],
            'size' => $row[2],
            'price' => $row[3],
            'quantity' => $row[4],
            'image' => $row[5],
            'compare_at_price' =>$row[6],
           
        ]);
    }
}
