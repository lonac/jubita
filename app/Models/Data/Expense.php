<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setting\expenseCategory;

class Expense extends Model
{
    protected $fillable = ['expense_category_id','amount','description','date','reference_number','created_by'];

    public function expenseCategory()
    {
        return $this->belongsTo(expenseCategory::class,'expense_category_id');
    }
}



