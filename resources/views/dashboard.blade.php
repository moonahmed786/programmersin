@extends("layouts.app")
@section("content")

<!-- SideNavBar (Authority Source: JSON) -->
<aside class="h-screen w-64 fixed left-0 top-0 bg-surface border-r border-outline-variant/30 flex flex-col h-full font-inter tracking-tight z-50">
    <div class="p-6 flex flex-col gap-1">
        <div class="flex items-center gap-3 px-2">
            <div class="w-8 h-8 rounded bg-primary flex items-center justify-center text-on-primary shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined text-lg">terminal</span>
            </div>
            <div class="flex flex-col">
                <span class="text-lg font-bold tracking-tighter text-on-surface">Programmers.in</span>
                <span class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold opacity-70">Internal Access Node</span>
            </div>
        </div>
    </div>
    <nav class="flex-1 px-4 mt-6 space-y-1.5">
        <!-- Active Tab: Dashboard Overview -->
        <a class="flex items-center gap-3 px-4 py-3 bg-primary text-on-primary rounded shadow-lg shadow-primary/20 transition-all font-bold" href="#">
            <span class="material-symbols-outlined text-xl">grid_view</span>
            <span class="text-sm tracking-tight">Dashboard Overview</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-primary hover:bg-primary/5 rounded transition-all font-medium" href="#">
            <span class="material-symbols-outlined text-xl">payments</span>
            <span class="text-sm tracking-tight">Pricing &amp; Packages</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-primary hover:bg-primary/5 rounded transition-all font-medium" href="#">
            <span class="material-symbols-outlined text-xl">inventory_2</span>
            <span class="text-sm tracking-tight">Product Showcase</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-primary hover:bg-primary/5 rounded transition-all font-medium" href="#">
            <span class="material-symbols-outlined text-xl">settings_suggest</span>
            <span class="text-sm tracking-tight">Services Management</span>
        </a>
    </nav>
    <div class="px-6 py-6 mt-auto">
        <button class="w-full py-3 bg-primary text-white rounded font-bold text-sm shadow-lg shadow-primary/20 flex items-center justify-center gap-2 hover:brightness-110 transition-all">
            <span class="material-symbols-outlined text-sm">add</span>
            Add New Project
        </button>
    </div>
    <div class="px-4 py-6 border-t border-outline-variant/30 space-y-1.5">
        <a class="flex items-center gap-3 px-4 py-2 text-on-surface-variant hover:text-primary hover:bg-primary/5 rounded transition-all font-medium" href="#">
            <span class="material-symbols-outlined text-sm">help</span>
            <span class="text-sm">Help Center</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-2 text-on-surface-variant hover:text-error hover:bg-error-container/20 rounded transition-all font-medium" href="#">
            <span class="material-symbols-outlined text-sm">logout</span>
            <span class="text-sm">Logout</span>
        </a>
    </div>
</aside>

