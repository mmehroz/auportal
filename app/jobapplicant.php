<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobapplicant extends Model
{
	protected $table = 'jobapplicant';
    protected $primaryKey = 'Emp_id'; // or null
    protected $fillable =  [
        'jobapplicant_id','jobapplicant_name','jobapplicant_fname','jobapplicant_email','jobapplicant_cnic','jobapplicant_address','jobapplicant_qualification','jobapplicant_department','jobapplicant_designation','jobapplicant_experience','jobapplicant_contact','jobapplicant_cv','jobapplicant_picture','change_By','created_at','update_at'

    ];
}
