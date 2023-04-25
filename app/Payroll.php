<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable=['Start_time','End_time','Time_long','Date'];
}
