<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'group_id', 'title', 'content'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
