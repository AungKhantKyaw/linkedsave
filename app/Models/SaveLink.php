<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaveLink extends Model
{
    protected $fillable = [
        'user_id',
        'link_url',
    ];
}
