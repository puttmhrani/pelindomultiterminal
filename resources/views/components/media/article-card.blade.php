@props(['article'])

<article class="clay-card-interactive group bg-white overflow-hidden flex flex-col h-full border-2 border-white">
    <div class="h-52 bg-slate-200 w-full relative overflow-hidden">
        <img src="{{ $article->image_url ?? 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80' }}" 
             alt="{{ $article->title }}" 
             class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-[#0F243C]/10 group-hover:bg-transparent transition-colors duration-500"></div>
        <div class="absolute top-3.5 left-3.5 bg-white/95 backdrop-blur-md text-[#0066AE] text-xs font-extrabold px-3.5 py-1.5 rounded-full shadow-[2px_3px_8px_rgba(0,0,0,0.12)] border border-white">
            {{ \Carbon\Carbon::parse($article->date)->translatedFormat('d M Y') }}
        </div>
    </div>
    <div class="p-6 sm:p-7 flex-grow flex flex-col">
        <h2 class="text-xl font-extrabold text-[#0F243C] mb-3 group-hover:text-[#0066AE] transition-colors line-clamp-2 leading-snug">
            {{ $article->title }}
        </h2>
        <p class="text-slate-600 mb-6 line-clamp-3 leading-relaxed text-sm font-normal">
            {{ $article->content }}
        </p>
        <div class="mt-auto pt-4 border-t border-slate-100">
            <a href="{{ route('media.detail', $article->id) }}" 
               class="inline-flex items-center text-sm font-extrabold text-[#0066AE] group-hover:text-[#00528C] transition-colors">
                <span>Baca Selengkapnya</span>
                <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
    </div>
</article>
