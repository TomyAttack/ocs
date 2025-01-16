<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkflowApproval;
use App\Models\Transaction;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use DB;

class WorkflowApprovalController extends Controller
{
    public function index()
    {
        $content = [
            'workflowapprovals' => WorkflowApproval::paginate(10)
        ];
        return inertia('WorkflowApproval/Index', $content);
    }

    public function create()
    {
        $content = [
        ];

        return inertia('WorkflowApproval/Create', $content);
    }

    public function store(Request $request)
    {
        $request->validate([
            "modul" => 'required',
            "type" => 'required',
            "value" => '',
            "nik" => '',
            "name" => 'required',
            "email" => 'required|string|lowercase|email|max:255',
            "position" => 'required'
        ]);

        $name = $email = $position = '';
        if ($request->nik == null) {
            $do_employee = new Employee;
            $do_employee->name = $request->name;
            $do_employee->email = $request->email;
            $do_employee->position = $request->position;
            $do_employee->save();
        }else{
            $do_employee = Employee::find($request->nik);
        }

        $do_workflow = new WorkflowApproval;
        $do_workflow->modul = $request->modul;
        $do_workflow->type = $request->type;
        $do_workflow->value = $request->value;
        $do_workflow->nik = $do_employee->nik;
        $do_workflow->name = $request->name;
        $do_workflow->email = $request->email;
        $do_workflow->position = $request->position;
        $do_workflow->save();

        $get_transaction = Transaction::where('idworkflow_approvals', $do_workflow->idworkflow_approvals)->get()->count();
        $amount = $get_transaction > 0 ? $get_transaction++ :       1;
        
        $do_transaction = new Transaction;
        $do_transaction->idworkflow_approvals = $do_workflow->idworkflow_approvals;
        $do_transaction->amount = $amount;
        $do_transaction->createdBy = Auth::id();
        $do_transaction->save();


        DB::select("CALL SaveProcedure($do_workflow->idworkflow_approvals,  
                $do_transaction->idtransactions,
                $do_workflow->value)");

        return to_route('workflow_approvals');
    }

}
