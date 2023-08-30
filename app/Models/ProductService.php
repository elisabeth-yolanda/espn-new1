<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductService extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function detailProduct()
    {
        return $this->hasMany(ProductServiceDetail::class);
    }

    public function scopeFilter()
    {

    }
}
