<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class elsleaverequest extends Model
{
    protected $primaryKey = 'elsleaverequests_id'; // or null
    protected $fillable =  [
        'elsleaverequests_id',
		'elsleaverequests_empid',
		'elsleaverequests_leavetypeid',
		'elsleaverequests_leavesubmitdate',
		'elsleaverequests_leavestartdate',
		'elsleaverequests_leaveenddate',
		'elsleaverequests_usercomment',
		'elsleaverequests_approvercomment',
		'elsleaverequests_approverempid',
		'elsleaverequests_approverdate',
		'elsleaverequests_hrempid',
		'elsleaverequests_hrcomment',
		'elsleaverequests_hrdate',
		'elsleaverequests_cooempid',
		'elsleaverequests_coocomment',
		'elsleaverequests_coodate',
		'elsleaverequests_status',
		'elsleaverequests_managerstatus',
		'elsleaverequests_coostatus',
		'elsleaverequests_hrstatus',
		'elsleaverequests_changeby',
    ];
}
