<?php

namespace App\Models\Imprest;
use App\Models\Role;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class RetirementApproval extends Model
{
    protected $fillable = ['role_id','retirement_id','user_id','status','comment','action_date'];

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function imprest()
    {
        return $this->belongsTo(Retirement::class,'retirement_id');
    }
}
