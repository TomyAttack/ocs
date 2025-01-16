<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::select([
            'workflow_approvals.modul as modul',
            'transactions.amount',
            'employees.name AS createdBy',
        ])
        ->join('employees', 'employees.nik', '=', 'transactions.createdBy')
        ->join('workflow_approvals', 'workflow_approvals.idworkflow_approvals', '=', 'transactions.idworkflow_approvals')
        ->paginate(10);

        $content = [
            'transaction' => $transaction
        ];
        return inertia('Transaction/Index', $content);
    }
}
