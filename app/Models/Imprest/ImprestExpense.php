<?php

namespace App\Models\Imprest;

use Illuminate\Database\Eloquent\Model;

class ImprestExpense extends Model
{
    protected $fillable = ['imprest_id','name','amount','quantity','rate'];
}
