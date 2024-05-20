<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_of_expertise',
        'education_level',
        'experience',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
