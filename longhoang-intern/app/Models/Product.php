<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['Name','Image','Type','warehouse_id'];
    public $table ="products";
    public function warehouse()
    {
        return $this->belongsTo('App\Models\Warehouse');
    }
    public function image()
    {
        return $this->hasMany('App\Models\Image');
    }
    public function thuoctinh()
    {
        return $this->hasMany('App\Models\Thuoctinh');
    }
    public function attribute()
    {
        return $this->hasMany('App\Models\Attribute');
    }
    
}