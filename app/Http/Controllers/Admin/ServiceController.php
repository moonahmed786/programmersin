<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

        // Search Implementation
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Sorting Implementation
        $sort = $request->input('sort', 'order');
        $direction = $request->input('direction', 'asc');
        
        $validSorts = ['title', 'price', 'order', 'is_active'];
        if (in_array($sort, $validSorts)) {
            $query->orderBy($sort, $direction);
        } else {
            $query->orderBy('order', 'asc');
        }

        $services = $query->paginate(15)->withQueryString();
        
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:100',
            'price'       => 'nullable|numeric|min:0',
            'order'       => 'nullable|integer|min:0',
        ]);

        $validated['slug']      = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active', true);

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        return redirect()->route('admin.services.edit', $service);
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:100',
            'price'       => 'nullable|numeric|min:0',
            'order'       => 'nullable|integer|min:0',
        ]);

        $validated['slug']      = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active');

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    /**
     * Public Services Catalog
     */
    public function publicCatalog()
    {
        $services = Service::where('is_active', true)->orderBy('order')->get();
        $headerMenus = \App\Models\Menu::header()->with('children')->get();
        $footerMenus = \App\Models\Menu::footer()->with('children')->get();

        return view('pages.services-catalog', compact('services', 'headerMenus', 'footerMenus'));
    }
}
