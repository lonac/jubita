<?php

namespace App\Models\Imprest;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;


class ImprestApproval extends Model
{
    protected $fillable = ['imprest_id','role_id','status','user_id','comment','action_date'];

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
        return $this->belongsTo(Imprest::class,'imprest_id');
    }
}

