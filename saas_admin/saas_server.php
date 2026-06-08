<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servidor | WorkFlow Master</title>
    <link rel="stylesheet" href="../assets/css/tailwind.css">
</head>
<body class="bg-slate-900 flex h-screen overflow-hidden font-sans antialiased text-slate-300">

    <?php include '../components/saas_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden w-full">
        <header class="h-16 flex items-center justify-between px-4 md:px-8 border-b border-slate-800 bg-slate-900">
            <div class="flex items-center gap-3">
                <button onclick="toggleSaasSidebar()" class="md:hidden text-slate-400 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h2 class="text-lg font-medium text-white flex items-center gap-2">
                    <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
                    Estado del Servidor
                </h2>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto p-4 md:p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700">
                    <div class="flex justify-between items-end mb-4">
                        <h3 class="text-slate-400 font-medium">Uso de CPU (AWS EC2)</h3>
                        <span class="text-2xl font-bold text-white font-mono">24%</span>
                    </div>
                    <div class="w-full bg-slate-700 rounded-full h-2.5">
                        <div class="bg-blue-500 h-2.5 rounded-full" style="width: 24%"></div>
                    </div>
                </div>

                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700">
                    <div class="flex justify-between items-end mb-4">
                        <h3 class="text-slate-400 font-medium">Memoria RAM (RDS DB)</h3>
                        <span class="text-2xl font-bold text-white font-mono">68%</span>
                    </div>
                    <div class="w-full bg-slate-700 rounded-full h-2.5">
                        <div class="bg-amber-500 h-2.5 rounded-full" style="width: 68%"></div>
                    </div>
                </div>
                
                <div class="col-span-1 md:col-span-2 bg-black p-6 rounded-xl border border-slate-700 font-mono text-xs text-emerald-400">
                    <p class="mb-2 text-slate-500">// Terminal Log - Nexus Core</p>
                    <p>[2026-06-02 19:10:02] INFO: Conexión segura establecida con Tenant TNT-001</p>
                    <p>[2026-06-02 19:11:45] WARN: Pico de tráfico detectado en nodo secundario.</p>
                    <p>[2026-06-02 19:12:10] INFO: Balanceador de carga redirigiendo peticiones...</p>
                    <p>[2026-06-02 19:14:57] SUCCESS: Sistema operando al 100% de capacidad normal.</p>
                    <span class="animate-pulse">_</span>
                </div>
            </div>
        </main>
    </div>
</body>
</html>