<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Answer extends Model
{
    protected $guearded = ['_id'];
}
