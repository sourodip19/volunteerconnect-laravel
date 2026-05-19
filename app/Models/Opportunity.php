<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
class Opportunity extends Model
{   
    public function applications()
{
    return $this->hasMany(Application::class);
}
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