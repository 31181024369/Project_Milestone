<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuoctinh extends Model
{
    use HasFactory;
    protected $fillable=['product_id','color','size'];
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
