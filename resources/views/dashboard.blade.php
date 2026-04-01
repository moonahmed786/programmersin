@extends("layouts.app")
@section("content")

<!-- SideNavBar (Authority Source: JSON) -->
<aside class="h-screen w-64 fixed left-0 top-0 bg-slate-50 dark:bg-slate-900 flex flex-col h-full font-inter tracking-tight z-50">
<div class="p-6 flex flex-col gap-1">
<div class="flex items-center gap-3 px-2">
<div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center text-on-primary">
<span class="material-symbols-outlined text-lg">terminal</span>
</div>
<div class="flex flex-col">
<span class="text-lg font-bold tracking-tighter text-slate-900 dark:text-slate-50">Programmers.in</span>
<span class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold">IT Services Admin</span>
</div>
</div>
</div>
<nav class="flex-1 px-4 mt-4 space-y-1">
<!-- Active Tab: Dashboard Overview -->
<a class="flex items-center gap-3 px-4 py-3 text-blue-700 dark:text-blue-400 font-semibold border-r-4 border-blue-700 dark:border-blue-400 bg-white dark:bg-slate-800 transition-opacity Active: opacity-90" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span class="text-sm">Dashboard Overview</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="payments">payments</span>
<span class="text-sm">Pricing &amp; Packages</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
<span class="text-sm">Product Showcase</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="settings_suggest">settings_suggest</span>
<span class="text-sm">Services Management</span>
</a>
</nav>
<div class="px-6 py-6">
<button class="w-full py-3 bg-gradient-to-r from-primary to-primary-container text-on-primary rounded-xl font-semibold text-sm shadow-lg shadow-primary/20 flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">add</span>
                Add New Project
            </button>
</div>
<div class="px-4 py-6 border-t border-slate-100 dark:border-slate-800 space-y-1">
<a class="flex items-center gap-3 px-4 py-2 text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors" href="#">
<span class="material-symbols-outlined text-sm" data-icon="help">help</span>
<span class="text-sm font-medium">Help Center</span>
</a>
<a class="flex items-center gap-3 px-4 py-2 text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors" href="#">
<span class="material-symbols-outlined text-sm" data-icon="logout">logout</span>
<span class="text-sm font-medium">Logout</span>
</a>
</div>
</aside>
<!-- TopAppBar (Authority Source: JSON) -->
<header class="fixed top-0 right-0 w-[calc(100%-16rem)] z-40 bg-white/70 dark:bg-slate-900/70 backdrop-blur-md flex items-center justify-between px-8 h-16 font-inter text-sm shadow-sm dark:shadow-none">
<div class="flex items-center flex-1 max-w-lg">
<div class="relative w-full">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
<input class="w-full bg-surface-container-low border-none rounded-lg pl-10 pr-4 py-2 focus:ring-2 focus:ring-blue-500/40 text-on-surface" placeholder="Search services, clients, or projects..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg relative">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
<button class="p-2 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<div class="h-8 w-[1px] bg-slate-200 dark:bg-slate-800 mx-2"></div>
<button class="bg-primary text-on-primary px-4 py-2 rounded-lg font-medium flex items-center gap-2 hover:opacity-90 transition-opacity">
<span>Add New</span>
</button>
<div class="flex items-center gap-3 pl-2">
<img alt="User Admin Avatar" class="w-8 h-8 rounded-full border border-slate-200 dark:border-slate-700" data-alt="Close-up professional portrait of a tech executive with short hair, smiling confidently in soft studio lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDP6yEWzVWyZMMeHfXBRS9KWYkJR8DYMj0EEgIqgLV11XHPpqd2vH5K8-fRo1viqTsNghn-3AJBDe6lVFE6f7f4YU3j_nyAK8HgqUuLd9NKAxtR25EoowfyDbF0Sq01p2kJVFg0mBgYeTVwBfIiH0l40JBITo3L1isjcX3mMmRt0ezdUX5e9CaLT6AbxGthAG_ejjTjANT5AVyQ2e5xZGRn3yBNx9AdX1bEsETIWRqXTvn7FoqBuqWcSZ1o5QTTI-g5W-Cc5ew5Rof7"/>
</div>
</div>
</header>
<!-- Main Content Canvas -->
<main class="ml-64 pt-24 pb-12 px-8 min-h-screen">
<!-- Header Section -->
<header class="mb-10 flex items-end justify-between">
<div>
<h1 class="text-3xl font-extrabold tracking-tight text-on-surface mb-1">Dashboard Overview</h1>
<p class="text-on-surface-variant font-medium">Real-time infrastructure and service health metrics.</p>
</div>
<div class="flex gap-3">
<button class="px-4 py-2 text-primary font-semibold text-sm hover:bg-primary/5 rounded-lg transition-colors">Generate Report</button>
<button class="px-4 py-2 bg-on-surface text-surface rounded-lg font-semibold text-sm hover:opacity-90 transition-opacity">Manage Instances</button>
</div>
</header>
<!-- Stats Bento Grid -->
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
<!-- Active Packages -->
<div class="bg-surface-container-lowest p-6 rounded-xl group hover:shadow-lg transition-all duration-300">
<div class="flex justify-between items-start mb-4">
<div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">package</span>
</div>
<span class="text-tertiary font-bold text-xs bg-tertiary-fixed/30 px-2 py-1 rounded">+12%</span>
</div>
<h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest mb-1">Active Packages</h3>
<div class="text-3xl font-extrabold text-on-surface">42</div>
</div>
<!-- Live Products -->
<div class="bg-surface-container-lowest p-6 rounded-xl group hover:shadow-lg transition-all duration-300">
<div class="flex justify-between items-start mb-4">
<div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">rocket_launch</span>
</div>
<span class="text-on-surface-variant font-bold text-xs bg-surface-container-low px-2 py-1 rounded">Stable</span>
</div>
<h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest mb-1">Live Products</h3>
<div class="text-3xl font-extrabold text-on-surface">158</div>
</div>
<!-- Total Services -->
<div class="bg-surface-container-lowest p-6 rounded-xl group hover:shadow-lg transition-all duration-300">
<div class="flex justify-between items-start mb-4">
<div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">settings_input_component</span>
</div>
<span class="text-primary font-bold text-xs bg-primary-fixed/30 px-2 py-1 rounded">Update Req</span>
</div>
<h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest mb-1">Total Services</h3>
<div class="text-3xl font-extrabold text-on-surface">24</div>
</div>
<!-- Active Inquiries -->
<div class="bg-surface-container-lowest p-6 rounded-xl group hover:shadow-lg transition-all duration-300">
<div class="flex justify-between items-start mb-4">
<div class="w-12 h-12 rounded-xl bg-rose-50 flex items-center justify-center text-rose-600">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">forum</span>
</div>
<span class="text-error font-bold text-xs bg-error-container px-2 py-1 rounded">8 New</span>
</div>
<h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest mb-1">Active Inquiries</h3>
<div class="text-3xl font-extrabold text-on-surface">89</div>
</div>
</section>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Main Content Area -->
<div class="lg:col-span-2 space-y-8">
<!-- Upcoming Deliverables Table -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden">
<div class="px-8 py-6 flex items-center justify-between">
<h2 class="text-lg font-bold text-on-surface tracking-tight">Upcoming Deliverables</h2>
<button class="text-primary font-bold text-sm">View All</button>
</div>
<div class="overflow-x-auto">
<table class="w-full border-collapse">
<thead>
<tr class="bg-surface-container-high">
<th class="px-8 py-4 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Project Name</th>
<th class="px-8 py-4 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Lead Developer</th>
<th class="px-8 py-4 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Due Date</th>
<th class="px-8 py-4 text-right text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Status</th>
</tr>
</thead>
<tbody class="divide-y-0">
<tr class="group hover:bg-surface-container-low transition-colors">
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="w-2 h-2 rounded-full bg-primary"></div>
<span class="font-semibold text-sm">Cloud Infrastructure v2</span>
</div>
</td>
<td class="px-8 py-5 text-sm text-on-surface-variant font-medium">Marcus Chen</td>
<td class="px-8 py-5 text-sm font-medium">Oct 24, 2023</td>
<td class="px-8 py-5 text-right">
<span class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded-full text-xs font-bold text-on-surface-variant">
<span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                            In Progress
                                        </span>
