@props(['report'])

<div class="clay-card-interactive p-7 flex flex-col justify-between h-full bg-white border-2 border-white">
    <div>
        <div class="flex items-center justify-between mb-5">
            <div class="w-12 h-12 bg-[#E8F4FA] rounded-2xl flex items-center justify-center text-[#0066AE] shadow-[2px_3px_8px_rgba(0,102,174,0.12)] border border-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <span class="clay-badge text-xs font-bold">{{ $report->year }}</span>
        </div>
        <h3 class="text-lg font-extrabold text-[#0F243C] mb-2 leading-snug">{{ $report->title }}</h3>
        <p class="text-slate-500 text-sm font-medium mb-6">Tahun Publikasi: {{ $report->year }}</p>
    </div>
    
    <div class="pt-4 border-t border-slate-100">
        <a href="#" class="clay-btn-primary w-full py-3 px-4 text-xs sm:text-sm font-bold">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            {{ __('messages.download') ?? 'Unduh Dokumen' }}
        </a>
    </div>
</div>
