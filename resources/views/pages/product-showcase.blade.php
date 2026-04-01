@extends("layouts.app")
@section("content")


<!-- SideNavBar Anchor -->
<aside class="h-screen w-64 fixed left-0 top-0 bg-slate-900 flex flex-col h-full z-50">
<div class="px-8 py-8">
<h1 class="text-lg font-bold tracking-tighter text-slate-50">Programmers.in</h1>
<p class="text-xs text-slate-400 font-inter tracking-tight">IT Services Admin</p>
</div>
<nav class="flex-1 px-4 space-y-1">
<a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-slate-200 hover:bg-slate-800 transition-colors rounded-lg" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span class="text-sm font-medium">Dashboard Overview</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-slate-200 hover:bg-slate-800 transition-colors rounded-lg" href="#">
<span class="material-symbols-outlined" data-icon="payments">payments</span>
<span class="text-sm font-medium">Pricing &amp; Packages</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-blue-400 font-semibold border-r-4 border-blue-400 bg-slate-800 rounded-lg" href="#">
<span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
<span class="text-sm">Product Showcase</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-slate-200 hover:bg-slate-800 transition-colors rounded-lg" href="#">
<span class="material-symbols-outlined" data-icon="settings_suggest">settings_suggest</span>
<span class="text-sm font-medium">Services Management</span>
</a>
</nav>
<div class="mt-auto px-4 py-6 space-y-1 bg-slate-800/50">
<button class="w-full mb-4 py-2.5 bg-gradient-to-r from-blue-700 to-blue-600 hover:opacity-90 transition-opacity text-white text-sm font-semibold rounded-lg shadow-lg shadow-blue-900/20">
                Add New Project
            </button>
<a class="flex items-center gap-3 px-4 py-2 text-slate-400 hover:text-white transition-colors" href="#">
<span class="material-symbols-outlined text-sm" data-icon="help">help</span>
<span class="text-xs">Help Center</span>
</a>
<a class="flex items-center gap-3 px-4 py-2 text-slate-400 hover:text-white transition-colors" href="#">
<span class="material-symbols-outlined text-sm" data-icon="logout">logout</span>
<span class="text-xs">Logout</span>
</a>
</div>
</aside>
<!-- TopAppBar Anchor -->
<header class="fixed top-0 right-0 w-[calc(100%-16rem)] z-40 bg-slate-900/70 backdrop-blur-md flex items-center justify-between px-8 h-16">
<div class="flex items-center bg-slate-800 rounded-lg px-4 py-1.5 w-96 focus-within:ring-2 focus-within:ring-blue-500/40 transition-all">
<span class="material-symbols-outlined text-slate-500 text-xl" data-icon="search">search</span>
<input class="bg-transparent border-none text-sm text-slate-200 focus:ring-0 w-full ml-2 placeholder:text-slate-500" placeholder="Search proprietary software..." type="text"/>
</div>
<div class="flex items-center gap-6">
<button class="flex items-center gap-2 px-4 py-1.5 bg-blue-700/10 text-blue-400 text-sm font-bold hover:bg-blue-700/20 transition-colors rounded-lg">
<span class="material-symbols-outlined text-lg" data-icon="sync">sync</span>
                Sync with Projects
            </button>
