<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable=['product_id','color','size','quantity','price','compare_at_price','image'];
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
