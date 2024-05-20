<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'institute',
        'field_of_study',
        'academic_level',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
