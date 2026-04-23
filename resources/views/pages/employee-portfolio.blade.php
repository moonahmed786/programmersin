<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $employee->name }} | Professional Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; }
            .resume-container { border: none !important; padding: 0 !important; margin: 0 !important; max-width: 100% !important; }
            .section-divider { border-color: #e5e7eb !important; }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased py-12 px-6">

    <!-- Controls -->
    <div class="max-w-[850px] mx-auto mb-8 flex justify-between items-center no-print">
        <a href="/" class="flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-primary transition-colors">
            <span class="material-symbols-outlined text-sm">arrow_back</span>
            Back to Home
        </a>
        <button onclick="window.print()" class="flex items-center gap-2 px-6 py-2.5 bg-primary text-white text-[11px] font-bold rounded-xl shadow-lg shadow-primary/20 hover:brightness-110 active:scale-95 transition-all">
            <span class="material-symbols-outlined text-sm">download</span>
            Save ATS Friendly CV
        </button>
    </div>

    <!-- Resume Container -->
    <div class="resume-container max-w-[850px] mx-auto bg-white p-12 md:p-16 border border-slate-100 shadow-sm min-h-[1100px]">
        
        <!-- Header -->
        <header class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tighter uppercase mb-4">{{ $employee->name }}</h1>
            <p class="text-sm md:text-base font-bold text-slate-600 mb-6 tracking-tight">
                {{ $employee->position ?? 'Professional Specialist' }}
            </p>
            
            <div class="flex flex-wrap justify-center items-center gap-x-8 gap-y-3 text-[11px] md:text-xs font-medium text-slate-500">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm text-slate-400">call</span>
                    {{ $employee->phone ?? 'N/A' }}
                </div>
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm text-slate-400">mail</span>
                    {{ $employee->email }}
                </div>
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm text-slate-400">location_on</span>
                    {{ $employee->location ?? 'Global / Remote' }}
                </div>
            </div>
        </header>

        <div class="space-y-10">
            <!-- About Me -->
            @if($employee->bio)
            <section>
                <h2 class="text-sm font-black text-slate-900 uppercase tracking-[0.2em] mb-3 border-b-2 border-slate-900 inline-block pb-1">About Me</h2>
                <p class="text-[13px] leading-relaxed text-slate-600 font-medium">
                    {!! nl2br(e($employee->bio)) !!}
                </p>
            </section>
            @endif

            <!-- Education -->
            @if($employee->education && count($employee->education) > 0)
            <section>
                <h2 class="text-sm font-black text-slate-900 uppercase tracking-[0.2em] mb-4 border-b-2 border-slate-900 inline-block pb-1">Education</h2>
                <div class="space-y-4">
                    @foreach($employee->education as $edu)
                    <div>
                        <p class="text-[13px] font-bold text-slate-900 uppercase">{{ $edu['university'] ?? '' }}</p>
                        <p class="text-xs font-medium text-slate-500">{{ $edu['info'] ?? '' }}</p>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif

            <!-- Skills -->
            @if($employee->skills)
            <section>
                <h2 class="text-sm font-black text-slate-900 uppercase tracking-[0.2em] mb-4 border-b-2 border-slate-900 inline-block pb-1">Skills</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4">
                    @foreach($employee->skills as $category => $skillList)
                        @if(!empty($skillList))
                        <div class="flex flex-col gap-1">
                            <span class="text-[11px] font-bold text-slate-900 uppercase tracking-wider">{{ $category }}:</span>
                            <span class="text-xs font-medium text-slate-600">{{ $skillList }}</span>
                        </div>
                        @endif
                    @endforeach
                </div>
            </section>
            @endif

            <!-- Work Experience -->
            @if($employee->experience && count($employee->experience) > 0)
            <section>
                <h2 class="text-sm font-black text-slate-900 uppercase tracking-[0.2em] mb-6 border-b-2 border-slate-900 inline-block pb-1">Work Experience</h2>
                <div class="space-y-8">
                    @foreach($employee->experience as $exp)
                    <div class="relative">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-1 mb-2">
                            <h3 class="text-[13px] font-bold text-slate-700 uppercase tracking-tight">{{ $exp['company'] ?? '' }}</h3>
                            <span class="text-[11px] font-bold text-slate-400 font-mono">{{ $exp['range'] ?? '' }}</span>
                        </div>
                        <p class="text-xs font-black text-slate-900 mb-3">{{ $exp['role'] ?? '' }}</p>
                        
                        @if(isset($exp['bullets']) && is_array($exp['bullets']))
                        <ul class="space-y-1.5 list-disc list-outside ml-4">
                            @foreach($exp['bullets'] as $bullet)
                                @if(!empty($bullet))
                                <li class="text-[12px] font-medium text-slate-600 pl-1 leading-normal">
                                    {{ $bullet }}
                                </li>
                                @endif
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
        </div>

        <!-- Footer Note -->
        <footer class="mt-20 pt-8 border-t border-slate-100 text-center">
            <p class="text-[9px] font-bold text-slate-300 uppercase tracking-[0.4em]">ProgrammersIn Architectural Core</p>
        </footer>
    </div>

</body>
</html>
