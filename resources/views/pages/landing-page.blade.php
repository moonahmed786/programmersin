@extends("layouts.app")
@section("content")


<!-- TopNavBar -->
<header class="sticky top-0 w-full z-50 glass">
<nav class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto animate-in-fade">
<div class="text-xl font-bold tracking-tighter text-slate-900">Programmers.in</div>
<div class="hidden md:flex items-center gap-8">
<a class="font-inter body-md tracking-tight text-slate-600 hover:text-blue-600 transition-colors" href="#">Services</a>
<a class="font-inter body-md tracking-tight text-slate-600 hover:text-blue-600 transition-colors" href="#">Products</a>
<a class="font-inter body-md tracking-tight text-slate-600 hover:text-blue-600 transition-colors" href="#">Pricing</a>
</div>
<div class="flex items-center gap-4">
    <a href="{{ route('login') }}" class="text-sm font-black uppercase tracking-widest text-slate-600 hover:text-primary transition-all">Portal Access</a>
    <a href="#inquiry" class="bg-primary text-on-primary px-8 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:opacity-90 shadow-2xl shadow-primary/20 transition-all">
        Consultation
    </a>
</div>
</nav>
</header>
<main>
<!-- Hero Section -->
<section class="relative overflow-hidden bg-surface pt-20 pb-32">
<div class="max-w-7xl mx-auto px-8 grid lg:grid-cols-2 gap-16 items-center">
<div class="z-10">
<span class="inline-block px-4 py-1.5 rounded-full bg-surface-container text-primary text-sm font-bold tracking-wider uppercase mb-6">
                        Enterprise Solutions
                    </span>
<h1 class="text-6xl font-extrabold tracking-tighter leading-tight text-on-surface mb-6">
                        Code with Precision,<br/>Scale with Speed.
                    </h1>
<p class="text-lg text-on-surface-variant max-w-xl leading-relaxed mb-10">
                        Your elite engineering partner for custom software and scalable SaaS solutions. We transform complex logic into elegant architectural systems.
                    </p>
<div class="flex flex-wrap gap-4">
    <a href="#inquiry" class="bg-primary text-on-primary px-10 py-5 rounded-2xl text-xs font-black uppercase tracking-[0.2em] shadow-2xl shadow-primary/30 hover:opacity-90 transition-all hover:-translate-y-1">
        Consult Our Architects
    </a>
    <a href="{{ route('login') }}" class="flex items-center gap-3 text-on-surface font-black uppercase tracking-widest text-[10px] px-10 py-5 hover:bg-surface-container rounded-2xl transition-all border border-outline-variant/10">
        Portal Login <span class="material-symbols-outlined text-base">arrow_forward</span>
    </a>
</div>
</div>
<div class="relative">
<div class="aspect-square bg-surface-container-high rounded-xl overflow-hidden shadow-2xl relative group">
<img class="w-full h-full object-cover" data-alt="Futuristic glowing code lines flowing on a dark terminal screen with blue neon accents and depth of field effect" src="/uploads/stitch/512d5553ef.png"/>
<div class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-transparent"></div>
<!-- Decorative floating card -->
<div class="absolute bottom-8 left-8 right-8 p-6 bg-white/80 backdrop-blur-md rounded-lg shadow-lg border border-white/20">
<div class="flex items-center gap-4 mb-4">
<div class="w-12 h-12 rounded-full bg-tertiary-container flex items-center justify-center text-on-tertiary-container">
<span class="material-symbols-outlined">terminal</span>
</div>
<div>
<div class="font-bold text-on-surface">Architectural Ledger</div>
<div class="text-xs text-on-surface-variant font-mono">system.initialize() ... Success</div>
</div>
</div>
<div class="h-2 w-full bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-tertiary w-3/4"></div>
</div>
</div>
</div>
</div>
</div>
<!-- Background abstraction -->
<div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-surface-container-low to-transparent -z-0"></div>
</section>
<!-- Core Services: Bento Grid -->
<section class="py-24 bg-surface-container-low">
<div class="max-w-7xl mx-auto px-8">
<div class="mb-16">
<h2 class="text-sm font-bold tracking-[0.2em] uppercase text-on-surface-variant mb-4">Our Expertise</h2>
<h3 class="text-4xl font-bold tracking-tight text-on-surface">Precision Engineering for Modern Scale</h3>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Large Feature -->
<div class="md:col-span-2 bg-surface-container-lowest p-10 rounded-xl flex flex-col justify-between group hover:bg-primary transition-all duration-500">
<div>
<div class="w-14 h-14 rounded-lg bg-surface-container flex items-center justify-center text-primary mb-8 group-hover:bg-primary-container group-hover:text-white transition-colors">
<span class="material-symbols-outlined text-3xl">cloud_done</span>
</div>
<h4 class="text-2xl font-bold mb-4 group-hover:text-white">Full-Stack SaaS Development</h4>
<p class="text-on-surface-variant group-hover:text-blue-100 leading-relaxed max-w-md">
                                Scalable, multi-tenant architectures built with modern frameworks to handle millions of concurrent requests without breaking a sweat.
                            </p>
