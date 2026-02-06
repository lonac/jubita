<?php

namespace App\Models\Imprest;

use Illuminate\Database\Eloquent\Model;

class RetirementExpense extends Model
{
    protected $fillable = ['retirement_id','name','description','quantity','rate','amount','receipt_path'];
}
