<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPartner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $request)
    {

    }
}
