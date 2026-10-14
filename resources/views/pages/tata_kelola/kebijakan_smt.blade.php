<x-layout>
    <x-frontend.jumbotron>
        <x-slot name="title">{{ __('messages.kebijakan_smt') }}</x-slot>
        <x-slot name="subtitle">Sistem Manajemen Terpadu PT Pelindo Multi Terminal</x-slot>
    </x-frontend.jumbotron>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-16 relative z-20">
        <div class="clay-card p-8 sm:p-12 md:p-14 bg-white relative overflow-hidden border-2 border-white">
            <div class="text-center mb-10">
                <div class="w-16 h-16 bg-[#E8F4FA] rounded-3xl flex items-center justify-center text-[#0066AE] mx-auto mb-4 shadow-[3px_4px_12px_rgba(0,102,174,0.12)] border border-white">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0F243C] tracking-tight">Komitmen Manajemen</h2>
                <p class="text-slate-500 mt-2 font-medium text-sm sm:text-base">Daftar Kebijakan & Komitmen Perusahaan</p>
            </div>
            
            <ul class="space-y-8 relative border-l-2 border-[#0066AE]/25 ml-4 sm:ml-8 pl-6 sm:pl-8">
                <li class="relative group">
                    <span class="absolute -left-[35px] sm:-left-[43px] top-0.5 h-6 w-6 rounded-full bg-gradient-to-tr from-[#0066AE] to-[#00A3E0] ring-4 ring-white shadow-md flex items-center justify-center text-white text-[10px] font-bold">1</span>
                    <h3 class="text-lg font-extrabold text-[#0F243C] mb-2 leading-snug">Mutu Pelayanan</h3>
                    <p class="text-slate-700 leading-relaxed font-normal">Berkomitmen untuk terus menerus meningkatkan mutu pelayanan jasa kepelabuhanan dalam rangka memenuhi kepuasan pelanggan.</p>
                </li>
                <li class="relative group">
                    <span class="absolute -left-[35px] sm:-left-[43px] top-0.5 h-6 w-6 rounded-full bg-gradient-to-tr from-[#0066AE] to-[#00A3E0] ring-4 ring-white shadow-md flex items-center justify-center text-white text-[10px] font-bold">2</span>
                    <h3 class="text-lg font-extrabold text-[#0F243C] mb-2 leading-snug">Keselamatan dan Kesehatan Kerja (K3)</h3>
                    <p class="text-slate-700 leading-relaxed font-normal">Mencegah terjadinya kecelakaan kerja dan penyakit akibat kerja dengan menyediakan tempat kerja yang aman dan sehat.</p>
                </li>
                <li class="relative group">
                    <span class="absolute -left-[35px] sm:-left-[43px] top-0.5 h-6 w-6 rounded-full bg-gradient-to-tr from-[#0066AE] to-[#00A3E0] ring-4 ring-white shadow-md flex items-center justify-center text-white text-[10px] font-bold">3</span>
                    <h3 class="text-lg font-extrabold text-[#0F243C] mb-2 leading-snug">Perlindungan Lingkungan</h3>
                    <p class="text-slate-700 leading-relaxed font-normal">Mencegah pencemaran lingkungan dan meminimalkan dampak lingkungan dari setiap kegiatan operasional perusahaan.</p>
                </li>
                <li class="relative group">
                    <span class="absolute -left-[35px] sm:-left-[43px] top-0.5 h-6 w-6 rounded-full bg-gradient-to-tr from-[#0066AE] to-[#00A3E0] ring-4 ring-white shadow-md flex items-center justify-center text-white text-[10px] font-bold">4</span>
                    <h3 class="text-lg font-extrabold text-[#0F243C] mb-2 leading-snug">Kepatuhan Hukum</h3>
                    <p class="text-slate-700 leading-relaxed font-normal">Mematuhi semua peraturan perundang-undangan dan persyaratan lainnya yang berlaku terkait dengan Mutu, K3, dan Lingkungan.</p>
                </li>
            </ul>
        </div>
    </div>
</x-layout>
