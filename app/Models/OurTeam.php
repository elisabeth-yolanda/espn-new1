<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $filters)
    {
        // $query->when($filters['search'] ?? false, function($query, $search) {
        //     $query->where('name', 'like', '%'.$search.'%')
        //         ->orWhere('position', 'like', '%'.$search.'%');
        // });
    }
}
