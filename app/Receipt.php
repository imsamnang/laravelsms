<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table = 'receipts';
    protected $primaryKey = 'receipt_id';
    public $timestamps = false;

    static public function autoNumber()
    {
    	$id = 0;
    	$receiptID = Receipt::max('receipt_id');

    	if($receiptID!=0)
    	{
    		$id = $receiptID+1;
    		Receipt::insert(['receipt_id'=>$id]);
    	}else
    	{
    		$id = 1;
    		Receipt::insert(['receipt_id'=>$id]);
    	}
    	return $id;
    }



}
