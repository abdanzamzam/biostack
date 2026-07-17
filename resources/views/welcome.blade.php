<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BioStack — Premium Link in Bio Builder</title>
    <meta name="description" content="Build your stunning link in bio page. Self-hosted, customizable themes, real-time analytics.">
    <meta property="og:title" content="BioStack — Premium Link in Bio Builder">
    <meta property="og:description" content="Build your stunning link in bio page. Self-hosted, customizable themes, real-time analytics.">
    <meta name="theme-color" content="#0b0f19">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-grid { background-image: radial-gradient(rgba(255,255,255,0.04) 1px, transparent 1px); background-size: 40px 40px; }
        .hero-glow { background: radial-gradient(ellipse 80% 50% at 50% -20%, rgba(13,148,136,0.2), transparent), radial-gradient(ellipse 60% 40% at 80% 20%, rgba(99,102,241,0.12), transparent); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-3px); box-shadow: 0 12px 40px rgba(13,148,136,0.12); border-color: rgba(13,148,136,0.3); }
        .text-gradient { background: linear-gradient(135deg, #2dd4bf, #38bdf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .step-dot { position: relative; }
        .step-dot::after { content: ''; position: absolute; left: 50%; top: 100%; width: 1px; height: calc(100% + 2rem); background: linear-gradient(to bottom, rgba(13,148,136,0.3), transparent); transform: translateX(-50%); }
        .step-dot:last-child::after { display: none; }
        .mockup-card { background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.12); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); }
        .theme-card { aspect-ratio: 3/5; transition: all 0.3s ease; }
        .theme-card:hover { transform: scale(1.03); }
        .animate-float { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-12px)} }
        .fade-up { opacity: 0; transform: translateY(24px); animation: fadeUp 0.7s ease forwards; }
        .fade-up-1 { animation-delay: 0.1s; }
        .fade-up-2 { animation-delay: 0.2s; }
        .fade-up-3 { animation-delay: 0.3s; }
        .fade-up-4 { animation-delay: 0.4s; }
        @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-[#0b0f19] text-white antialiased">
    {{-- Nav --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[#0b0f19]/80 backdrop-blur-xl border-b border-white/5">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2.5">
                <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-teal-500 to-cyan-600"></div>
                <span class="text-lg font-bold tracking-tight">BioStack</span>
            </a>
            <div class="flex items-center gap-5">
                <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Log in</a>
                <a href="{{ route('register') }}" class="text-sm font-semibold px-5 py-2.5 rounded-xl bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-400 hover:to-cyan-500 text-white transition-all shadow-lg shadow-teal-500/20">Get Started</a>
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="hero-glow bg-grid min-h-screen flex items-center pt-20 pb-16">
        <div class="max-w-6xl mx-auto px-6 w-full">
            <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-20">
                <div class="flex-1 space-y-7 fade-up">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-medium bg-teal-500/10 border border-teal-500/20 text-teal-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-teal-400"></span>
                        Your link in bio — fully self-hosted
                    </span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight">
                        Build your<br>
                        <span class="text-gradient">premium bio page</span><br>
                        in minutes
                    </h1>
                    <p class="text-lg text-gray-400 leading-relaxed max-w-lg">Drag-and-drop link builder, beautiful themes, real-time analytics, custom domains. No monthly fees.</p>
                    <div class="flex flex-wrap items-center gap-4">
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-400 hover:to-cyan-500 text-white font-semibold text-sm transition-all shadow-lg shadow-teal-500/25">Create Your Page <span class="text-lg">→</span></a>
                        <a href="/demo" target="_blank" class="inline-flex items-center px-8 py-3.5 rounded-xl border border-white/10 hover:border-white/20 text-gray-300 font-medium text-sm transition-all">View Demo</a>
                    </div>
                    <div class="flex items-center gap-6 pt-2 text-xs text-gray-500"><span>✦ No credit card</span><span>✦ 5 free themes</span><span>✦ 1-click deploy</span></div>
                </div>
                <div class="flex-1 w-full max-w-sm animate-float fade-up fade-up-1">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-br from-teal-500/20 to-cyan-600/10 rounded-[32px] blur-2xl"></div>
                        <div class="relative rounded-[24px] bg-gradient-to-br from-teal-700 to-teal-600 p-7 shadow-2xl">
                            <div class="flex flex-col items-center gap-4">
                                <div class="w-16 h-16 rounded-full bg-white/15 border-2 border-white/20"></div>
                                <div class="text-center">
                                    <div class="h-4 w-28 bg-white/15 rounded mx-auto"></div>
                                    <div class="h-3 w-44 bg-white/8 rounded mx-auto mt-2"></div>
                                </div>
                                <div class="w-full space-y-2.5 mt-2">
                                    <div class="mockup-card rounded-2xl py-3.5 px-5 text-center text-sm font-medium text-white/90">🌐 My Portfolio</div>
                                    <div class="mockup-card rounded-2xl py-3.5 px-5 text-center text-sm font-medium text-white/90">💻 GitHub</div>
                                    <div class="mockup-card rounded-2xl py-3.5 px-5 text-center text-sm font-medium text-white/90">📝 Latest Blog Post</div>
                                </div>
                                <div class="flex gap-3">
                                    <div class="w-9 h-9 rounded-full bg-white/8"></div>
                                    <div class="w-9 h-9 rounded-full bg-white/8"></div>
                                    <div class="w-9 h-9 rounded-full bg-white/8"></div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -top-3 -right-3 bg-gradient-to-r from-teal-500 to-cyan-600 rounded-xl px-3.5 py-1.5 text-[10px] font-bold text-white shadow-xl shadow-teal-500/30">LIVE DEMO ✦</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section class="py-28 border-t border-white/[0.04]">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center space-y-4 mb-16 fade-up">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Everything you need</h2>
                <p class="text-gray-400 text-lg max-w-xl mx-auto">No coding required. No design skills. Just your links, your style.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-5">
                @php
                    $features = [
                        ['🎨', '5 Premium Themes', 'Dark, light, glassmorphism, gradient. Each with customizable colors, fonts, and card styles.', 'from-teal-500/15 to-teal-500/5'],
                        ['📊', 'Real-time Analytics', 'Track page views, link clicks, referrers, and devices. Live updates via WebSocket.', 'from-indigo-500/15 to-indigo-500/5'],
                        ['🌐', 'Custom Domain', 'Use your own domain. Point a CNAME and you\'re live. SSL included automatically.', 'from-amber-500/15 to-amber-500/5'],
                        ['🖱️', 'Drag & Drop Builder', 'Rearrange your links with drag and drop. Add images, social icons, text, and dividers.', 'from-pink-500/15 to-pink-500/5'],
                        ['🔒', 'Self-Hosted', 'Your data stays on your server. No third-party tracking, no privacy concerns.', 'from-emerald-500/15 to-emerald-500/5'],
                        ['⚡', 'Fast & Lightweight', 'Server-side rendered. No unnecessary JS. Loads in under 100ms.', 'from-purple-500/15 to-purple-500/5'],
                    ];
                @endphp
                @foreach($features as $i => $f)
                <div class="card-hover rounded-2xl p-7 bg-gradient-to-br {{ $f[3] }} border border-white/[0.06] hover:border-white/10 fade-up" @if($i >= 3) style="animation-delay:{{ ($i-3)*0.1+0.1 }}s" @else style="animation-delay:{{ $i*0.1+0.1 }}s" @endif>
                    <div class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center text-2xl mb-5">{{ $f[0] }}</div>
                    <h3 class="text-lg font-semibold mb-2.5">{{ $f[1] }}</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">{{ $f[2] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Steps --}}
    <section class="py-28 border-t border-white/[0.04] bg-white/[0.01]">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center space-y-4 mb-20 fade-up">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Get started in 3 steps</h2>
                <p class="text-gray-400 text-lg">From zero to your bio page in under 5 minutes.</p>
            </div>
            <div class="space-y-16">
                @php $steps = [
                    ['1', 'Create an account', 'Sign up with your email. No credit card required. Choose a unique username for your bio page.'],
                    ['2', 'Add your links', 'Drag and drop to arrange your links. Choose between buttons, images, text blocks, or social icons.'],
                    ['3', 'Choose a theme & publish', 'Pick from 5 beautiful themes, customize colors, set your custom domain, and share your page.'],
                ]; @endphp
                @foreach($steps as $i => $s)
                <div class="flex items-start gap-6 fade-up" style="animation-delay:{{ $i*0.1 }}s">
                    <div class="step-dot shrink-0 w-10 h-10 rounded-full bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center text-sm font-bold shadow-lg shadow-teal-500/20">{{ $s[0] }}</div>
                    <div class="pt-1.5">
                        <h3 class="text-xl font-semibold mb-2">{{ $s[1] }}</h3>
                        <p class="text-gray-400 leading-relaxed max-w-lg">{{ $s[2] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-16 fade-up">
                <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-400 hover:to-cyan-500 text-white font-semibold text-sm transition-all shadow-lg shadow-teal-500/25">Start Building — It's Free <span class="text-lg">→</span></a>
            </div>
        </div>
    </section>

    {{-- Themes --}}
    <section class="py-28 border-t border-white/[0.04]">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center space-y-4 mb-16 fade-up">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Choose your vibe</h2>
                <p class="text-gray-400 text-lg">5 handcrafted themes. Free & Premium.</p>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                @php $themeList = [
                    ['Ocean', '#0f766e', '#0d9488', false],
                    ['Midnight', '#0f172a', '#1e293b', false],
                    ['Minimal', '#ffffff', '#f8fafc', false],
                    ['Sunset', '#f43f5e', '#fb923c', true],
                    ['Retro', '#fef3c7', '#fffbeb', true],
                ]; @endphp
                @foreach($themeList as $t)
                <div class="theme-card rounded-2xl overflow-hidden border border-white/[0.06] fade-up">
                    <div class="h-full flex flex-col items-center justify-between px-4 py-8 text-center" style="background:linear-gradient(135deg,{{ $t[1] }},{{ $t[2] }})">
                        <div class="w-10 h-10 rounded-full bg-white/15 border-2 border-white/10"></div>
                        <div class="space-y-2">
                            <div class="w-3/4 h-2 rounded bg-white/10 mx-auto"></div>
                            <div class="w-full h-2 rounded bg-white/8 mx-auto"></div>
                        </div>
                        <div class="w-full space-y-2">
                            <div class="h-8 rounded-xl bg-white/10"></div>
                            <div class="h-8 rounded-xl bg-white/10"></div>
                            <div class="h-8 rounded-xl bg-white/10"></div>
                        </div>
                        <div class="flex gap-2"><div class="w-7 h-7 rounded-full bg-white/8"></div><div class="w-7 h-7 rounded-full bg-white/8"></div></div>
                        <span class="text-xs font-semibold text-white/80">{{ $t[0] }}</span>
                        @if($t[3])<span class="text-[9px] font-bold px-2 py-0.5 rounded-full bg-amber-400/20 text-amber-300">PREMIUM</span>@endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Pricing --}}
    <section class="py-28 border-t border-white/[0.04] bg-white/[0.01]">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center space-y-4 mb-16 fade-up">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Simple pricing</h2>
                <p class="text-gray-400 text-lg">Start free. Upgrade when you need more.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                @php $plans = [
                    ['Free', '$0', 'Forever free, no strings', ['3 free themes','Unlimited links','Basic analytics','Standard .biostack.page domain'], false, 'bg-white/[0.03] border-white/[0.06]', 'Get Started', 'border border-white/10 hover:border-white/20 text-gray-300'],
                    ['Pro', '$5', 'per month', ['All free features','All 5 themes','Real-time analytics','Custom domain support','Priority support'], true, 'bg-gradient-to-br from-teal-500/10 to-cyan-600/5 border-teal-500/30', 'Subscribe', 'bg-gradient-to-r from-teal-500 to-cyan-600 text-white shadow-lg shadow-teal-500/20'],
                    ['Self-Host', 'Free', 'Bring your own server', ['All Pro features','Unlimited everything','Full data ownership','Open source (coming soon)'], false, 'bg-white/[0.03] border-white/[0.06]', 'Coming Soon', 'border border-white/10 hover:border-white/20 text-gray-300'],
                ]; @endphp
                @foreach($plans as $i => $p)
                <div class="rounded-2xl p-8 {{ $p[4] ? 'scale-[1.02]' : '' }} {{ $p[4] ? 'bg-gradient-to-br from-teal-500/10 to-cyan-600/5 border-teal-500/30' : 'bg-white/[0.03] border-white/[0.06]' }} border fade-up" style="position:relative;animation-delay:{{ $i*0.1 }}s">
                    @if($p[4])
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-teal-500 to-cyan-600 px-4 py-1 rounded-full text-[10px] font-bold text-white shadow-lg shadow-teal-500/20">POPULAR</div>
                    @endif
                    <h3 class="text-lg font-semibold mb-1">{{ $p[0] }}</h3>
                    <div class="text-4xl font-bold tracking-tight mb-1">{{ $p[1] }}</div>
                    <p class="text-sm text-gray-500 mb-6">{{ $p[2] }}</p>
                    <ul class="space-y-3 mb-8">
                        @foreach($p[3] as $li)
                        <li class="text-sm text-gray-400 flex items-center gap-2.5"><svg class="w-4 h-4 text-teal-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>{{ $li }}</li>
                        @endforeach
                    </ul>
                    @if($p[4] === false && $i === 2)
                    <button disabled class="w-full py-3 rounded-xl text-sm font-medium {{ $p[7] }} cursor-not-allowed">{{ $p[6] }}</button>
                    @else
                    <a href="{{ $p[4] || $i === 0 ? route('register') : '#' }}" class="w-full py-3 rounded-xl text-sm font-medium text-center block transition-all {{ $p[7] }}">{{ $p[6] }}</a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2.5"><div class="w-5 h-5 rounded-md bg-gradient-to-br from-teal-500 to-cyan-600"></div><span class="text-sm font-semibold">BioStack</span></div>
            <p class="text-xs text-gray-500">Built with Laravel + Livewire + Tailwind v4. Self-hosted link in bio solution.</p>
        </div>
    </footer>
</body>
</html>
