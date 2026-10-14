<footer class="bg-[#055EAA] text-white pt-16 mt-20 font-sans relative overflow-hidden border-t border-white/10 shadow-[0_-15px_30px_rgba(0,0,0,0.15)]">
    <!-- Decorative subtle ambient glow -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#0066AE]/15 rounded-full filter blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-10 w-96 h-96 bg-[#00A3E0]/10 rounded-full filter blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="inline-block p-2 rounded-2xl mb-4">
            <img src="/white-logo.png" alt="Pelindo Multi Terminal" class="h-20 w-auto">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mb-16">
            <!-- Column 1: Info & Customer Care -->
            <div class="md:col-span-4 lg:col-span-3">
                
                <p class="text-slate-300 text-sm font-medium leading-relaxed mb-1">Jl. Lingkar Pelabuhan No. 1,</p>
                <p class="text-slate-300 text-sm font-medium leading-relaxed mb-3">Belawan, Medan 20411</p>
                <a href="mailto:multi.terminal@pelindo.co.id" class="text-white hover:text-white font-semibold text-sm block mb-1 transition-colors">multi.terminal@pelindo.co.id</a>
                <a href="#" class="text-slate-400 hover:text-[#38BDF8] text-xs font-semibold block mb-6 transition-colors">(Pergi ke Google Maps)</a>

                <!-- Customer Care Card (Clay Dark Panel) -->
                <div class="rounded-2xl p-4">
                    <h4 class="text-white font-bold text-xs uppercase tracking-wider mb-3 flex items-center text-[#38BDF8]">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        CUSTOMER CARE PELINDO
                    </h4>
                    <div class="space-y-2 text-xs text-slate-300">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>: <strong>102</strong></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            <span>: <strong>0811-1552-102</strong> (chat only)</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="truncate">: customer.care@pelindo.co.id</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column 2: Tautan Berguna -->
            <div class="md:col-span-2">
                <h3 class="text-base font-extrabold mb-5 text-white tracking-wide flex items-center">
                    Tautan Berguna
                </h3>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="text-slate-300 hover:text-white text-sm font-medium flex items-center group transition-colors">
                            Disclaimer
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-slate-300 hover:text-white text-sm font-medium flex items-center group transition-colors">
                            Privacy Policy
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Posting Terbaru -->
            <div class="md:col-span-6 lg:col-span-4">
                <h3 class="text-base font-extrabold mb-5 text-white tracking-wide flex items-center">
                    Posting Terbaru
                </h3>
                <ul class="space-y-2">
                    @php
                        $latestPosts = \App\Models\Article::latest('date')->take(4)->get();
                    @endphp
                    @forelse ($latestPosts as $post)
                    <li>
                        <a href="{{ route('media.detail', $post->id) }}" class="text-slate-300 hover:text-white text-sm font-medium flex items-start group transition-colors">
                            <span class="line-clamp-2 leading-snug">{{ $post->title }}</span>
                        </a>
                    </li>
                    @empty
                    <li><span class="text-slate-400 text-sm italic">Belum ada posting terbaru.</span></li>
                    @endforelse
                </ul>
            </div>

            <!-- Column 4: Newsletter -->
            <div class="md:col-span-12 lg:col-span-3">
                <h3 class="text-base font-extrabold mb-5 text-white tracking-wide flex items-center">
                    Newsletter
                </h3>
                <p class="text-slate-300 text-sm mb-4 leading-relaxed font-normal">Berlangganan untuk menerima pembaruan artikel dan pengumuman terbaru.</p>
                <form class="flex flex-col gap-3">
                    <div class="relative">
                        <input type="email" 
                               class="w-full px-4 py-3 text-slate-800 bg-white/95 rounded-2xl placeholder-slate-400 text-sm focus:outline-none focus:ring-2 focus:ring-[#38BDF8] shadow-[inset_2px_2px_4px_rgba(0,0,0,0.1)] border border-white" 
                               placeholder="Email Anda...">
                    </div>
                    <button type="submit" 
                            class="clay-btn-white py-3 px-6 text-sm w-full">
                        Langganan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Bottom Footer (Clay Inset Divider Bar) -->
    <div class="bg-[#003E7E] py-8 border-t border-white/5 shadow-[inset_0_4px_12px_rgba(0,0,0,0.3)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-xs text-slate-400 text-center md:text-left leading-relaxed">
                <p>&copy; Copyright <strong>PT Pelindo Multi Terminal</strong>. All Rights Reserved</p>
                <p class="mt-0.5 text-slate-500">Dikelola oleh IT Division &bull; BUMN untuk Indonesia</p>
            </div>
            
            <!-- Tactile Clay Social Icons -->
            <div class="flex space-x-2.5">
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/5 hover:bg-[#0066AE] text-slate-300 hover:text-white rounded-2xl shadow-[0_3px_8px_rgba(0,0,0,0.3)] hover:shadow-[0_6px_16px_rgba(0,102,174,0.4)] transition-all duration-300 hover:-translate-y-1 active:translate-y-0 border border-white/10" aria-label="Twitter">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/5 hover:bg-[#1877F2] text-slate-300 hover:text-white rounded-2xl shadow-[0_3px_8px_rgba(0,0,0,0.3)] hover:shadow-[0_6px_16px_rgba(24,119,242,0.4)] transition-all duration-300 hover:-translate-y-1 active:translate-y-0 border border-white/10" aria-label="Facebook">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.407.593 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.323-.593 1.323-1.325V1.325C24 .593 23.407 0 22.675 0z"/></svg>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/5 hover:bg-[#E1306C] text-slate-300 hover:text-white rounded-2xl shadow-[0_3px_8px_rgba(0,0,0,0.3)] hover:shadow-[0_6px_16px_rgba(225,48,108,0.4)] transition-all duration-300 hover:-translate-y-1 active:translate-y-0 border border-white/10" aria-label="Instagram">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/5 hover:bg-[#0077B5] text-slate-300 hover:text-white rounded-2xl shadow-[0_3px_8px_rgba(0,0,0,0.3)] hover:shadow-[0_6px_16px_rgba(0,119,181,0.4)] transition-all duration-300 hover:-translate-y-1 active:translate-y-0 border border-white/10" aria-label="LinkedIn">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/5 hover:bg-[#FF0000] text-slate-300 hover:text-white rounded-2xl shadow-[0_3px_8px_rgba(0,0,0,0.3)] hover:shadow-[0_6px_16px_rgba(255,0,0,0.4)] transition-all duration-300 hover:-translate-y-1 active:translate-y-0 border border-white/10" aria-label="YouTube">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>
