<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable=['Name','Address','Phone','Ward','District','City'];
    protected $table='warehouse';
    use HasFactory;
}
