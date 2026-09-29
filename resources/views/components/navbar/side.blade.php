<!-- Right Fixed Sidebar (Claymorphism Redesign) -->
<div x-data="{ activeMenu: null, mobileSidebarOpen: false }" 
     @toggle-mobile-sidebar.window="mobileSidebarOpen = !mobileSidebarOpen"
     class="fixed top-0 right-0 h-screen z-50 flex transition-transform duration-300 md:translate-x-0" 
     :class="{ 'translate-x-0': mobileSidebarOpen, 'translate-x-full': !mobileSidebarOpen }"
     @click.away="if(window.innerWidth < 768) { mobileSidebarOpen = false; activeMenu = null; } else { activeMenu = null; }">
    
    <!-- Expanded Drawer Panel (Sliding out to the left) -->
    <div x-show="activeMenu !== null" 
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="translate-x-full opacity-0"
         x-transition:enter-end="translate-x-0 opacity-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="translate-x-0 opacity-100"
         x-transition:leave-end="translate-x-full opacity-0"
         class="bg-[#F4F9FD] h-full w-[calc(100vw-80px)] md:w-[460px] shadow-[-15px_0_40px_rgba(0,102,174,0.15)] border-l border-white/80 overflow-y-auto"
         style="display: none;">
         
         <div class="p-6 md:p-8">
             <div class="flex justify-between items-center mb-8 bg-white p-4 rounded-2xl shadow-[4px_6px_16px_rgba(0,102,174,0.06),-3px_-3px_10px_rgba(255,255,255,0.9)] border border-white">
                 <div class="flex items-center space-x-3">
                     <span class="w-3 h-8 bg-[#0066AE] rounded-full shadow-sm"></span>
                     <h2 class="text-2xl font-extrabold text-[#0F243C]" x-text="activeMenu"></h2>
                 </div>
                 <button @click="activeMenu = null" 
                         class="p-2.5 text-slate-400 hover:text-[#0066AE] bg-[#EEF5F9] hover:bg-white rounded-full shadow-[inset_2px_2px_4px_rgba(0,0,0,0.05),-2px_-2px_4px_rgba(255,255,255,0.9)] hover:shadow-[3px_3px_8px_rgba(0,102,174,0.1)] transition-all duration-200 active:scale-90">
                     <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                     </svg>
                 </button>
             </div>
             
             @foreach($menus as $menu)
             <div x-show="activeMenu === '{{ __($menu->name_key) }}'" class="grid {{ count($menu->children) > 2 && $menu->name_key !== 'messages.investor' ? 'grid-cols-2' : 'grid-cols-1' }} gap-4">
                 @foreach($menu->children as $child)
                 <a href="{{ Route::has($child->route_name) ? route($child->route_name) : '#' }}" 
                    class="group relative {{ $menu->name_key == 'messages.investor' ? 'p-6 min-h-[140px] flex flex-col justify-end' : ($menu->name_key == 'messages.tjsl' || $menu->name_key == 'messages.pjsl' ? 'h-48' : ($menu->name_key == 'messages.tata_kelola' ? 'h-36' : 'h-44')) }} clay-card-interactive overflow-hidden {{ ($menu->name_key == 'messages.tata_kelola' && $child->name_key == 'messages.rups') ? 'col-span-2' : '' }} block border-2 border-white/90">
                     
                     @if($menu->name_key == 'messages.investor')
                         <div class="absolute inset-0 bg-gradient-to-t from-[#0F243C]/95 via-[#0066AE]/75 to-transparent z-10 group-hover:from-[#00528C]/95 transition-colors duration-300"></div>
                         <img src="{{ $child->image_url }}" alt="{{ __($child->name_key) }}" class="absolute inset-0 w-full h-full object-cover z-0 filter transition-all duration-700 transform group-hover:scale-110">
                         <div class="relative z-20">
                             <div class="w-8 h-1 bg-[#38BDF8] rounded-full mb-2"></div>
                             <h3 class="font-extrabold text-lg mb-1 text-white leading-tight drop-shadow-sm">{{ __($child->name_key) }}</h3>
                             @if($child->subtitle)
                             <p class="text-xs text-slate-200 font-medium">{{ $child->subtitle }}</p>
                             @endif
                         </div>
                     @else
                         <img src="{{ $child->image_url }}" alt="{{ __($child->name_key) }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                         <div class="absolute inset-0 bg-gradient-to-t from-[#0F243C]/95 via-[#0066AE]/60 to-transparent group-hover:from-[#00528C]/90 transition-colors duration-300"></div>
                         <div class="absolute inset-0 p-4 flex flex-col justify-end z-20">
                             <div class="w-6 h-1 bg-[#38BDF8] rounded-full mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                             <span class="text-white drop-shadow-sm {{ $menu->name_key == 'messages.tata_kelola' ? ($child->name_key == 'messages.pedoman_tata_kelola' || $child->name_key == 'messages.kode_etik_bisnis' ? 'font-bold text-sm' : 'font-extrabold text-sm leading-tight') : ($menu->name_key == 'messages.tjsl' || $menu->name_key == 'messages.pjsl' ? 'font-extrabold text-lg' : 'font-extrabold text-base leading-tight') }}">
                                 {{ __($child->name_key) }}
                             </span>
                         </div>
                     @endif
                 </a>
                 @endforeach
             </div>
             @endforeach
             
         </div>
    </div>

    <!-- Blue Sidebar Navigation Bar (Always Visible on the right edge) -->
    <div class="bg-[#055EAA] w-20 flex flex-col h-full shadow-[-8px_0_25px_rgba(0,0,0,0.18)] relative z-10 border-l border-white/15">
        <!-- Menu Items -->
        <div class="flex-1 flex flex-col justify-center overflow-y-auto overflow-x-hidden py-4 px-2 space-y-2">
            @foreach($menus as $menu)
            <button @click="activeMenu = (activeMenu === '{{ __($menu->name_key) }}' ? null : '{{ __($menu->name_key) }}')" 
                    class="flex flex-col items-center justify-center py-4 px-1 rounded-2xl text-white transition-all duration-300 w-full group relative focus:outline-none"
                    :class="{ 
                        'bg-white text-[#0066AE] shadow-[4px_6px_16px_rgba(0,0,0,0.25),inset_1px_1px_3px_rgba(255,255,255,0.9)] scale-105': activeMenu === '{{ __($menu->name_key) }}', 
                        'text-white/90 hover:bg-white/15 hover:text-white active:scale-95': activeMenu !== '{{ __($menu->name_key) }}' 
                    }">
                <div class="mb-1 transition-transform duration-300 group-hover:scale-110" :class="{ 'text-[#0066AE]': activeMenu === '{{ __($menu->name_key) }}' }">
                    {!! $menu->icon_svg !!}
                </div>
                <span class="text-[10px] font-bold text-center px-0.5 leading-tight w-full break-words tracking-tight" :class="{ 'text-[#0066AE] font-extrabold': activeMenu === '{{ __($menu->name_key) }}' }">
                    {{ __($menu->name_key) }}
                </span>
            </button>
            @endforeach
        </div>
    </div>
</div>