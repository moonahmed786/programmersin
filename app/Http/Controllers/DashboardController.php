<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $stats = [
            'total_customers' => User::where('role', 'customer')->count(),
            'total_employees' => User::where('role', 'employee')->count(),
            'total_projects' => Project::count(),
            'total_services' => Service::count(),
            'recent_inquiries' => Inquiry::latest()->limit(5)->get(),
            'ongoing_projects' => Project::whereIn('status', ['pending', 'in_progress', 'review'])->with('service')->latest()->limit(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function employee()
    {
        $user = auth()->user();
        $projects = $user->employeeProjects()->latest()->get();
        $stats = [
            'assigned_projects' => $projects->count(),
            'ongoing_projects' => $projects->whereIn('status', ['pending', 'in_progress', 'review'])->count(),
            'completed_projects' => $projects->where('status', 'completed')->count(),
        ];

        return view('employee.dashboard', compact('stats', 'projects'));
    }

    public function customer()
    {
        $user = auth()->user();
        $projects = $user->customerProjects()->latest()->with('service')->get();
        $stats = [
            'total_projects' => $projects->count(),
            'ongoing_projects' => $projects->whereIn('status', ['pending', 'in_progress', 'review'])->count(),
        ];

        return view('customer.dashboard', compact('stats', 'projects'));
    }
}