</div>
<div class="mt-8 flex items-center gap-4 text-primary font-bold group-hover:text-white">
                            Explore Technical Stack <span class="material-symbols-outlined">chevron_right</span>
</div>
</div>
<!-- Small Feature 1 -->
<div class="bg-surface-container-lowest p-8 rounded-xl border-b-4 border-tertiary">
<div class="text-tertiary mb-6">
<span class="material-symbols-outlined text-4xl">security</span>
</div>
<h4 class="text-xl font-bold mb-3">Enterprise Security</h4>
<p class="text-sm text-on-surface-variant leading-relaxed">
                            Hardened codebases with SOC2 compliance readiness and automated vulnerability scanning.
                        </p>
</div>
<!-- Small Feature 2 -->
<div class="bg-surface-container-lowest p-8 rounded-xl border-b-4 border-primary">
<div class="text-primary mb-6">
<span class="material-symbols-outlined text-4xl">api</span>
</div>
<h4 class="text-xl font-bold mb-3">API Ecosystems</h4>
<p class="text-sm text-on-surface-variant leading-relaxed">
                            Restful and GraphQL infrastructure designed for seamless third-party integrations and developer experience.
                        </p>
</div>
<!-- Large Feature 2 -->
<div class="md:col-span-2 bg-surface-container-lowest p-10 rounded-xl grid md:grid-cols-2 gap-8 items-center">
<div class="order-2 md:order-1">
<h4 class="text-2xl font-bold mb-4">Legacy Modernization</h4>
<p class="text-on-surface-variant leading-relaxed mb-6">
                                We help enterprises migrate monolithic legacy systems into microservices architectures with zero downtime.
                            </p>
