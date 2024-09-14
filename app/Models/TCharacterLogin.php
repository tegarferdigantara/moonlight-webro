<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCharacterLogin extends Model
{
    use HasFactory;

    protected $guarded = ['char_id'];

    protected $connection = 'RohanGame';

    protected $table = "TCharacterLogin";

    public $timestamps = false;
}
