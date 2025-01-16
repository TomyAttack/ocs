<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NeedApproval;

class NeedApprovalController extends Controller
{
    public function index()
    {
        $content = [
            'need_approvals' => NeedApproval::paginate(10)
        ];
        return inertia('NeedApproval/Index', $content);
    }
}
