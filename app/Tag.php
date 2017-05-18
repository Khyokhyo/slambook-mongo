<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Tag extends Model
{
    protected $guearded = ['_id'];
}
