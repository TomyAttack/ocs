<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $primaryKey = 'nik';

    protected $fillable = [
        'name', 'email', 'position', 'approver1_name', 'approver1_email', 'approver1_position', 'approver2_name', 'approver2_email', 'approver2_position',
    ];
}
