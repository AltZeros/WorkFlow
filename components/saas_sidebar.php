<!-- components/saas_sidebar.php -->
<!-- Overlay para móviles (Fondo oscuro) -->
<div id="saas-sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden transition-opacity" onclick="toggleSaasSidebar()"></div>

<!-- Se agregan clases fixed, transform, -translate-x-full, md:relative, md:translate-x-0 -->
<aside id="saas-sidebar" class="bg-black w-64 min-h-screen flex flex-col border-r border-slate-800 z-50 fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="h-16 flex items-center justify-between px-6 border-b border-slate-800">
        <span class="text-xl font-bold text-white tracking-tight">
            <a href="../index.php">WorkFlow </a>
        <span class="text-emerald-500">Master</span></span>
        <!-- Botón cerrar solo en móvil -->
        <button onclick="toggleSaasSidebar()" class="md:hidden text-slate-400 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
    
    <div class="flex-1 py-6 px-4 space-y-2">
        <a href="../saas_admin/saas_dashboard.php" class="text-slate-400 hover:text-white hover:bg-slate-800 flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
            Resumen Global
        </a>
        <a href="../saas_admin/saas_billing.php" class="text-slate-400 hover:text-white hover:bg-slate-800 flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
            Facturación e Ingresos
        </a>
        <a href="../saas_admin/saas_server.php" class="text-slate-400 hover:text-white hover:bg-slate-800 flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
            Estado del Servidor
        </a>
        <a href="../saas_admin/saas_tickets.php" class="text-slate-400 hover:text-white hover:bg-slate-800 flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
            Mesa de Ayuda (Tickets)
            <span class="ml-auto bg-rose-500/20 text-rose-400 border border-rose-500/30 py-0.5 px-2 rounded-full text-xs font-bold">2</span>
        </a>
    </div>
    <div class="p-4 border-t border-slate-800">
        <a href="../index.php" class="text-slate-500 hover:text-white text-sm flex items-center transition">&larr; Volver a la Web Pública</a>
    </div>
</aside>

<script>
    function toggleSaasSidebar() {
        document.getElementById('saas-sidebar').classList.toggle('-translate-x-full');
        document.getElementById('saas-sidebar-overlay').classList.toggle('hidden');
    }
</script>