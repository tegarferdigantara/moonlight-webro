<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AHTransactions extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $connection = 'RohanMall';

    protected $table = "AHTransactions";

    public $timestamps = false;
}
