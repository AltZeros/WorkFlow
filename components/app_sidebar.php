<!-- components/app_sidebar.php -->
<!-- Overlay para móviles (Fondo oscuro) -->
<div id="app-sidebar-overlay" class="fixed inset-0 bg-slate-900/50 z-40 hidden md:hidden transition-opacity backdrop-blur-sm" onclick="toggleAppSidebar()"></div>

<!-- Menú lateral con comportamiento responsivo -->
<aside id="app-sidebar" class="bg-slate-900 w-64 min-h-screen flex flex-col text-slate-300 transition-transform duration-300 ease-in-out fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 z-50">
    <div class="h-16 flex items-center justify-between px-6 bg-slate-950 border-b border-slate-800">
        <span class="text-xl font-bold text-white tracking-tight">
            <a href="../index.php"> WorkFlow </a> <span class="text-blue-500 text-sm">SaaS</span>
        </span>
        <!-- Botón cerrar solo en móvil -->
        <button onclick="toggleAppSidebar()" class="md:hidden text-slate-400 hover:text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <div class="flex-1 overflow-y-auto py-4">
        <nav class="space-y-6 px-4">
            
            <div>
                <p class="px-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Panel</p>
                <div class="space-y-1">
                    <a href="dashboard.php" class="bg-blue-600 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Dashboard General
                    </a>
                    <a href="../app/my_procedures.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Mis Solicitudes
                    </a>
                    <a href="../app/new_application.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Iniciar Trámite
                    </a>
                </div>
            </div>

            <div>
                <p class="px-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Aprobación</p>
                <div class="space-y-1">
                    <a href="../app/pending_tasks.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Bandeja de Pendientes
                        <span class="ml-auto bg-blue-500 text-white py-0.5 px-2 rounded-full text-xs">12</span>
                    </a>
                    <a href="../app/audit.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Auditoría
                    </a>
                </div>
            </div>

            <div>
                <p class="px-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Gestión del Sistema</p>
                <div class="space-y-1">
                    <a href="../app/flow_manager.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Gestor de Flujos
                    </a>
                    <a href="../app/access_management.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Directorio de Usuarios
                    </a>
                    <a href="../app/organization.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Organización
                    </a>
                    <a href="../app/subscription.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Suscripción
                    </a>
                </div>
            </div>

            <div>
                <p class="px-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Supervisor</p>
                <div class="space-y-1">
                    <a href="../app/pending_tasks.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Bandeja de Pendientes
                        <span class="ml-auto bg-blue-500 text-white py-0.5 px-2 rounded-full text-xs">12</span>
                    </a>
                </div>
                <div class="space-y-1">
                    <a href="../app/audit.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Auditoria
                    </a>
                </div>
            </div>

            <div>
                <p class="px-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Portal del Empleado</p>
                <div class="space-y-1">
                    <a href="../app/my_procedures.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Mis Solicitudes
                    </a>
                    <a href="../app/new_application.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        Iniciar Trámite
                    </a>
                </div>
            </div>

            <div>
                <p class="px-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Soporte y Ayuda</p>
                <div class="space-y-1">
                    <a href="../app/contact_support.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <svg class="w-5 h-5 mr-3 text-slate-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Contactar Soporte
                    </a>
                    <a href="../app/support_inbox.php" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <svg class="w-5 h-5 mr-3 text-slate-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        Bandeja de Respuestas
                        <span class="ml-auto bg-rose-500 text-white py-0.5 px-2 rounded-full text-xs">1</span>
                    </a>
                </div>
            </div>

        </nav>
    </div>
</aside>

<!-- Script para alternar el menú en móviles -->
<script>
    function toggleAppSidebar() {
        document.getElementById('app-sidebar').classList.toggle('-translate-x-full');
        document.getElementById('app-sidebar-overlay').classList.toggle('hidden');
    }
</script>