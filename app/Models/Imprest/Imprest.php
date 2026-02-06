<?php

namespace App\Models\Imprest;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setting\ImprestType;
use App\Models\Setting\Department;
use App\Models\Setting\Occupation;
use App\Models\User;

class Imprest extends Model
{
    protected $fillable = [
        'user_id',
        'imprest_type_id',
        'department_id',
        'occupation_id',
        'salary_scale',
        'role_id',
        'date',
        'allowance_id',
        'subsistence_rate',
        'start_date',
        'end_date',
        'purpose',
        'safari_destination',
        'total_nights',
        'total_requested_amount',
        'status',
    ];

    // Relationships
    public function user()       { return $this->belongsTo(User::class,'user_id'); }
    public function department() { return $this->belongsTo(Department::class); }
    public function type()       { return $this->belongsTo(ImprestType::class, 'imprest_type_id'); }
    public function designation(){ return $this->belongsTo(Occupation::class,'occupation_id'); }
    public function role()       { return $this->belongsTo(Role::class); }
    public function allowance()  { return $this->belongsTo(Allowance::class); }
    public function expenses()  { return $this->hasMany(ImprestExpense::class); }
    public function approvals()  { return $this->hasMany(ImprestApproval::class); }
    public function retirement()  { return $this->hasOne(Retirement::class); }




    
}
