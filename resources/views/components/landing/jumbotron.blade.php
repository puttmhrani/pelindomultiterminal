<div class="relative min-h-[92vh] md:min-h-[100vh] flex items-center justify-center bg-cover bg-center overflow-hidden" 
     style="background-image: url('/images/pelabuhan.png')">
    <!-- Smooth dual gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#0F243C]/85 via-[#0F243C]/65 to-[#0F243C]/85 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#0F243C]/40 via-transparent to-transparent opacity-80"></div>

    <!-- Decorative soft clay ambient spheres -->
    <div class="absolute top-10 right-10 w-96 h-96 bg-[#00A3E0]/15 rounded-full filter blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 left-10 w-96 h-96 bg-[#0066AE]/20 rounded-full filter blur-3xl pointer-events-none"></div>

    <div class="relative z-10 text-start px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto mt-16 md:mt-24">
        <!-- Floating Clay Hero Badge -->
        <div class="inline-flex items-center space-x-2 px-4 py-2 rounded-full bg-white/20 backdrop-blur-md border border-white/40 text-white text-xs md:text-sm font-extrabold uppercase tracking-wider mb-6">
            <span>PT PELINDO MULTI TERMINAL</span>
        </div>

        <h1 class="text-3xl sm:text-4xl md:text-6xl font-extrabold text-white mb-6 leading-[1.15] text-shadow tracking-tight">
            Menjadi Pemimpin dalam <br class="hidden sm:block" />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#38BDF8] to-[#7DD3FC]">Konektivitas Barang</span> di Indonesia
        </h1>

        <p class="text-lg sm:text-xl md:text-2xl text-slate-100 mb-10 font-normal text-shadow-sm max-w-3xl leading-relaxed">
            Sebagai Operator Terminal Multipurpose dengan Menciptakan Ekosistem yang Memberikan Nilai Tambah bagi Stakeholders dan Negara.
        </p>

        <div class="flex flex-wrap items-center gap-4">
            <a href="{{ route('profile.about') }}" 
               class="clay-btn-white py-4 px-10 text-base font-extrabold group">
                <span>Selengkapnya</span>
                <svg class="w-5 h-5 ml-2.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
            <a href="{{ route('layanan.index') }}" 
               class="clay-btn-primary py-4 px-8 text-base font-extrabold">
                <span>Layanan Kami</span>
            </a>
        </div>
    </div>
</div>
