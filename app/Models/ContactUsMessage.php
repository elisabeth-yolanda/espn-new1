<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsMessage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $request)
    {
        return $query->when($request->name, function($query) use ($request) {
            $query->where('name', 'like', "%{$request->name}%");
        })->when($request->email, function($query) use ($request) {
            $query->where('email', 'like', "%{$request->email}%");
        })->when($request->subject, function($query) use ($request) {
            $query->where('subject', 'like', "%{$request->subject}%");
        })->when($request->message, function($query) use ($request) {
            $query->where('message', 'like', "%{$request->message}%");
        })->when($request->created_at, function($query) use ($request) {
            $query->whereDate('created_at', $request->created_at);
        })->when($request->start_date, function($query) use ($request) {
            $query->whereDate('created_at', '>=', $request->start_date);
        })->when($request->end_date, function($query) use ($request) {
            $query->whereDate('created_at', '<=', $request->end_date);
        });
    }
}