<div class="flex items-center gap-4 text-slate-400">
<button class="hover:text-slate-200 transition-colors"><span class="material-symbols-outlined" data-icon="notifications">notifications</span></button>
<button class="hover:text-slate-200 transition-colors"><span class="material-symbols-outlined" data-icon="settings">settings</span></button>
<div class="h-8 w-8 rounded-full bg-slate-700 overflow-hidden ring-2 ring-slate-800 shadow-xl">
<img alt="User Admin Avatar" class="w-full h-full object-cover" data-alt="Close-up professional portrait of a tech executive with soft lighting and a neutral blurred office background" src="/uploads/stitch/02ecc5c55f.png"/>
</div>
</div>
</div>
</header>
<!-- Main Content Canvas -->
<main class="ml-64 pt-24 px-8 pb-12 min-h-screen">
<!-- Header Section with Bento Style Intro -->
<div class="grid grid-cols-12 gap-6 mb-12">
<div class="col-span-12 lg:col-span-8">
<h2 class="text-3xl font-extrabold tracking-tight text-white mb-2">Product Showcase Gallery</h2>
<p class="text-slate-400 max-w-2xl text-lg">Manage and curate our proprietary SaaS ecosystem. Toggle live status, upload assets, and synchronize with internal project deliverables.</p>
</div>
<div class="col-span-12 lg:col-span-4 flex items-end justify-end gap-3">
<div class="bg-slate-800/50 p-4 rounded-xl flex items-center gap-4 border-l-4 border-blue-500">
<div class="bg-blue-500/20 p-2 rounded-lg">
<span class="material-symbols-outlined text-blue-400" data-icon="rocket_launch">rocket_launch</span>
</div>
<div>
<div class="text-2xl font-bold text-white leading-tight">24</div>
<div class="text-[10px] uppercase tracking-widest text-slate-500 font-semibold">Active SaaS Apps</div>
</div>
</div>
</div>
</div>
<!-- Asymmetric Layout: Upload Zone & Featured -->
<div class="grid grid-cols-12 gap-6 mb-12">
<!-- Image Upload Zone -->
<div class="col-span-12 md:col-span-5 lg:col-span-4 bg-slate-800/30 rounded-2xl p-8 border-2 border-dashed border-slate-700 hover:border-blue-500/50 transition-all flex flex-col items-center justify-center text-center group cursor-pointer">
<div class="w-16 h-16 bg-slate-800 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-3xl text-slate-400 group-hover:text-blue-400" data-icon="cloud_upload">cloud_upload</span>
</div>
<h3 class="text-lg font-bold text-white mb-2">Upload New Entry</h3>
<p class="text-sm text-slate-500 mb-6 px-4">Drag and drop product mockups or click to browse local files (PNG, JPG up to 10MB)</p>
<button class="px-6 py-2 bg-slate-700 text-slate-200 text-sm font-semibold rounded-lg hover:bg-slate-600 transition-colors">Browse Files</button>
</div>
<!-- Dashboard Stats / Info Card -->
<div class="col-span-12 md:col-span-7 lg:col-span-8 relative overflow-hidden bg-gradient-to-br from-blue-900/40 to-slate-900 rounded-2xl p-8 shadow-2xl">
<div class="relative z-10 flex flex-col h-full justify-between">
<div>
<span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-500/20 text-blue-400 text-[10px] font-bold uppercase tracking-wider mb-4">
                            System Intelligence
                        </span>
<h3 class="text-2xl font-bold text-white mb-4">Auto-Sync Active</h3>
<p class="text-slate-300 max-w-md">Your showcase is currently linked with <span class="text-blue-400 font-semibold">Project Nexus</span>. New completed deployments will automatically appear as 'Draft' entries here.</p>
</div>
<div class="flex gap-4 mt-8">
<div class="flex flex-col">
<span class="text-slate-500 text-[10px] uppercase font-bold tracking-tighter">Last Sync</span>
<span class="text-white font-medium">14 Minutes Ago</span>
</div>
<div class="w-px h-8 bg-slate-700 self-center"></div>
<div class="flex flex-col">
<span class="text-slate-500 text-[10px] uppercase font-bold tracking-tighter">Pending Drafts</span>
<span class="text-blue-400 font-medium">03 Projects</span>
</div>
</div>
</div>
<!-- Abstract Graphic -->
<div class="absolute -right-12 -bottom-12 w-64 h-64 bg-blue-600/10 blur-[80px] rounded-full"></div>
<span class="absolute top-8 right-8 material-symbols-outlined text-slate-700 text-8xl opacity-20" data-icon="memory">memory</span>
</div>
</div>
<!-- Product Gallery Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
<!-- Card 1 -->
<div class="group bg-slate-800/40 rounded-2xl overflow-hidden hover:bg-slate-800/60 transition-all shadow-sm flex flex-col">
<div class="h-48 w-full relative overflow-hidden">
<img alt="Inventory Pro SaaS" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Sleek dashboard interface showing colorful analytics charts and data visualizations on a dark high-tech screen" src="/uploads/stitch/1bae142bf6.png"/>
<div class="absolute top-4 left-4">
<span class="px-2 py-1 bg-slate-900/80 backdrop-blur-md text-[10px] font-bold text-white rounded-md uppercase">ERP</span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col">
<div class="flex justify-between items-start mb-4">
<h4 class="text-lg font-bold text-white leading-tight">Inventory Pro SaaS</h4>
<div class="flex flex-col items-end">
<div class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-9 h-5 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
</div>
<span class="text-[9px] uppercase font-bold mt-1 text-blue-400">Live</span>
</div>
</div>
<div class="flex items-center gap-4 mt-auto">
<button class="text-xs font-bold text-slate-400 hover:text-white transition-colors flex items-center gap-1">
<span class="material-symbols-outlined text-lg" data-icon="edit">edit</span> Edit
                        </button>
<button class="text-xs font-bold text-slate-400 hover:text-white transition-colors flex items-center gap-1">
<span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span> Preview
                        </button>
