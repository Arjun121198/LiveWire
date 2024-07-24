<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livewire\EmployeeForm;
use App\Models\Employee;

class EmployeeController extends Controller
{
    protected $employeeForm;

    /**
     * Create a new controller instance.
     *
     * @param EmployeeLivewire $employeeForm
     */
    public function __construct(EmployeeForm $employeeForm)
    {
        $this->employeeForm = $employeeForm;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
}