</td>
</tr>
<tr class="group hover:bg-surface-container-low transition-colors">
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="w-2 h-2 rounded-full bg-tertiary"></div>
<span class="font-semibold text-sm">Security Audit Alpha</span>
</div>
</td>
<td class="px-8 py-5 text-sm text-on-surface-variant font-medium">Sarah Jenkins</td>
<td class="px-8 py-5 text-sm font-medium">Oct 26, 2023</td>
<td class="px-8 py-5 text-right">
<span class="inline-flex items-center gap-2 px-3 py-1 bg-tertiary-fixed/30 rounded-full text-xs font-bold text-on-tertiary-fixed-variant">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                                            Final Review
                                        </span>
</td>
</tr>
<tr class="group hover:bg-surface-container-low transition-colors">
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="w-2 h-2 rounded-full bg-error"></div>
<span class="font-semibold text-sm">Mobile App Core</span>
</div>
</td>
<td class="px-8 py-5 text-sm text-on-surface-variant font-medium">Alex Rivera</td>
<td class="px-8 py-5 text-sm font-medium">Oct 21, 2023</td>
<td class="px-8 py-5 text-right">
<span class="inline-flex items-center gap-2 px-3 py-1 bg-error-container rounded-full text-xs font-bold text-on-error-container">
<span class="w-1.5 h-1.5 rounded-full bg-error"></span>
                                            Delayed
                                        </span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Featured Project Insight -->
