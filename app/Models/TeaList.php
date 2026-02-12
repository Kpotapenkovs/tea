<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeaList extends Model
{
    protected $table = 'tea_list';

    protected $fillable = [
        'user_id',
        'name',
    ];
}
