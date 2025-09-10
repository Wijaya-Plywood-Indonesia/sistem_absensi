<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // GET /employees
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    // GET /employees/create
    public function create()
    {
        return view('employees.create');
    }

    // POST /employees
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'gender' => 'required|string',
            'joined_date' => 'required|date',
            'phone_number' => 'required|string|max:20',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee berhasil ditambahkan.');
    }

    // GET /employees/{employee}/edit
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    // PUT /employees/{employee}
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'gender' => 'required|string',
            'joined_date' => 'required|date',
            'phone_number' => 'required|string|max:20',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee berhasil diperbarui.');
    }

    // DELETE /employees/{employee}
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee berhasil dihapus.');
    }
}
