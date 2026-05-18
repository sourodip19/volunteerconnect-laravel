<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'category',
        'location',
        'date',
        'required_volunteers',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}