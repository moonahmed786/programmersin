<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the specified dynamic page.
     */
    public function show($slug)
    {
        $page = Page::published()->where('slug', $slug)->firstOrFail();
        
        // Fetch menus for the layout
        $headerMenus = \App\Models\Menu::header()->with('children')->get();
        $footerMenus = \App\Models\Menu::footer()->with('children')->get();

        return view('pages.dynamic', compact('page', 'headerMenus', 'footerMenus'));
    }
}
