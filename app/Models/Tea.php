<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tea extends Model
{
    protected $table = 'tea';

    protected $fillable = [
        'user_id',
        'tea_name',
        'shugar',
        'planing_time',
        'planing_date',
        'is_it_drunk',
        'favorite',
        'bonus_snack',
    ];
}
