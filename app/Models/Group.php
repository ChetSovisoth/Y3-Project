<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\Followable;
use Illuminate\Notifications\Notifiable;

class Group extends Model
{
    use HasFactory, Followable, Notifiable;
    protected $fillable = [
        "user_id",
        "uuid",
        "name",
        "code",
        "photo",
        "description"
    ];

    protected static function boot()
    {
        parent::boot();

        // Registering the creating event listener
        static::creating(function ($model) {
            // $model refers to the instance of the model being created
            $model->code = self::generateJoinCode();
        });
    }

    public static function generateJoinCode()
    {
        do {
            $code = self::generateRandomString();
        } while (self::where('code', $code)->exists());

        return $code;
    }

    public static function generateRandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function getGroupPhotoByPhoto($photo)
    {
        // Assuming 'profile_picture' is the name of the column storing the picture file name
        return "/storage/group-photos/" . $photo;
    }

    public static function getGroupDetail($uuid)
    {
        // Assuming 'profile_picture' is the name of the column storing the picture file name
        return self::where("uuid", $uuid)->first();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
