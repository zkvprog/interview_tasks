<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    public $fillable = ['script_name', 'start_time', 'end_time', 'result'];
    public $timestamps = false;
}
