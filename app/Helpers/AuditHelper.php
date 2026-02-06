<?php

use App\Models\Setting\AuditLog;
use Illuminate\Support\Facades\Auth;

if (! function_exists('audit_log')) {
    function audit_log($action, $details = null)
    {
        AuditLog::create([
            'user_id'   => Auth::id(),
            'action'    => $action,
            'details'   => $details,
            'ip_address'=> request()->ip(),
            'user_agent'=> request()->header('User-Agent'),
        ]);
    }
}
