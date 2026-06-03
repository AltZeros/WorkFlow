<header class="bg-white shadow-sm h-16 flex items-center justify-between px-4 md:px-6 border-b border-slate-200">
    <div class="flex items-center gap-3">
        <!-- Botón de menú móvil -->
        <button onclick="toggleAppSidebar()" class="md:hidden text-slate-500 hover:text-slate-700 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <h2 class="text-lg font-medium text-slate-800 truncate">Corporación ACME</h2>
    </div>
    
    <div class="flex items-center gap-3 md:gap-4">
        <span class="text-sm text-slate-500 hidden sm:block">Admin_ACME</span>
        <div class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">A</div>
        <a href="../login.php" class="text-sm text-red-600 hover:text-red-800 font-medium ml-1 md:ml-2">Salir</a>
    </div>
</header>