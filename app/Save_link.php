<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Save_link extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'link_url',
    ];


}
