<?php

namespace App\Models\Imprest;


use Illuminate\Database\Eloquent\Model;

class Retirement extends Model
{
    protected $fillable = ['imprest_id','user_id','total_retired_amount','balance_to_return',
                            'excess_expenditure','status','comment','date'];


    public function imprest() {
        return $this->belongsTo(Imprest::class);
    }
    public function expenses() {
        return $this->hasMany(RetirementExpense::class);
    }
    
    public function retirement() {
        return $this->belongsTo(Retirement::class);
    }

    public function approvals()  { 
        return $this->hasMany(RetirementApproval::class);
     }



}



