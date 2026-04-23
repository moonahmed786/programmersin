<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function show(User $employee)
    {
        if ($employee->role !== 'employee' || !$employee->is_active) {
            abort(404);
        }

        return view('pages.employee-portfolio', compact('employee'));
    }
}
