<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
   protected $table = 'studentfees';
   protected $primaryKey = 's_fee_id';
   protected $fillable =['fee_id',
   						'student_id',
   						'level_id',
   						'amount',
   						'discount'
   						];
   	public $timestamps =false;
}
