<?php

namespace App\Imports;

use App\Models\Warehouse;
use Maatwebsite\Excel\Concerns\ToModel;

class WarehouseImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Warehouse([
            'Name' => $row[0],
            'Address' => $row[1],
            'Ward' => $row[2],
            'District' => $row[3],
            'City' => $row[4],
            'Phone' => $row[5],
        ]);
    }
}
