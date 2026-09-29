<section class="py-24 md:py-32 relative bg-cover bg-center overflow-hidden" 
         style="background-image: url('/images/pelabuhan-2.jpeg')">
    <!-- Smooth dual gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#0F243C]/85 via-[#0F243C]/65 to-[#0F243C]/85 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#0F243C]/40 via-transparent to-transparent opacity-80"></div>

    <!-- Decorative soft clay ambient spheres -->
    <div class="absolute top-10 right-10 w-96 h-96 bg-[#00A3E0]/15 rounded-full filter blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 left-10 w-96 h-96 bg-[#0066AE]/20 rounded-full filter blur-3xl pointer-events-none"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- Left Image (Claymorphism Frame) -->
            <div class="lg:col-span-5 relative group">
                <div class="p-3.5 relative z-10 overflow-hidden transform group-hover:-translate-y-2 transition-transform duration-500">
                    <div class="rounded-2xl overflow-hidden relative shadow-inner">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=800&q=80" 
                             alt="About PMT" 
                             class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-[#0066AE]/10 group-hover:bg-transparent transition-colors duration-500"></div>
                    </div>
                </div>
                <!-- Soft background clay accent pillow -->
                <div class="absolute -bottom-6 -left-6 w-36 h-36 bg-gradient-to-tr from-[#0066AE] to-[#00A3E0] rounded-3xl opacity-30 filter blur-xl z-0"></div>
            </div>
            
            <!-- Right Content -->
            <div class="lg:col-span-7">
                <div class="inline-flex items-center space-x-2 px-4 py-2 rounded-full bg-white/20 backdrop-blur-md border border-white/40 shadow-[0_4px_16px_rgba(0,0,0,0.15)] text-white text-xs md:text-sm font-extrabold uppercase tracking-wider mb-6">
                    <span>Tentang Kami</span>
                </div>

                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white mb-8 leading-tight tracking-tight text-shadow-sm">
                    Membangun Konektivitas, <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#38BDF8] via-[#7DD3FC] to-white">Pelindo Multi Terminal</span>
                </h2>
                
                <!-- Clay Elevated Content Box -->
                <div class="mb-8 relative overflow-hidden bg-transparent">
                    <div class="space-y-4 text-slate-700 text-base md:text-lg leading-relaxed font-normal">
                        <p class="text-white">
                            Pelindo Multi Terminal / PMT merupakan anak usaha PT Pelindo (Persero) yang fokus pada pengelolaan operasional terminal non-petikemas/multipurpose. PMT dalam kegiatan operasionalnya mengelola 37 Branch yang tersebar di wilayah Sumatera, Jawa, Kalimantan, hingga Sulawesi.
                        </p>
                        <p class="text-white">
                            PMT saat ini juga mengelola 3 Anak Perusahaan, yaitu PT Pelabuhan Tanjung Priok (PTP), PT Indonesia Kendaraan Terminal, Tbk. (IPCC) yang merupakan terminal kendaraan terbesar di ASEAN, dan PT Terminal Curah Utama (TCU).
                        </p>
                    </div>
                </div>
                
                <a href="{{ route('profile.about') }}" 
                   class="clay-btn-white py-4 px-10 text-base font-extrabold group">
                    <span>Jelajahi Profil Kami</span>
                    <svg class="w-5 h-5 ml-3 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