<div class="relative rounded-xl overflow-hidden min-h-[240px] bg-slate-900 group">
<img alt="Cybersecurity Visualization" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-105 transition-transform duration-700" data-alt="Digital network mesh of circuit lines and glowing binary code on a deep blue technology background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDd2-36NwBzF02PIRWcGjtkN-DQHQw6CC3xUXSuMOH1sUdG3u1nojk7ixtVXLdPByck7KIDpeBzjqQK-iWYnxo-zzJFANpVy-5jp9jtHDHd7yJMcjhzTmiaiR9JEWlI4HwTqyoBriu2s1iCZ0kTGEyx-ZdaXmZW5K5yJu4t4nCgX7MSiCqJ-DhUDw5W5y2t89rV5pm09EKctVeACBNfQRaQyB0kbCBgKLHOqPZZ-RjCyD1l4C5r74TGfWDnM-ehTET-yuzPA6sJtJ6d"/>
<div class="relative p-8 h-full flex flex-col justify-between">
<div class="inline-flex px-3 py-1 bg-blue-500/20 backdrop-blur-md rounded-full border border-blue-400/30 text-blue-300 text-xs font-bold tracking-widest uppercase mb-4 w-fit">
                            Live Performance
                        </div>
<div>
<h2 class="text-white text-2xl font-bold mb-2 tracking-tight">Main Infrastructure Scaling</h2>
<p class="text-slate-300 text-sm max-w-md leading-relaxed">System load is currently balanced across 3 regions. Auto-scaling triggered 14 minutes ago to manage incoming peak traffic.</p>
</div>
</div>
</div>
</div>
<!-- Sidebar Content -->
<div class="space-y-8">
<!-- Recent Activity Feed -->
<div class="bg-surface-container-lowest rounded-xl p-8">
<h2 class="text-lg font-bold text-on-surface tracking-tight mb-6">Recent Activity</h2>
<div class="space-y-6">
<div class="flex gap-4">
<div class="relative">
<div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-xl">check_circle</span>
</div>
<div class="absolute top-10 left-1/2 -translate-x-1/2 w-[2px] h-6 bg-surface-container"></div>
</div>
<div class="flex flex-col">
<p class="text-sm font-semibold text-on-surface">'Inventory Pro SaaS' <span class="font-normal text-on-surface-variant">marked as</span> Live</p>
<span class="text-[11px] text-on-surface-variant font-bold uppercase tracking-wider mt-1">2 mins ago</span>
</div>
</div>
<div class="flex gap-4">
<div class="relative">
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-xl">edit</span>
</div>
<div class="absolute top-10 left-1/2 -translate-x-1/2 w-[2px] h-6 bg-surface-container"></div>
</div>
<div class="flex flex-col">
<p class="text-sm font-semibold text-on-surface">D. Roberts <span class="font-normal text-on-surface-variant">updated pricing for</span> Silver Plan</p>
<span class="text-[11px] text-on-surface-variant font-bold uppercase tracking-wider mt-1">45 mins ago</span>
</div>
</div>
<div class="flex gap-4">
<div class="relative">
<div class="w-10 h-10 rounded-full bg-tertiary-fixed flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-xl">person_add</span>
</div>
<div class="absolute top-10 left-1/2 -translate-x-1/2 w-[2px] h-6 bg-surface-container"></div>
</div>
<div class="flex flex-col">
<p class="text-sm font-semibold text-on-surface">New Inquiry <span class="font-normal text-on-surface-variant">from</span> GlobalLogistics Ltd.</p>
<span class="text-[11px] text-on-surface-variant font-bold uppercase tracking-wider mt-1">2 hours ago</span>
</div>
</div>
<div class="flex gap-4">
<div class="w-10 h-10 rounded-full bg-error-container flex items-center justify-center text-error">
<span class="material-symbols-outlined text-xl">warning</span>
</div>
<div class="flex flex-col">
<p class="text-sm font-semibold text-on-surface">API Endpoint <span class="font-normal text-on-surface-variant">detected 500 errors</span></p>
<span class="text-[11px] text-on-surface-variant font-bold uppercase tracking-wider mt-1">5 hours ago</span>
</div>
</div>
</div>
</div>
<!-- Quick Actions -->
<div class="bg-primary/5 rounded-xl p-8 border border-primary/10">
<h2 class="text-lg font-bold text-on-surface tracking-tight mb-6">Quick Actions</h2>
<div class="space-y-3">
<button class="w-full flex items-center justify-between p-4 bg-surface-container-lowest rounded-lg hover:bg-primary hover:text-on-primary transition-all duration-300 group shadow-sm">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined">add_box</span>
<span class="text-sm font-bold tracking-tight">Add New Package</span>
</div>
<span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all">arrow_forward</span>
</button>
<button class="w-full flex items-center justify-between p-4 bg-surface-container-lowest rounded-lg hover:bg-primary hover:text-on-primary transition-all duration-300 group shadow-sm">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined">auto_awesome_motion</span>
<span class="text-sm font-bold tracking-tight">Edit Showcase</span>
</div>
<span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all">arrow_forward</span>
</button>
<button class="w-full flex items-center justify-between p-4 bg-surface-container-lowest rounded-lg hover:bg-primary hover:text-on-primary transition-all duration-300 group shadow-sm">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined">groups</span>
<span class="text-sm font-bold tracking-tight">Team Permissions</span>
</div>
<span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all">arrow_forward</span>
</button>
</div>
</div>
</div>
</div>
</main>

@endsection