</div>
</div>
</div>
<!-- Card 2 -->
<div class="group bg-slate-800/40 rounded-2xl overflow-hidden hover:bg-slate-800/60 transition-all shadow-sm flex flex-col">
<div class="h-48 w-full relative overflow-hidden">
<img alt="Omni CRM Hub" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Digital marketing analytics platform display with interconnected nodes and customer journey flowcharts in blue and white" src="/uploads/stitch/f6d3769b27.png"/>
<div class="absolute top-4 left-4">
<span class="px-2 py-1 bg-slate-900/80 backdrop-blur-md text-[10px] font-bold text-white rounded-md uppercase">CRM</span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col">
<div class="flex justify-between items-start mb-4">
<h4 class="text-lg font-bold text-white leading-tight">Omni CRM Hub</h4>
<div class="flex flex-col items-end">
<div class="relative inline-flex items-center cursor-pointer">
<input class="sr-only peer" type="checkbox"/>
<div class="w-9 h-5 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
</div>
<span class="text-[9px] uppercase font-bold mt-1 text-slate-500">Demo</span>
</div>
</div>
<div class="flex items-center gap-4 mt-auto">
<button class="text-xs font-bold text-slate-400 hover:text-white transition-colors flex items-center gap-1">
<span class="material-symbols-outlined text-lg" data-icon="edit">edit</span> Edit
                        </button>
<button class="text-xs font-bold text-slate-400 hover:text-white transition-colors flex items-center gap-1">
<span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span> Preview
                        </button>
</div>
</div>
</div>
<!-- Card 3 -->
<div class="group bg-slate-800/40 rounded-2xl overflow-hidden hover:bg-slate-800/60 transition-all shadow-sm flex flex-col">
<div class="h-48 w-full relative overflow-hidden">
<img alt="Cyber Guard AI" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Cybersecurity control panel with glowing shield icons and scrolling security logs in a dark blue futuristic interface" src="/uploads/stitch/4622006897.png"/>
<div class="absolute top-4 left-4">
<span class="px-2 py-1 bg-slate-900/80 backdrop-blur-md text-[10px] font-bold text-white rounded-md uppercase">Security</span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col">
<div class="flex justify-between items-start mb-4">
<h4 class="text-lg font-bold text-white leading-tight">Cyber Guard AI</h4>
<div class="flex flex-col items-end">
<div class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-9 h-5 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
</div>
<span class="text-[9px] uppercase font-bold mt-1 text-blue-400">Live</span>
</div>
</div>
<div class="flex items-center gap-4 mt-auto">
<button class="text-xs font-bold text-slate-400 hover:text-white transition-colors flex items-center gap-1">
<span class="material-symbols-outlined text-lg" data-icon="edit">edit</span> Edit
                        </button>
<button class="text-xs font-bold text-slate-400 hover:text-white transition-colors flex items-center gap-1">
<span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span> Preview
                        </button>
</div>
</div>
</div>
<!-- Card 4 -->
<div class="group bg-slate-800/40 rounded-2xl overflow-hidden hover:bg-slate-800/60 transition-all shadow-sm flex flex-col">
<div class="h-48 w-full relative overflow-hidden">
<img alt="HR Matrix 2.0" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Modern human resources software interface showing employee profiles, attendance charts, and payroll summary" src="/uploads/stitch/7d037d23c5.png"/>
<div class="absolute top-4 left-4">
<span class="px-2 py-1 bg-slate-900/80 backdrop-blur-md text-[10px] font-bold text-white rounded-md uppercase">HRM</span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col">
<div class="flex justify-between items-start mb-4">
<h4 class="text-lg font-bold text-white leading-tight">HR Matrix 2.0</h4>
<div class="flex flex-col items-end">
<div class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-9 h-5 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
</div>
<span class="text-[9px] uppercase font-bold mt-1 text-blue-400">Live</span>
</div>
</div>
<div class="flex items-center gap-4 mt-auto">
<button class="text-xs font-bold text-slate-400 hover:text-white transition-colors flex items-center gap-1">
<span class="material-symbols-outlined text-lg" data-icon="edit">edit</span> Edit
                        </button>
<button class="text-xs font-bold text-slate-400 hover:text-white transition-colors flex items-center gap-1">
<span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span> Preview
                        </button>
</div>
</div>
</div>
</div>
<!-- Footer Pagination / Actions -->
<div class="mt-12 flex items-center justify-between border-t border-slate-800 pt-8">
<div class="text-sm text-slate-500">
                Showing <span class="text-slate-300 font-bold">1-4</span> of <span class="text-slate-300 font-bold">24</span> active entries
            </div>
<div class="flex gap-2">
<button class="px-3 py-1.5 bg-slate-800 text-slate-400 rounded-md hover:bg-slate-700 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
</button>
<button class="px-4 py-1.5 bg-blue-700 text-white rounded-md font-bold text-sm">1</button>
<button class="px-4 py-1.5 bg-slate-800 text-slate-400 rounded-md font-bold text-sm hover:text-white">2</button>
<button class="px-4 py-1.5 bg-slate-800 text-slate-400 rounded-md font-bold text-sm hover:text-white">3</button>
<button class="px-3 py-1.5 bg-slate-800 text-slate-400 rounded-md hover:bg-slate-700 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</main>


@endsection