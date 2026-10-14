@props(['terminals'])

<section class="py-24 md:py-32 relative bg-cover bg-center overflow-hidden" 
         style="background-image: url('/images/pelabuhan-3.jpeg')">
    <!-- Smooth dual gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#0F243C]/85 via-[#0F243C]/65 to-[#EEF5F9] mix-blend-multiply"></div>

    <!-- Ambient glow -->
    <div class="absolute top-1/2 left-0 w-80 h-80 bg-[#0066AE]/20 rounded-full filter blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 md:mb-20">
            <div class="inline-flex items-center space-x-2 px-4 py-2 rounded-full bg-white/20 backdrop-blur-md border border-white/40 shadow-[0_4px_16px_rgba(0,0,0,0.15)] text-white text-xs md:text-sm font-extrabold uppercase tracking-wider mb-6">
                <span>Layanan Kami</span>
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight text-shadow-sm">
                Daftar Layanan Terminal
            </h2>
            <p class="mt-4 text-slate-100 text-base md:text-lg max-w-2xl mx-auto font-normal text-shadow-sm">
                Pelayanan terintegrasi dan berstandar internasional di seluruh penjuru kepulauan Indonesia.
            </p>
        </div>
        
        <div class="max-w-4xl mx-auto space-y-6">
            @foreach($terminals->take(6) as $index => $terminal)
            <div x-data="{ expanded: false }" 
                 class="relative z-10 transition-all duration-300 overflow-hidden" 
                 :class="{ 'shadow-[12px_20px_40px_rgba(0,102,174,0.15)] scale-[1.01] z-20': expanded }">
                
                <button @click="expanded = !expanded" 
                        class="relative w-full text-left focus:outline-none overflow-hidden group block rounded-t-3xl transition-all" 
                        :class="{'rounded-b-3xl': !expanded, 'rounded-b-none': expanded}">
                    @if($terminal->image_url)
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" style="background-image: url('{{ $terminal->image_url }}')"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-[#0F243C]/95 via-[#0066AE]/80 to-[#0066AE]/40 group-hover:from-[#00528C]/95 transition-colors duration-500"></div>
                    @else
                        <div class="absolute inset-0 bg-gradient-to-r from-[#0F243C] to-[#0066AE] group-hover:from-[#00528C] group-hover:to-[#00A3E0] transition-colors duration-500"></div>
                    @endif
                    
                    <div class="relative z-10 px-6 sm:px-8 py-8 sm:py-9 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="w-10 h-10 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center text-white font-extrabold text-sm border border-white/30">
                                0{{ $index + 1 }}
                            </span>
                            <h3 class="text-xl sm:text-2xl font-extrabold text-white tracking-wide drop-shadow-sm">{{ $terminal->name }}</h3>
                        </div>

                        <!-- Tactile Clay Toggle Pill -->
                        <span class="ml-4 flex-shrink-0 transition-all duration-300 text-white bg-white/25 hover:bg-white/40 p-2.5 rounded-full backdrop-blur-md border border-white/40 shadow-[0_4px_10px_rgba(0,0,0,0.15)]" 
                              :class="{ 'rotate-180 bg-white text-[#0066AE] shadow-[0_4px_12px_rgba(0,102,174,0.25)]': expanded }">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </div>
                </button>

                <div x-show="expanded" 
                     x-collapse 
                     x-transition.duration.400ms 
                     class="bg-white px-6 sm:px-8 py-8 border-t border-slate-100 rounded-b-3xl">
                    <p class="text-slate-700 mb-6 text-base sm:text-lg leading-relaxed font-normal">
                        {{ $terminal->description }}
                    </p>
                    <div class="inline-flex items-center bg-[#E8F4FA] text-[#0066AE] font-bold text-sm px-5 py-2.5 rounded-full shadow-[2px_3px_8px_rgba(0,102,174,0.08)] border border-white/80">
                        <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Fitur Utama: <strong class="ml-1 font-extrabold">{{ $terminal->key_feature }}</strong>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
