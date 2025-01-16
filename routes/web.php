<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');
}); 

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'ProfileController@update')->name('profile.update');
    Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');
    
    /*  workflow approval */
    Route::get('/workflow-approvals', 'WorkflowApprovalController@index')->name('workflow_approvals');
    Route::get('/workflow-approvals/create', 'WorkflowApprovalController@create')->name('workflow_approvals.create');
    Route::post('/workflow-approvals/store', 'WorkflowApprovalController@store')->name('workflow_approvals.store');
    
    /* employee */
    Route::get('/employee', 'EmployeeController@index')->name('employee');
    Route::get('/employee/list', 'EmployeeController@list_employee')->name('employee.list');
    
    /* need-approval */
    Route::get('/need-approval', 'NeedApprovalController@index')->name('need_approval');

    /* transaction */
    Route::get('/transaction', 'TransactionController@index')->name('transaction');


});

require __DIR__.'/auth.php';