<ul class="space-y-3">
<li class="flex items-center gap-2 text-sm font-medium"><span class="material-symbols-outlined text-tertiary text-lg">check_circle</span> Cloud Migration</li>
<li class="flex items-center gap-2 text-sm font-medium"><span class="material-symbols-outlined text-tertiary text-lg">check_circle</span> Database Refactoring</li>
</ul>
</div>
<div class="order-1 md:order-2 rounded-lg overflow-hidden">
<img class="w-full h-48 object-cover" data-alt="Close-up of high-end server hardware with blue glowing indicator lights and brushed metal textures" src="/uploads/stitch/69319fbff3.png"/>
</div>
</div>
</div>
</div>
</section>
<!-- Featured Products -->
<section class="py-24 bg-surface">
<div class="max-w-7xl mx-auto px-8">
<div class="flex justify-between items-end mb-16">
<div>
<h2 class="text-sm font-bold tracking-[0.2em] uppercase text-on-surface-variant mb-4">SaaS Ecosystem</h2>
<h3 class="text-4xl font-bold tracking-tight text-on-surface">Proprietary Solutions</h3>
</div>
<a class="text-primary font-bold hover:underline mb-2" href="#">View Portfolio</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-12">
<!-- Product Card 1 -->
<div class="group">
<div class="aspect-video rounded-xl overflow-hidden mb-6 bg-surface-container-high relative">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="Clean minimal UI dashboard featuring dark blue sidebar and light grey data cards with vibrant green charts" src="/uploads/stitch/d0958d2ca6.png"/>
</div>
<div class="flex justify-between items-start">
<div>
<h4 class="text-2xl font-bold mb-2">OmniQuery Pro</h4>
<p class="text-on-surface-variant">Real-time analytical engine for distributed datasets.</p>
</div>
<span class="px-3 py-1 bg-tertiary-container text-on-tertiary-fixed-variant text-xs font-bold rounded">LIVE</span>
</div>
</div>
<!-- Product Card 2 -->
<div class="group">
<div class="aspect-video rounded-xl overflow-hidden mb-6 bg-surface-container-high relative">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="High-resolution mobile app interface on a modern smartphone screen showing secure payment confirmation" src="/uploads/stitch/722a8e59bc.png"/>
</div>
<div class="flex justify-between items-start">
<div>
<h4 class="text-2xl font-bold mb-2">SecureFlow Mobile</h4>
<p class="text-on-surface-variant">Encrypted communication layer for field operations.</p>
</div>
<span class="px-3 py-1 bg-surface-container-highest text-on-surface-variant text-xs font-bold rounded">BETA</span>
</div>
</div>
</div>
</div>
</section>
<!-- Testimonials -->
<section class="py-24 bg-surface-container-high">
<div class="max-w-7xl mx-auto px-8 grid md:grid-cols-3 gap-12">
<div class="md:col-span-1">
<h2 class="text-sm font-bold tracking-[0.2em] uppercase text-on-surface-variant mb-4">Impact</h2>
<h3 class="text-4xl font-bold tracking-tight text-on-surface mb-8">What our partners say.</h3>
<div class="flex gap-2">
<div class="w-12 h-12 rounded-full border border-outline/30 flex items-center justify-center cursor-pointer hover:bg-white transition-all">
<span class="material-symbols-outlined">west</span>
</div>
<div class="w-12 h-12 rounded-full border border-outline/30 flex items-center justify-center cursor-pointer hover:bg-white transition-all">
<span class="material-symbols-outlined">east</span>
</div>
</div>
</div>
<div class="md:col-span-2">
<div class="bg-surface-container-lowest p-12 rounded-2xl shadow-xl relative">
<span class="material-symbols-outlined text-primary/10 text-9xl absolute top-0 right-8">format_quote</span>
<p class="text-2xl font-medium leading-relaxed italic text-on-surface mb-10 relative z-10">
                            "The precision with which Programmers.in handles architecture is rare. They didn't just write code; they built a scalable foundation that reduced our server costs by 40% while doubling our throughput."
                        </p>
