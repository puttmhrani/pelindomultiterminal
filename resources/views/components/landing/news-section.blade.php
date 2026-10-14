@props(['news'])

<section class="py-24 md:py-32 bg-[#F4F8FA] relative overflow-hidden">
    <!-- Ambient glow -->
    <div class="absolute top-0 left-0 w-80 h-80 bg-[#0066AE]/10 rounded-full filter blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
            <div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#0F243C] tracking-tight">
                    Berita & Siaran Pers
                </h2>
            </div>
            <a href="{{ route('media.siaran_pers') }}" 
               class="clay-btn-secondary hidden md:inline-flex py-3.5 px-7 text-sm font-extrabold group">
                <span>Lihat Semua Berita</span>
                <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($news as $article)
            <div class="clay-card-interactive group flex flex-col h-full bg-white overflow-hidden border-2 border-white">
                <div class="relative h-60 overflow-hidden">
                    <img src="{{ $article->image_url ?? 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=800&q=80' }}" 
                         alt="{{ $article->title }}" 
                         class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-[#0F243C]/15 group-hover:bg-transparent transition-colors duration-500"></div>
                    
                    <!-- Tactile Clay Date Badge -->
                    <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-md text-[#0066AE] text-xs font-extrabold px-4 py-1.5 rounded-full shadow-[2px_3px_8px_rgba(0,0,0,0.15)] border border-white">
                        {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y') : 'Baru' }}
                    </div>
                </div>

                <div class="p-7 sm:p-8 flex flex-col flex-grow">
                    <h3 class="text-xl font-extrabold text-[#0F243C] mb-3 group-hover:text-[#0066AE] transition-colors line-clamp-2 leading-snug">
                        {{ app()->getLocale() == 'en' ? ($article->title_en ?? $article->title) : $article->title }}
                    </h3>
                    <p class="text-slate-600 mb-6 flex-grow line-clamp-3 leading-relaxed text-sm font-normal">
                        {{ Str::limit(strip_tags(app()->getLocale() == 'en' ? ($article->content_en ?? $article->content_id) : $article->content_id), 130) }}
                    </p>
                    <a href="{{ route('media.detail', $article->id) }}" 
                       class="inline-flex items-center text-sm font-extrabold text-[#0066AE] group-hover:text-[#00528C] transition-colors mt-auto pt-4 border-t border-slate-100">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-12 text-center md:hidden">
            <a href="{{ route('media.siaran_pers') }}" class="clay-btn-secondary py-3.5 px-8 text-sm font-bold w-full sm:w-auto inline-flex">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>
