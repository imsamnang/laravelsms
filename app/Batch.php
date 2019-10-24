<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected  $table = 'batchs';
    protected  $fillable = ['batch'];
    protected  $primaryKey = 'batch_id';
    public $timestamps = false;
}
