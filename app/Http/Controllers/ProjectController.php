<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->isSuperAdmin()) {
            $projects = Project::with(['customer', 'service'])->latest()->paginate(10);
        } elseif ($user->isEmployee()) {
            $projects = $user->assignedProjects()->with(['customer', 'service'])->latest()->paginate(10);
        } else {
            $projects = Project::where('customer_id', $user->id)->with('service')->latest()->paginate(10);
        }

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403);
        }

        $services = Service::where('is_active', true)->get();
        $customers = User::where('role', 'customer')->get();
        return view('projects.create', compact('services', 'customers'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'customer_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'status' => 'required|in:pending,in_progress,review,completed,cancelled',
            'budget' => 'nullable|numeric',
            'due_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $user = auth()->user();
        
        // Authorization check
        if ($user->isCustomer() && $project->customer_id !== $user->id) {
            abort(403);
        }
        
        if ($user->isEmployee() && !$project->employees->contains($user->id)) {
            abort(403);
        }

        return view('projects.show', compact('project'));
    }
}
