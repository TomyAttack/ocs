<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $content = [
            'employee' => Employee::paginate(10)
        ];
        return inertia('Employee/Index', $content);
    }

    public function list_employee(Request $request)
    {
        $emp = Employee::select('name','email', 'position')->where('nik', 'LIKE', "%$request->nik%")->first();

        return response()->json( $emp);
    }
}
