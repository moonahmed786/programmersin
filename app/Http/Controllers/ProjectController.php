<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = Project::query()->with(['customer', 'service']);
        
        // Search Implementation
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Sorting Implementation
        $sort = $request->input('sort', 'created_at');
        $direction = $request->input('direction', 'desc');
        
        $validSorts = ['title', 'status', 'created_at', 'budget'];
        if (in_array($sort, $validSorts)) {
            $query->orderBy($sort, $direction);
        } else {
            $query->latest();
        }

        if ($user->isSuperAdmin()) {
            // No extra filtering
        } elseif ($user->isEmployee()) {
            $query->whereHas('employees', function($q) use ($user) {
                $q->where('employee_id', $user->id);
            });
        } else {
            $query->where('customer_id', $user->id);
        }

        $projects = $query->paginate(10)->withQueryString();

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

    public function edit(Project $project)
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403);
        }

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,review,completed,cancelled',
            'is_public' => 'boolean',
            'featured_image' => 'nullable|image|max:2048',
            'showcase_description' => 'nullable|string',
        ]);

        $validated['is_public'] = $request->has('is_public');

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Public Portfolio List
     */
    public function portfolio()
    {
        $projects = Project::where('is_public', true)->with('service')->latest()->paginate(9);
        $headerMenus = \App\Models\Menu::header()->with('children')->get();
        $footerMenus = \App\Models\Menu::footer()->with('children')->get();

        return view('pages.portfolio', compact('projects', 'headerMenus', 'footerMenus'));
    }

    /**
     * Public Showcase Detail
     */
    public function showcase($slug)
    {
        $project = Project::where('is_public', true)->where('slug', $slug)->firstOrFail();
        $headerMenus = \App\Models\Menu::header()->with('children')->get();
        $footerMenus = \App\Models\Menu::footer()->with('children')->get();

        return view('pages.showcase', compact('project', 'headerMenus', 'footerMenus'));
    }
}
