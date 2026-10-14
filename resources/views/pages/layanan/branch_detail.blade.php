<x-layout>
    <!-- Hero Section -->
    <div class="relative h-[380px] sm:h-[440px] w-full flex flex-col justify-end overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0F243C] via-[#0F243C]/70 to-transparent z-10 mix-blend-multiply"></div>
        <img src="{{ $branch->image_url }}" class="absolute inset-0 w-full h-full object-cover transform scale-105" alt="{{ $branch->name }}">
        <div class="relative z-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full pb-32 sm:pb-36">
            <span class="clay-badge-primary inline-flex px-4 py-1.5 rounded-full text-xs sm:text-sm font-extrabold mb-4 uppercase tracking-wider shadow-lg">
                {{ $branch->parent_company }}
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-extrabold text-white mb-3 text-shadow tracking-tight">{{ $branch->name }}</h1>
            <div class="flex items-center text-slate-200 text-sm sm:text-base font-medium">
                <svg class="w-5 h-5 mr-2 text-[#38BDF8] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span>{{ $branch->address }}</span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-24 sm:-mt-28 relative z-30">
        <div class="clay-card p-8 sm:p-12 md:p-14 bg-white relative overflow-hidden border-2 border-white">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0F243C] mb-8 border-b border-slate-100 pb-5 tracking-tight">
                Informasi Fasilitas & Layanan
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-6">
                    <div class="flex items-center p-6 bg-[#F0F6FA] rounded-3xl border border-white shadow-[inset_2px_2px_4px_rgba(0,102,174,0.06)]">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center mr-6 text-[#0066AE] shadow-sm flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xs text-slate-500 font-extrabold uppercase tracking-wider mb-1">Panjang Dermaga</h3>
                            <p class="text-2xl sm:text-3xl font-extrabold text-[#0F243C]">{{ $branch->dock_length }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-6 bg-[#F0F6FA] rounded-3xl border border-white shadow-[inset_2px_2px_4px_rgba(0,102,174,0.06)]">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center mr-6 text-[#0066AE] shadow-sm flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xs text-slate-500 font-extrabold uppercase tracking-wider mb-1">Luas Lapangan Penumpukan</h3>
                            <p class="text-2xl sm:text-3xl font-extrabold text-[#0F243C]">{{ $branch->stacking_area }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="clay-card-soft p-8 rounded-3xl flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-extrabold text-[#0F243C] mb-4">Profil Entitas</h3>
                        <p class="text-slate-700 leading-relaxed mb-6 font-normal">
                            {{ $branch->name }} beroperasi di bawah naungan <strong>{{ $branch->parent_company }}</strong>. 
                            Fasilitas ini didukung oleh infrastruktur modern dan terintegrasi untuk memberikan pelayanan bongkar muat dan 
                            penumpukan barang yang efektif dan efisien guna menunjang sistem logistik nasional.
                        </p>
                    </div>
                    <a href="{{ route('layanan.branch') }}" 
                       class="clay-btn-primary py-3.5 px-6 text-sm font-bold w-full">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali ke Daftar Branch
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
