<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeedApproval extends Model
{
    protected $primaryKey = 'idneed_approvals';

    protected $fillable = [
        'idworkflow_approvals', 'idtransactions', 'nik', 'name', 'email', 'position', 'level',
    ];
}
