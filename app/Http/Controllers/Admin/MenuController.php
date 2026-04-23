<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('children')->whereNull('parent_id')->orderBy('location')->orderBy('order')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $parentMenus = Menu::whereNull('parent_id')->get();
        return view('admin.menus.create', compact('parentMenus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'url'       => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'location'  => 'required|in:header,footer',
            'order'     => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        Menu::create($validated);

        return redirect()->route('admin.menus.index')->with('success', 'Menu item created successfully.');
    }

    public function edit(Menu $menu)
    {
        $parentMenus = Menu::whereNull('parent_id')->where('id', '!=', $menu->id)->get();
        return view('admin.menus.edit', compact('menu', 'parentMenus'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'url'       => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'location'  => 'required|in:header,footer',
            'order'     => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $menu->update($validated);

        return redirect()->route('admin.menus.index')->with('success', 'Menu item updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('success', 'Menu item deleted successfully.');
    }
}
