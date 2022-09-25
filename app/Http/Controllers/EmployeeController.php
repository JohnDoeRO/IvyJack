<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Company;
use Exception;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return view('employee.index', compact('employees'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $companies = Company::all(['id', 'name']);
        return view('employee.create', compact('companies'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(EmployeeRequest $request)
    {
        try {
            Employee::create($request->all());
            return redirect()->route('employees.index')->with('success', 'Create successuful !');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('employees.index')->with('success', 'Errors: ' . $e->getMessage());
        }
    }

    /**
     * show
     *
     * @param  mixed $employee
     * @return void
     */
    public function show(Employee $employee)
    {
        $employee->load('company');
        return view('employee.show', compact('employee'));
    }

    /**
     * edit
     *
     * @param  mixed $employee
     * @return void
     */
    public function edit(Employee $employee)
    {
        $employee->load('company');
        $companies = Company::all(['id', 'name']);
        return view('employee.edit', compact('employee', 'companies'));
    }


    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $employee
     * @return void
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        try {
            $employee->fill($request->all())->save();
            return redirect()->route('employees.index')->with('success', 'Update successuful !');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('employees.index')->with('success', 'Errors: ' . $e->getMessage());
        }
    }


    /**
     * destroy
     *
     * @param  mixed $employee
     * @return void
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return redirect()->route('employees.index')->with('success', 'Deleted successuful !');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('employees.index')->with('success', 'Errors: ' . $e->getMessage());
        }
    }
}
