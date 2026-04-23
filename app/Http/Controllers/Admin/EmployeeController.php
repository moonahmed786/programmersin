<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'employee');

        // Search Implementation
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('position', 'like', "%{$search}%");
            });
        }

        // Sorting Implementation
        $sort = $request->input('sort', 'created_at');
        $direction = $request->input('direction', 'desc');
        
        $validSorts = ['name', 'email', 'position', 'is_active', 'created_at'];
        if (in_array($sort, $validSorts)) {
            $query->orderBy($sort, $direction);
        } else {
            $query->latest();
        }

        $employees = $query->paginate(15)->withQueryString();
        
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|string|min:8|confirmed',
            'phone'             => 'nullable|string|max:30',
            'location'          => 'nullable|string|max:255',
            'position'          => 'nullable|string|max:255',
            'bio'               => 'nullable|string',
            'education'         => 'nullable|array',
            'skills'            => 'nullable|array',
            'experience'        => 'nullable|array',
        ]);

        $validated['role']      = 'employee';
        $validated['password']  = Hash::make($validated['password']);
        $validated['is_active'] = $request->boolean('is_active', true);

        User::create($validated);

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show(User $employee)
    {
        return redirect()->route('admin.employees.edit', $employee);
    }

    public function edit(User $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, User $employee)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => ['required', 'email', Rule::unique('users')->ignore($employee->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'phone'    => 'nullable|string|max:30',
            'location' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'bio'      => 'nullable|string',
            'education' => 'nullable|array',
            'skills'    => 'nullable|array',
            'experience' => 'nullable|array',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['is_active'] = $request->boolean('is_active');

        $employee->update($validated);

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(User $employee)
    {
        // Deactivate instead of hard delete to preserve project references
        $employee->update(['is_active' => false]);

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee has been deactivated.');
    }
}
