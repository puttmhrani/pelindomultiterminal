<!-- Top Sticky Navbar (Claymorphism Redesign) -->
<nav x-data="{ scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="{ 
         'bg-white/90 backdrop-blur-xl shadow-[0_10px_25px_-5px_rgba(0,102,174,0.12),inset_0_1px_2px_rgba(255,255,255,0.9)] py-3': scrolled, 
         'bg-transparent py-3': !scrolled 
     }"
     class="fixed top-0 w-full z-40 transition-all duration-300 md:pr-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <!-- Logo with tactile clay container when not scrolled or subtle glow -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="group flex items-center transition-transform duration-300 hover:scale-105 active:scale-95">
                    <div :class="{ 'px-1.5 rounded-2xl shadow-sm': !scrolled, 'px-1.5': scrolled }" class="transition-all duration-300">
                        <img :src="scrolled ? '{{ asset('logo.png') }}' : '{{ asset('white-logo.png') }}'" alt="Pelindo Multi Terminal" class="h-12 md:h-14 w-auto drop-shadow-sm">
                    </div>
                </a>
            </div>
            
            <!-- Right Utilities (Search, Location, Lang Switch, Mobile Menu) -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <!-- Search Form (Clay Inset Input) -->
                <form action="{{ route('media.search') ?? '#' }}" method="GET" class="relative hidden sm:flex items-center">
                    <input type="text" 
                           name="q" 
                           placeholder="{{ __('messages.search_placeholder') }}" 
                           :class="{ 
                               'bg-slate-100/90 text-slate-800 placeholder-slate-400 border-slate-200/80 focus:bg-white focus:border-[#0066AE] shadow-[inset_2px_2px_4px_rgba(0,0,0,0.06),inset_-2px_-2px_4px_rgba(255,255,255,0.9)]': scrolled, 
                               'text-white placeholder-white/80 focus:bg-white focus:text-slate-800 focus:placeholder-slate-400 backdrop-blur-md border border-white/30 shadow-[0_4px_12px_rgba(0,0,0,0.1)]': !scrolled 
                           }" 
                           class="border rounded-full py-2 px-4 pr-10 focus:outline-none focus:ring-2 focus:ring-[#0066AE]/30 transition-all duration-300 text-sm w-44 focus:w-60 font-medium">
                    <button type="submit" 
                            :class="{ 'text-slate-600 hover:text-[#0066AE]': scrolled, 'text-white hover:text-white/80': !scrolled }" 
                            class="absolute right-3 p-1 rounded-full transition-colors focus:outline-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
                
                <!-- Location Icon Button -->
                <button :class="{ 
                            'text-slate-700 bg-slate-100 shadow-[inset_2px_2px_4px_rgba(0,0,0,0.07),inset_-2px_-2px_4px_rgba(255,255,255,0.9)] border-slate-200/60': scrolled, 
                            'text-white backdrop-blur-md border border-white/30 shadow-[0_4px_12px_rgba(0,0,0,0.1)]': !scrolled 
                        }" 
                        class="p-2.5 rounded-full hover:text-[#0066AE] hover:-translate-y-0.5 active:translate-y-0.5 transition-all duration-200 hidden sm:flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </button>

                <!-- Language Switch (Clay Pill Container) -->
                <div :class="{ 
                        'bg-slate-100 shadow-[inset_2px_2px_4px_rgba(0,0,0,0.07),inset_-2px_-2px_4px_rgba(255,255,255,0.9)] border-slate-200/60': scrolled, 
                        'backdrop-blur-md border border-white/30 shadow-[0_4px_12px_rgba(0,0,0,0.1)]': !scrolled 
                     }" 
                     class="flex items-center rounded-full p-1 border transition-all duration-300">
                    <a href="{{ route('lang.switch', 'id') ?? '#' }}" 
                       :class="{ 'text-slate-600 hover:text-slate-900': scrolled, 'text-white hover:text-white/80': !scrolled }"
                       class="px-3 py-1 rounded-full text-xs font-extrabold transition-all duration-300 {{ app()->getLocale() == 'id' ? '!clay-btn-primary !text-slate-500 shadow-sm scale-105' : '' }}">
                        ID
                    </a>
                    <a href="{{ route('lang.switch', 'en') ?? '#' }}" 
                       :class="{ 'text-slate-600 hover:text-slate-900': scrolled, 'text-white hover:text-white/80': !scrolled }"
                       class="px-3 py-1 rounded-full text-xs font-extrabold transition-all duration-300 {{ app()->getLocale() == 'en' ? '!clay-btn-primary !text-white shadow-sm scale-105' : '' }}">
                        EN
                    </a>
                </div>

                <!-- Mobile Menu Button (Tactile Clay) -->
                <button @click="$dispatch('toggle-mobile-sidebar')" 
                        :class="{ 
                            'text-slate-800 bg-white shadow-[3px_4px_10px_rgba(0,102,174,0.1),-2px_-2px_6px_rgba(255,255,255,0.95)] border border-slate-100': scrolled, 
                            'text-white bg-white/25 backdrop-blur-md shadow-[0_4px_12px_rgba(0,0,0,0.15)] border border-white/40': !scrolled 
                        }" 
                        class="md:hidden p-2 rounded-2xl focus:outline-none hover:scale-105 active:scale-95 transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