<!-- TopAppBar (Authority Source: JSON) -->
<header class="fixed top-0 right-0 w-[calc(100%-16rem)] z-40 bg-white/80 backdrop-blur-md flex items-center justify-between px-8 h-16 font-inter border-b border-outline-variant/30">
    <div class="flex items-center flex-1 max-w-lg">
        <div class="relative w-full group">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary transition-colors text-xl">search</span>
            <input class="w-full bg-surface-container-low border border-outline-variant/30 rounded pl-10 pr-4 py-2 focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none text-on-surface text-sm transition-all" placeholder="Search infrastructure nodes..." type="text"/>
        </div>
    </div>
    <div class="flex items-center gap-4">
        <button class="p-2 text-on-surface-variant hover:bg-surface-container rounded relative transition-all">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-2 right-2 w-2 h-2 bg-primary rounded ring-2 ring-white"></span>
        </button>
        <button class="p-2 text-on-surface-variant hover:bg-surface-container rounded transition-all">
            <span class="material-symbols-outlined">settings</span>
        </button>
        <div class="h-8 w-px bg-outline-variant/30 mx-2"></div>
        <button class="bg-primary text-white px-4 py-2 rounded font-bold text-sm hover:brightness-110 transition-all shadow-sm">
            <span>Add New</span>
        </button>
        <div class="flex items-center gap-3 pl-2">
            <img alt="User Admin Avatar" class="w-8 h-8 rounded border border-outline-variant/30" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDP6yEWzVWyZMMeHfXBRS9KWYkJR8DYMj0EEgIqgLV11XHPpqd2vH5K8-fRo1viqTsNghn-3AJBDe6lVFE6f7f4YU3j_nyAK8HgqUuLd9NKAxtR25EoowfyDbF0Sq01p2kJVFg0mBgYeTVwBfIiH0l40JBITo3L1isjcX3mMmRt0ezdUX5e9CaLT6AbxGthAG_ejjTjANT5AVyQ2e5xZGRn3yBNx9AdX1bEsETIWRqXTvn7FoqBuqWcSZ1o5QTTI-g5W-Cc5ew5Rof7"/>
        </div>
    </div>
</header>

