<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'picture',
        'email',
        'phone_number',
        'join_date',
        'status'
    ];

   // protected $guarded = [];
}
