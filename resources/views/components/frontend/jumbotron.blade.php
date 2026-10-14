@props(['backgroundImage' => '/images/pelabuhan.png'])

<div class="relative min-h-[48vh] md:min-h-[56vh] flex items-center justify-center bg-cover bg-center overflow-hidden shadow-[0_25px_60px_-15px_rgba(15,36,60,0.55),0_12px_24px_-8px_rgba(15,36,60,0.35)]"
     style="background-image: url('{{ $backgroundImage }}')">
    <!-- Smooth clay gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#0F243C]/85 via-[#0066AE]/60 to-[#EEF5F9] mix-blend-multiply"></div>

    <!-- Dark overlay -->
    <div class="absolute inset-0 bg-[#0F243C]/45 pointer-events-none"></div>

    <!-- Inner dark vignette shadow -->
    <div class="absolute inset-0 pointer-events-none shadow-[inset_0_0_80px_rgba(15,36,60,0.6),inset_0_-40px_60px_-20px_rgba(15,36,60,0.5)]"></div>

    <!-- Decorative corner patterns -->
    <img src="{{ asset('pattern.png') }}" alt="" aria-hidden="true"
         class="absolute bottom-0 left-0 w-28 sm:w-36 md:w-60 pointer-events-none select-none -scale-x-100">
    <img src="{{ asset('pattern.png') }}" alt="" aria-hidden="true"
         class="absolute bottom-0 right-0 w-28 sm:w-36 md:w-60 pointer-events-none select-none">

    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto pt-24 pb-16">
        @if(isset($title))
        <div class="inline-block mb-3">
            <span class="clay-badge text-xs mb-3 border border-white/40">PT Pelindo Multi Terminal</span>
        </div>
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 leading-tight text-shadow tracking-tight">
            {{ $title }}
        </h1>
        @endif

        @if(isset($subtitle))
        <p class="text-base sm:text-lg md:text-xl text-slate-100 font-medium text-shadow-sm max-w-3xl leading-relaxed mx-auto">
            {{ $subtitle }}
        </p>
        @endif

        {{ $slot }}
    </div>
</div>
