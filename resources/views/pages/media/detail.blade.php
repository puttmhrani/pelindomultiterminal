<x-layout>
    <div class="pt-28 pb-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="clay-card p-8 sm:p-12 md:p-14 bg-white border-2 border-white relative overflow-hidden">
                <div class="inline-block mb-4">
                    <span class="clay-badge shadow-sm">
                        {{ $article->type == 'press_release' ? 'Siaran Pers' : 'Pemberitaan Media' }}
                    </span>
                </div>
                
                <h1 class="text-2xl sm:text-3xl md:text-5xl font-extrabold text-[#0F243C] mb-6 leading-tight tracking-tight">
                    {{ $article->title }}
                </h1>
                
                <div class="flex items-center text-slate-500 mb-8 text-sm font-medium">
                    <svg class="w-4 h-4 mr-2 text-[#0066AE]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>{{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y') }}</span>
                </div>
                
                <div class="w-full h-64 sm:h-80 md:h-[420px] rounded-3xl mb-10 overflow-hidden shadow-md border border-slate-100 relative">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80" 
                         alt="{{ $article->title }}" 
                         class="w-full h-full object-cover">
                </div>
                
                <div class="prose prose-lg max-w-none text-slate-700 leading-relaxed space-y-6 font-normal">
                    <p class="text-base sm:text-lg leading-relaxed">{{ $article->content }}</p>
                    <p class="text-base sm:text-lg leading-relaxed">Jakarta, {{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y') }} - PT Pelindo Multi Terminal kembali menegaskan komitmennya dalam memberikan pelayanan prima di seluruh wilayah operasionalnya guna mendorong pertumbuhan logistik nasional.</p>
                    
                    <div class="bg-[#F0F6FA] p-6 sm:p-8 rounded-3xl border border-white shadow-[inset_2px_2px_4px_rgba(0,102,174,0.06)] mt-8">
                        <h4 class="text-sm font-extrabold text-[#0F243C] uppercase tracking-wider mb-2">Informasi Kontak Media:</h4>
                        <p class="text-sm text-slate-700 mb-0 font-medium">
                            <strong>Corporate Secretary</strong><br>
                            PT Pelindo Multi Terminal<br>
                            <a href="mailto:info@pelindomultiterminal.co.id" class="text-[#0066AE] font-bold hover:underline">info@pelindomultiterminal.co.id</a>
                        </p>
                    </div>
                </div>
                
                <div class="mt-12 pt-8 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ $article->type == 'press_release' ? route('media.siaran_pers') : route('media.pemberitaan') }}" 
                       class="clay-btn-secondary py-3 px-8 text-sm font-bold inline-flex">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
