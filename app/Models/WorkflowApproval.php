<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowApproval extends Model
{
    protected $primaryKey = 'idworkflow_approvals';

    protected $fillable = [
        'modul', 'type', 'value', 'nik', 'name', 'email', 'position',
    ];

}
