<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Req extends Model
{
    protected $guearded = ['_id'];
}
