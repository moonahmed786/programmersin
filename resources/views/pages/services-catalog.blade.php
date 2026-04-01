@extends("layouts.app")
@section("content")


<header class="sticky top-0 w-full z-50 bg-white/70 backdrop-blur-md shadow-sm">
<nav class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
<div class="text-xl font-bold tracking-tighter text-slate-900">Programmers.in</div>
<div class="hidden md:flex items-center gap-8">
<a class="text-blue-700 font-semibold border-b-2 border-blue-700 font-inter body-md tracking-tight" href="#">Services</a>
<a class="text-slate-600 hover:text-blue-600 font-inter body-md tracking-tight transition-colors" href="#">Products</a>
<a class="text-slate-600 hover:text-blue-600 font-inter body-md tracking-tight transition-colors" href="#">Pricing</a>
</div>
<button class="bg-gradient-to-r from-primary to-primary-container text-white px-6 py-2 rounded-lg font-medium shadow-sm hover:scale-95 duration-200 ease-in-out transition-transform">
                Get Started
            </button>
</nav>
</header>
<main class="max-w-7xl mx-auto px-8 py-16">
<section class="mb-20">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
<div class="max-w-2xl">
<span class="label-md tracking-wide uppercase font-inter text-primary font-bold mb-4 block">Excellence in Execution</span>
<h1 class="text-5xl md:text-6xl font-extrabold tracking-tighter text-on-surface mb-6">Our Expertise.</h1>
<p class="text-lg text-on-surface-variant leading-relaxed">
                        We build the digital backbone for modern enterprises. From architectural blueprints to deployment, our engineering teams deliver scalable, high-performance IT solutions tailored for complex challenges.
                    </p>
</div>
<div class="flex gap-4">
<div class="bg-surface-container-low p-6 rounded-xl text-center min-w-[140px]">
<div class="text-3xl font-black text-primary">500+</div>
<div class="label-sm font-semibold text-on-surface-variant uppercase tracking-widest mt-1">Deployments</div>
</div>
<div class="bg-surface-container-low p-6 rounded-xl text-center min-w-[140px]">
<div class="text-3xl font-black text-tertiary">98%</div>
<div class="label-sm font-semibold text-on-surface-variant uppercase tracking-widest mt-1">Uptime</div>
</div>
</div>
</div>
</section>
<section class="grid grid-cols-1 lg:grid-cols-12 gap-6">
<div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="group bg-surface-container-lowest p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
<div>
<div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined" data-icon="smartphone">smartphone</span>
</div>
<h3 class="text-xl font-bold mb-3">iOS &amp; Android Apps</h3>
<p class="text-on-surface-variant body-md mb-6 leading-relaxed">High-performance native and cross-platform mobile experiences crafted with Swift, Kotlin, and Flutter.</p>
<div class="flex items-center gap-2 mb-8">
<span class="material-symbols-outlined text-sm text-tertiary" style="font-variation-settings: 'FILL' 1;">circle</span>
<span class="text-sm font-semibold text-on-surface-variant uppercase tracking-tighter">Lead Time: 12-16 Weeks</span>
</div>
</div>
<button class="w-full py-3 bg-surface-container-low text-primary font-bold rounded-lg hover:bg-primary hover:text-white transition-all flex items-center justify-center gap-2">
                        Consult Now <span class="material-symbols-outlined text-lg">arrow_forward</span>
</button>
</div>
<div class="group bg-surface-container-lowest p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
<div>
<div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined" data-icon="cloud">cloud</span>
</div>
<h3 class="text-xl font-bold mb-3">Cloud Architecture</h3>
<p class="text-on-surface-variant body-md mb-6 leading-relaxed">Auto-scaling infrastructure design on AWS, Azure, and GCP using microservices and serverless patterns.</p>
<div class="flex items-center gap-2 mb-8">
<span class="material-symbols-outlined text-sm text-tertiary" style="font-variation-settings: 'FILL' 1;">circle</span>
<span class="text-sm font-semibold text-on-surface-variant uppercase tracking-tighter">Lead Time: 4-6 Weeks</span>
</div>
</div>
<button class="w-full py-3 bg-surface-container-low text-primary font-bold rounded-lg hover:bg-primary hover:text-white transition-all flex items-center justify-center gap-2">
                        Consult Now <span class="material-symbols-outlined text-lg">arrow_forward</span>
