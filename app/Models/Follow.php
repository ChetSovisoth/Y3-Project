<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Follow extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'following',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
