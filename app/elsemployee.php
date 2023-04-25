<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class elsemployee extends Model
{
    protected $primaryKey = 'elsemployees_empid'; // or null
    protected $fillable =  [
        'elsemployees_empid',
		'elsemployees_batchid',
		'elsemployees_name',
		'elsemployees_fname',
		'elsemployees_cnic',
		'elsemployees_cno',
		'elsemployees_email',
		'elsemployees_password',
		'elsemployees_image',
		'elsemployees_dofbirth',
		'elsemployees_dofjoining',
		'elsemployees_address',
		'elsemployees_departid',
		'elsemployees_desgid',
		'elsemployees_reportingto',
		'elsemployees_status',
		'elsemployees_annualleaves',
		'elsemployees_sickleaves',
		'elsemployees_changeby',
		'elsemployees_addby',
		'created_at',
		'updated_at',
		'account_title',
		'account_no',
		'iban_no',
		'bank_branch',
		'bank_name',
		'elsemployees_emailaddress',
		'elsemployees_emailpassword',
		'elsemployees_emailhost',
    ];

    public function leaverequest()
    {
    	return $this->hasMany('App\elsleaverequest', 'elsleaverequests_empid');
    }
}
