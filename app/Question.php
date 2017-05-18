<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Question extends Model
{
    protected $guearded = ['_id'];
}
