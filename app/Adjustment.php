<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    protected $fillable=['name','EMP_BADGE_ID','adjustment','AdjMonth'];
}