</button>
</div>
<div class="group bg-surface-container-lowest p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
<div>
<div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined" data-icon="security">security</span>
</div>
<h3 class="text-xl font-bold mb-3">Cybersecurity</h3>
<p class="text-on-surface-variant body-md mb-6 leading-relaxed">End-to-end encryption, penetration testing, and compliance-ready security frameworks for fintech and healthtech.</p>
<div class="flex items-center gap-2 mb-8">
<span class="material-symbols-outlined text-sm text-tertiary" style="font-variation-settings: 'FILL' 1;">circle</span>
<span class="text-sm font-semibold text-on-surface-variant uppercase tracking-tighter">Lead Time: 2-3 Weeks</span>
</div>
</div>
<button class="w-full py-3 bg-surface-container-low text-primary font-bold rounded-lg hover:bg-primary hover:text-white transition-all flex items-center justify-center gap-2">
                        Consult Now <span class="material-symbols-outlined text-lg">arrow_forward</span>
</button>
</div>
<div class="group bg-surface-container-lowest p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
<div>
<div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined" data-icon="database">database</span>
</div>
<h3 class="text-xl font-bold mb-3">Backend Systems</h3>
<p class="text-on-surface-variant body-md mb-6 leading-relaxed">Robust distributed systems built with Go, Python, and Node.js for high-concurrency environments.</p>
<div class="flex items-center gap-2 mb-8">
<span class="material-symbols-outlined text-sm text-tertiary" style="font-variation-settings: 'FILL' 1;">circle</span>
<span class="text-sm font-semibold text-on-surface-variant uppercase tracking-tighter">Lead Time: 8-12 Weeks</span>
</div>
</div>
<button class="w-full py-3 bg-surface-container-low text-primary font-bold rounded-lg hover:bg-primary hover:text-white transition-all flex items-center justify-center gap-2">
                        Consult Now <span class="material-symbols-outlined text-lg">arrow_forward</span>
</button>
</div>
</div>
<aside class="lg:col-span-4 flex flex-col gap-6">
<div class="bg-primary text-white p-8 rounded-xl relative overflow-hidden h-full min-h-[400px] flex flex-col justify-end">
<div class="absolute top-0 right-0 w-full h-full opacity-20">
<img alt="Digital Security Grid" class="w-full h-full object-cover" data-alt="abstract digital grid representation with glowing blue circuit lines and sophisticated network nodes in deep space background" src="/uploads/stitch/8f820ed8ac.png"/>
</div>
<div class="relative z-10">
<h4 class="text-2xl font-bold mb-4">Accelerate Your Roadmap</h4>
<p class="text-primary-fixed mb-8 leading-relaxed">Our dedicated engineering units integrate seamlessly into your existing workflows, reducing time-to-market by 40%.</p>
<ul class="space-y-4 mb-8">
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary-fixed">check_circle</span>
<span class="text-sm font-medium">SOC2 Compliant Processes</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary-fixed">check_circle</span>
<span class="text-sm font-medium">Agile Scrum Methodology</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary-fixed">check_circle</span>
<span class="text-sm font-medium">Continuous Support 24/7</span>
</li>
</ul>
<button class="w-full bg-white text-primary py-4 rounded-lg font-bold hover:bg-primary-fixed transition-colors">
                            Schedule Technical Audit
                        </button>
