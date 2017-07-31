<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title', 'text', 'alias', 'bg', 'button_name'
    ];
}