<div class="flex items-center gap-4">
<img class="w-14 h-14 rounded-full object-cover" data-alt="Professional headshot of a female CTO with glasses in a modern office setting" src="/uploads/stitch/a74ad9e19f.png"/>
<div>
<div class="font-bold text-on-surface">Elena Rodriguez</div>
<div class="text-sm text-on-surface-variant">CTO at Velocity Ventures</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Inquiry Form Section -->
<section id="inquiry" class="py-24 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8 grid lg:grid-cols-2 gap-20">
        <div>
            <h2 class="text-4xl font-extrabold tracking-tighter text-on-surface mb-6">Initiate Your Digital Transformation</h2>
            <p class="text-lg text-on-surface-variant leading-relaxed mb-10">
                Detailed your architectural requirements, and our engineering leads will reach out within 24 hours to discuss the technical roadmap.
            </p>
            
            <div class="space-y-8">
                <div class="flex gap-6">
                    <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center text-primary shrink-0">
                        <span class="material-symbols-outlined">mark_as_unread</span>
                    </div>
                    <div>
                        <div class="font-black text-on-surface uppercase tracking-widest text-xs mb-1">Direct Communication</div>
                        <div class="text-on-surface-variant italic font-medium">engineering@programmers.in</div>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="w-12 h-12 rounded-2xl bg-tertiary/10 flex items-center justify-center text-tertiary shrink-0">
                        <span class="material-symbols-outlined">headset_mic</span>
                    </div>
                    <div>
                        <div class="font-black text-on-surface uppercase tracking-widest text-xs mb-1">Strategy Sessions</div>
                        <div class="text-on-surface-variant italic font-medium">Schedule a 15-min discovery call via Calendly.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-surface-container-lowest p-10 rounded-3xl shadow-2xl border border-outline-variant/10">
            @if(session('success'))
                <div class="mb-8 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 rounded-2xl flex items-center gap-3">
                    <span class="material-symbols-outlined">check_circle</span>
                    <span class="font-black uppercase tracking-widest text-[10px]">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('inquiries.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant ml-2">Full Name</label>
                        <input type="text" name="name" required class="w-full px-6 py-4 bg-surface-container-low border border-outline-variant/5 rounded-2xl focus:border-primary/30 focus:outline-none transition-all placeholder:text-slate-300" placeholder="John Doe">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant ml-2">Enterprise Email</label>
                        <input type="email" name="email" required class="w-full px-6 py-4 bg-surface-container-low border border-outline-variant/5 rounded-2xl focus:border-primary/30 focus:outline-none transition-all placeholder:text-slate-300" placeholder="john@company.com">
                    </div>
                </div>
                
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant ml-2">Inquiry Type</label>
                    <select name="subject" required class="w-full px-6 py-4 bg-surface-container-low border border-outline-variant/5 rounded-2xl focus:border-primary/30 focus:outline-none transition-all appearance-none cursor-pointer">
                        <option value="SaaS Development">SaaS Development</option>
                        <option value="Cloud Migration">Cloud Migration</option>
                        <option value="Legacy Refactoring">Legacy Refactoring</option>
                        <option value="Dedicated Engineering Team">Dedicated Engineering Team</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant ml-2">Technical Brief</label>
                    <textarea name="message" rows="4" required class="w-full px-6 py-4 bg-surface-container-low border border-outline-variant/5 rounded-2xl focus:border-primary/30 focus:outline-none transition-all placeholder:text-slate-300 resize-none" placeholder="Tell us about your project architectural goals..."></textarea>
                </div>

                <button type="submit" class="w-full py-4 bg-primary text-on-primary rounded-2xl font-black uppercase tracking-widest hover:opacity-90 shadow-2xl shadow-primary/20 transition-all flex items-center justify-center gap-3">
                    Dispatch Briefing
                    <span class="material-symbols-outlined text-base">send</span>
                </button>
            </form>
        </div>
    </div>
</section>
</main>
<!-- Footer -->
<footer class="bg-slate-50 border-t border-slate-100">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12 px-8 py-16 max-w-7xl mx-auto">
<div class="md:col-span-1">
<div class="text-lg font-black text-slate-900 mb-6">Programmers.in</div>
<p class="text-slate-500 label-md leading-relaxed">
                    High-end architectural engineering for the world's most ambitious companies.
                </p>
</div>
<div>
<h4 class="label-md tracking-wide uppercase font-inter text-slate-500 mb-6">Services</h4>
<ul class="space-y-4">
<li><a class="text-slate-500 hover:text-blue-700 transition-all" href="#">SaaS Development</a></li>
<li><a class="text-slate-500 hover:text-blue-700 transition-all" href="#">Cloud Engineering</a></li>
<li><a class="text-slate-500 hover:text-blue-700 transition-all" href="#">Cyber Security</a></li>
</ul>
</div>
<div>
<h4 class="label-md tracking-wide uppercase font-inter text-slate-500 mb-6">Company</h4>
<ul class="space-y-4">
<li><a class="text-slate-500 hover:text-blue-700 transition-all" href="#">About Us</a></li>
<li><a class="text-slate-500 hover:text-blue-700 transition-all" href="#">Careers</a></li>
<li><a class="text-slate-500 hover:text-blue-700 transition-all" href="#">Contact</a></li>
</ul>
</div>
<div>
<h4 class="label-md tracking-wide uppercase font-inter text-slate-500 mb-6">Newsletter</h4>
<div class="flex gap-2">
<input class="bg-white border-none rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-primary" placeholder="Email address" type="email"/>
<button class="bg-primary text-white p-2 rounded-lg">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
</div>
<div class="max-w-7xl mx-auto px-8 py-8 border-t border-slate-200/50 flex flex-col md:flex-row justify-between items-center gap-4">
<p class="text-slate-500 text-sm">© 2024 Programmers.in. All rights reserved.</p>
<div class="flex gap-6">
<a class="text-slate-400 hover:text-primary transition-all" href="#"><span class="material-symbols-outlined">public</span></a>
<a class="text-slate-400 hover:text-primary transition-all" href="#"><span class="material-symbols-outlined">code</span></a>
<a class="text-slate-400 hover:text-primary transition-all" href="#"><span class="material-symbols-outlined">share</span></a>
</div>
</div>
</footer>


@endsection