<!-- Main Content Canvas -->
<main class="ml-64 pt-24 pb-12 px-8 min-h-screen bg-surface">
    <!-- Header Section -->
    <header class="mb-10 flex items-end justify-between">
        <div>
            <h1 class="text-4xl font-extrabold tracking-tighter text-on-surface mb-1">System Overview</h1>
            <p class="text-on-surface-variant font-medium opacity-70">Real-time infrastructure and service health metrics.</p>
        </div>
        <div class="flex gap-3">
            <button class="px-5 py-2.5 text-primary font-bold text-sm hover:bg-primary/5 rounded transition-all border border-primary/10">Generate Report</button>
            <button class="px-5 py-2.5 bg-on-surface text-surface rounded font-bold text-sm hover:opacity-90 transition-all shadow-lg shadow-on-surface/20">Manage Instances</button>
        </div>
    </header>

    <!-- Stats Bento Grid -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Active Packages -->
        <div class="bg-surface p-6 rounded border border-outline-variant shadow-sm group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex justify-between items-start mb-6">
                <div class="w-12 h-12 rounded bg-primary/10 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined">package</span>
                </div>
                <span class="text-secondary font-bold text-[10px] bg-secondary/10 border border-secondary/20 px-2 py-1 rounded">+12% VELOCITY</span>
            </div>
            <h3 class="text-on-surface-variant text-[10px] font-bold uppercase tracking-widest mb-1 opacity-70">Active Packages</h3>
            <div class="text-4xl font-extrabold text-on-surface tracking-tighter">42</div>
        </div>
        <!-- Live Products -->
        <div class="bg-surface p-6 rounded border border-outline-variant shadow-sm group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex justify-between items-start mb-6">
                <div class="w-12 h-12 rounded bg-secondary/10 flex items-center justify-center text-secondary">
                    <span class="material-symbols-outlined">rocket_launch</span>
                </div>
                <span class="text-on-surface-variant font-bold text-[10px] bg-surface-container-low px-2 py-1 rounded border border-outline-variant/30">V1.4 STABLE</span>
            </div>
            <h3 class="text-on-surface-variant text-[10px] font-bold uppercase tracking-widest mb-1 opacity-70">Live Products</h3>
            <div class="text-4xl font-extrabold text-on-surface tracking-tighter">158</div>
        </div>
        <!-- Total Services -->
        <div class="bg-surface p-6 rounded border border-outline-variant shadow-sm group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex justify-between items-start mb-6">
                <div class="w-12 h-12 rounded bg-primary/10 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined">settings_input_component</span>
                </div>
                <span class="text-primary font-bold text-[10px] bg-primary/10 border border-primary/20 px-2 py-1 rounded">UPDATE REQ</span>
            </div>
            <h3 class="text-on-surface-variant text-[10px] font-bold uppercase tracking-widest mb-1 opacity-70">Total Services</h3>
            <div class="text-4xl font-extrabold text-on-surface tracking-tighter">24</div>
        </div>
        <!-- Active Inquiries -->
        <div class="bg-surface p-6 rounded border border-outline-variant shadow-sm group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex justify-between items-start mb-6">
                <div class="w-12 h-12 rounded bg-error/10 flex items-center justify-center text-error">
                    <span class="material-symbols-outlined">forum</span>
                </div>
                <span class="text-error font-bold text-[10px] bg-error/10 border border-error/20 px-2 py-1 rounded">8 NEW</span>
            </div>
            <h3 class="text-on-surface-variant text-[10px] font-bold uppercase tracking-widest mb-1 opacity-70">Active Inquiries</h3>
            <div class="text-4xl font-extrabold text-on-surface tracking-tighter">89</div>
        </div>
    </section>

    <!-- Analytics Charts Section -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
        <div class="bg-surface p-8 rounded shadow-xl border border-outline-variant relative overflow-hidden group">
            <h3 class="text-on-surface text-xl font-bold tracking-tight mb-8 flex items-center justify-between">
                Traffic & Conversions
                <span class="material-symbols-outlined text-primary">trending_up</span>
            </h3>
            <div class="w-full h-[320px]">
                 <canvas id="trafficChart"></canvas>
            </div>
        </div>
        <div class="bg-surface p-8 rounded shadow-xl border border-outline-variant relative overflow-hidden group">
            <h3 class="text-on-surface text-xl font-bold tracking-tight mb-8 flex items-center justify-between">
                Infrastructure Health
                <span class="material-symbols-outlined text-secondary">memory</span>
            </h3>
            <div class="w-full h-[320px] flex items-center justify-center">
                 <canvas id="systemLoadChart"></canvas>
            </div>
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content Area -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Upcoming Deliverables Table -->
            <div class="bg-surface rounded border border-outline-variant shadow-sm overflow-hidden">
                <div class="px-8 py-6 border-b border-outline-variant/30 flex items-center justify-between bg-surface-container-low">
                    <h2 class="text-lg font-bold text-on-surface tracking-tight">Upcoming Deliverables</h2>
                    <button class="text-primary font-bold text-sm hover:underline">View All</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low/50">
                                <th class="px-8 py-4 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant opacity-60">Project Name</th>
                                <th class="px-8 py-4 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant opacity-60">Lead Developer</th>
                                <th class="px-8 py-4 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant opacity-60">Due Date</th>
                                <th class="px-8 py-4 text-right text-[10px] font-bold uppercase tracking-widest text-on-surface-variant opacity-60">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/30">
                            <tr class="group hover:bg-primary/5 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-1.5 h-1.5 rounded bg-primary"></div>
                                        <span class="font-bold text-sm text-on-surface">Cloud Infrastructure v2</span>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-sm text-on-surface-variant font-medium">Marcus Chen</td>
                                <td class="px-8 py-5 text-sm font-medium text-on-surface opacity-70">Oct 24, 2023</td>
                                <td class="px-8 py-5 text-right">
                                    <span class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded text-[10px] font-bold text-on-surface-variant uppercase tracking-widest border border-outline-variant/30">
                                        <span class="w-1 h-1 rounded bg-slate-400"></span>
                                        In Progress
                                    </span>
                                </td>
                            </tr>
                            <tr class="group hover:bg-primary/5 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-1.5 h-1.5 rounded bg-secondary"></div>
                                        <span class="font-bold text-sm text-on-surface">Security Audit Alpha</span>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-sm text-on-surface-variant font-medium">Sarah Jenkins</td>
                                <td class="px-8 py-5 text-sm font-medium text-on-surface opacity-70">Oct 26, 2023</td>
                                <td class="px-8 py-5 text-right">
                                    <span class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/10 rounded text-[10px] font-bold text-secondary uppercase tracking-widest border border-secondary/20">
                                        <span class="w-1 h-1 rounded bg-secondary"></span>
                                        Final Review
                                    </span>
                                </td>
                            </tr>
                            <tr class="group hover:bg-primary/5 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-1.5 h-1.5 rounded bg-error"></div>
                                        <span class="font-bold text-sm text-on-surface">Mobile App Core</span>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-sm text-on-surface-variant font-medium">Alex Rivera</td>
                                <td class="px-8 py-5 text-sm font-medium text-on-surface opacity-70">Oct 21, 2023</td>
                                <td class="px-8 py-5 text-right">
                                    <span class="inline-flex items-center gap-2 px-3 py-1 bg-error/10 rounded text-[10px] font-bold text-error uppercase tracking-widest border border-error/20">
                                        <span class="w-1 h-1 rounded bg-error"></span>
                                        Delayed
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Featured Project Insight -->
            <div class="relative rounded overflow-hidden min-h-[260px] bg-on-surface group shadow-2xl">
                <img alt="Cybersecurity Visualization" class="absolute inset-0 w-full h-full object-cover opacity-15 group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDd2-36NwBzF02PIRWcGjtkN-DQHQw6CC3xUXSuMOH1sUdG3u1nojk7ixtVXLdPByck7KIDpeBzjqQK-iWYnxo-zzJFANpVy-5jp9jtHDHd7yJMcjhzTmiaiR9JEWlI4HwTqyoBriu2s1iCZ0kTGEyx-ZdaXmZW5K5yJu4t4nCgX7MSiCqJ-DhUDw5W5y2t89rV5pm09EKctVeACBNfQRaQyB0kbCBgKLHOqPZZ-RjCyD1l4C5r74TGfWDnM-ehTET-yuzPA6sJtJ6d"/>
                <div class="relative p-10 h-full flex flex-col justify-between">
                    <div class="inline-flex px-3 py-1 bg-primary text-white rounded text-[10px] font-bold tracking-[0.2em] uppercase mb-4 w-fit shadow-lg shadow-primary/20">
                        Velocity Intelligence
                    </div>
                    <div>
                        <h2 class="text-white text-3xl font-extrabold tracking-tighter mb-3 leading-none">Main Infrastructure Scaling</h2>
                        <p class="text-surface-container-high text-sm max-w-md leading-relaxed opacity-80 font-medium">System load is currently balanced across 3 regions. Auto-scaling triggered 14 minutes ago to manage incoming peak traffic.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar Content -->
        <div class="space-y-8">
            <!-- Recent Activity Feed -->
            <div class="bg-surface rounded p-8 border border-outline-variant shadow-sm">
                <h2 class="text-lg font-bold text-on-surface tracking-tight mb-8">Recent Activity</h2>
                <div class="space-y-8">
                    <div class="flex gap-4">
                        <div class="relative">
                            <div class="w-10 h-10 rounded bg-primary/10 flex items-center justify-center text-primary border border-primary/20">
                                <span class="material-symbols-outlined text-lg">check_circle</span>
                            </div>
                            <div class="absolute top-10 left-1/2 -translate-x-1/2 w-px h-10 bg-outline-variant/30"></div>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-sm font-bold text-on-surface">'Inventory Pro SaaS' <span class="font-medium text-on-surface-variant opacity-70">marked as</span> Live</p>
                            <span class="text-[10px] text-primary font-bold uppercase tracking-widest mt-1.5 opacity-80">2 mins ago</span>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="relative">
                            <div class="w-10 h-10 rounded bg-surface-container flex items-center justify-center text-on-surface-variant border border-outline-variant/30">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </div>
                            <div class="absolute top-10 left-1/2 -translate-x-1/2 w-px h-10 bg-outline-variant/30"></div>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-sm font-bold text-on-surface">D. Roberts <span class="font-medium text-on-surface-variant opacity-70">updated pricing</span></p>
                            <span class="text-[10px] text-on-surface-variant font-bold uppercase tracking-widest mt-1.5 opacity-60">45 mins ago</span>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="relative">
                            <div class="w-10 h-10 rounded bg-secondary/10 flex items-center justify-center text-secondary border border-secondary/20">
                                <span class="material-symbols-outlined text-lg">person_add</span>
                            </div>
                            <div class="absolute top-10 left-1/2 -translate-x-1/2 w-px h-10 bg-outline-variant/30"></div>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-sm font-bold text-on-surface">New Inquiry <span class="font-medium text-on-surface-variant opacity-70">from</span> GlobalLogistics</p>
                            <span class="text-[10px] text-secondary font-bold uppercase tracking-widest mt-1.5">2 hours ago</span>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded bg-error/10 flex items-center justify-center text-error border border-error/20">
                            <span class="material-symbols-outlined text-lg">warning</span>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-sm font-bold text-on-surface">API Endpoint <span class="font-medium text-on-surface-variant opacity-70">detected 500 errors</span></p>
                            <span class="text-[10px] text-error font-bold uppercase tracking-widest mt-1.5">5 hours ago</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quick Actions -->
            <div class="bg-primary/5 rounded p-8 border border-primary/20">
                <h2 class="text-lg font-bold text-on-surface tracking-tight mb-6">Quick Actions</h2>
                <div class="space-y-3">
                    <button class="w-full flex items-center justify-between p-4 bg-surface rounded border border-outline-variant/30 hover:bg-primary hover:text-white transition-all duration-300 group shadow-sm">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-lg">add_box</span>
                            <span class="text-sm font-bold tracking-tight">Add New Package</span>
                        </div>
                        <span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all">arrow_forward</span>
                    </button>
                    <button class="w-full flex items-center justify-between p-4 bg-surface rounded border border-outline-variant/30 hover:bg-primary hover:text-white transition-all duration-300 group shadow-sm">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-lg">auto_awesome_motion</span>
                            <span class="text-sm font-bold tracking-tight">Edit Showcase</span>
                        </div>
                        <span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all">arrow_forward</span>
                    </button>
                    <button class="w-full flex items-center justify-between p-4 bg-surface rounded border border-outline-variant/30 hover:bg-primary hover:text-white transition-all duration-300 group shadow-sm">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-lg">groups</span>
                            <span class="text-sm font-bold tracking-tight">Team Permissions</span>
                        </div>
                        <span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const textColor = '#161616';
    const gridColor = '#f1f5f9';

    if (!document.getElementById('trafficChart') || !document.getElementById('systemLoadChart')) return;

    // Traffic Chart (Line)
    const ctx1 = document.getElementById('trafficChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Unique Visitors',
                data: [6500, 5900, 8000, 8100, 5600, 8500, 11000],
                borderColor: '#0283c5',
                backgroundColor: 'rgba(2, 131, 197, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }, {
                label: 'Conversions',
                data: [2800, 4800, 4000, 4100, 6600, 4500, 7100],
                borderColor: '#5ABB4A',
                backgroundColor: 'rgba(90, 187, 74, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { labels: { color: textColor, font: { family: 'Inter', size: 11, weight: 'bold' } } }
            },
            scales: {
                y: { grid: { color: gridColor }, ticks: { color: textColor, font: { size: 10 } } },
                x: { grid: { color: gridColor }, ticks: { color: textColor, font: { size: 10 } } }
            }
        }
    });

    // System Load Chart (Doughnut)
    const ctx2 = document.getElementById('systemLoadChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['CPU Usage', 'Memory', 'Disk I/O', 'Network'],
            datasets: [{
                data: [45, 25, 20, 10],
                backgroundColor: ['#0283c5', '#5ABB4A', '#A1F992', '#161616'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'right', labels: { color: textColor, font: { family: 'Inter', size: 11, weight: 'bold' } } }
            },
            cutout: '75%'
        }
    });
});
</script>

@endsection