<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'idtransactions';

    protected $fillable = [
        'idworkflow_approvals','amount', 'createdBy',
    ];
}
