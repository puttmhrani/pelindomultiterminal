<x-layout>
    <!-- Hero Section -->
    <x-frontend.jumbotron backgroundImage="https://images.unsplash.com/photo-1578575437130-527eed3abbec?auto=format&fit=crop&w=1920&q=80">
        <x-slot name="title">{{ __('messages.about') }}</x-slot>
        <x-slot name="subtitle">PT Pelindo Multi Terminal (SPMT)</x-slot>
    </x-frontend.jumbotron>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-16 relative z-20">
        <div class="clay-card p-8 sm:p-12 md:p-16 bg-white relative overflow-hidden border-2 border-white">
            <div class="inline-block mb-4">
                <span class="clay-badge shadow-sm">Profil Korporasi</span>
            </div>
            
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#0F243C] mb-8 relative z-10 tracking-tight">
                Identitas Perusahaan
            </h2>
            
            <div class="prose prose-lg max-w-none text-slate-700 relative z-10 space-y-6 leading-relaxed font-normal">
                <p class="text-lg leading-relaxed">
                    PT Pelindo Multi Terminal / SPMT merupakan salah satu Subholding PT Pelabuhan Indonesia (Persero) yang dibentuk pada 1 Oktober 2021.
                </p>
                <div class="bg-[#F0F6FA] p-6 sm:p-8 rounded-3xl border border-white shadow-[inset_2px_2px_5px_rgba(0,102,174,0.06)]">
                    <p class="text-slate-800 font-medium leading-relaxed">
                        Pembentukan ini seiring dengan proses integrasi PT Pelabuhan Indonesia (Persero) yang kepemilikan sahamnya sepenuhnya dimiliki oleh Republik Indonesia. Komposisi kepemilikan saham PT Pelindo Multi Terminal adalah <strong>99,99%</strong> dimiliki oleh PT Pelabuhan Indonesia (Persero), dan <strong>0,01%</strong> dimiliki oleh PT Integrasi Logistik Cipta Solusi.
                    </p>
                </div>
                <p class="text-lg leading-relaxed">
                    PT Pelindo Multi Terminal mengelola total 37 Branch Pelabuhan dan Terminal serta tiga anak perusahaan, yang fokus pada peningkatan efisiensi logistik nasional.
                </p>
            </div>
        </div>
    </div>
</x-layout>
