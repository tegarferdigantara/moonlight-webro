<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TUserLogin extends Model
{
    use HasFactory;

    protected $table = "tuserlogin";
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'session_id',
        'token',
        'login'
    ];
}