</div>
</div>
</aside>
</section>
<section class="mt-20">
<div class="bg-surface-container-low rounded-2xl p-12 flex flex-col md:flex-row items-center justify-between gap-12">
<div class="md:w-1/2">
<h2 class="text-3xl font-bold mb-6">Can't find a specific service?</h2>
<p class="text-on-surface-variant mb-8">We specialize in custom engineering solutions. Tell us about your technical requirements, and our architects will propose a tailored stack.</p>
<div class="flex flex-wrap gap-4">
<span class="px-4 py-2 bg-white rounded-full text-xs font-bold text-secondary uppercase tracking-widest border border-outline-variant/20">Legacy Migration</span>
<span class="px-4 py-2 bg-white rounded-full text-xs font-bold text-secondary uppercase tracking-widest border border-outline-variant/20">AI Integration</span>
<span class="px-4 py-2 bg-white rounded-full text-xs font-bold text-secondary uppercase tracking-widest border border-outline-variant/20">DevOps Automation</span>
<span class="px-4 py-2 bg-white rounded-full text-xs font-bold text-secondary uppercase tracking-widest border border-outline-variant/20">Web3 / Blockchain</span>
</div>
</div>
<div class="md:w-1/3 w-full">
<div class="bg-white p-8 rounded-xl shadow-sm">
<form class="space-y-4">
<div>
<label class="block text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-2">Project Type</label>
<select class="w-full bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary/40 text-sm py-3">
<option>Custom Development</option>
<option>System Migration</option>
<option>Security Audit</option>
</select>
</div>
<button class="w-full py-4 bg-primary text-white font-bold rounded-lg hover:bg-primary-container transition-all">
                                Request Custom Quote
                            </button>
</form>
</div>
</div>
</div>
</section>
</main>
<footer class="bg-slate-50 mt-20 border-t border-surface-container">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12 px-8 py-16 max-w-7xl mx-auto">
<div class="col-span-1">
<div class="text-lg font-black text-slate-900 mb-6">Programmers.in</div>
<p class="text-slate-500 label-md normal-case leading-relaxed">
                    A global technology partner delivering elite engineering talent and innovative software solutions for the world's leading brands.
                </p>
</div>
<div class="flex flex-col gap-4">
<h5 class="label-md tracking-wide uppercase font-inter text-slate-900 font-bold mb-2">Capabilities</h5>
<a class="text-slate-500 hover:text-blue-700 transition-all label-md lowercase" href="#">Services</a>
<a class="text-slate-500 hover:text-blue-700 transition-all label-md lowercase" href="#">Products</a>
<a class="text-slate-500 hover:text-blue-700 transition-all label-md lowercase" href="#">Pricing</a>
</div>
<div class="flex flex-col gap-4">
<h5 class="label-md tracking-wide uppercase font-inter text-slate-900 font-bold mb-2">Company</h5>
<a class="text-slate-500 hover:text-blue-700 transition-all label-md lowercase" href="#">About Us</a>
<a class="text-slate-500 hover:text-blue-700 transition-all label-md lowercase" href="#">Contact</a>
<a class="text-slate-500 hover:text-blue-700 transition-all label-md lowercase" href="#">Careers</a>
</div>
<div class="flex flex-col gap-4">
<h5 class="label-md tracking-wide uppercase font-inter text-slate-900 font-bold mb-2">Legal</h5>
<a class="text-slate-500 hover:text-blue-700 transition-all label-md lowercase" href="#">Privacy Policy</a>
<a class="text-slate-500 hover:text-blue-700 transition-all label-md lowercase" href="#">Terms of Service</a>
<a class="text-slate-500 hover:text-blue-700 transition-all label-md lowercase" href="#">Security Policy</a>
</div>
</div>
<div class="max-w-7xl mx-auto px-8 py-8 border-t border-surface-container-high">
<p class="label-md tracking-wide uppercase font-inter text-slate-500 text-center">© 2024 Programmers.in. All rights reserved.</p>
</div>
</footer>


@endsection