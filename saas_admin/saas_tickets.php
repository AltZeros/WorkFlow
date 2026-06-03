<?php
// Mock Data: Tickets globales entrantes
$tickets_globales = [
    ['id' => 'TKT-8501', 'tenant' => 'TechSolutions LLC', 'asunto' => 'Duda sobre configuración de nuevo flujo', 'prioridad' => 'Media', 'estado' => 'Pendiente', 'tiempo' => 'Hace 2 horas'],
    ['id' => 'TKT-8502', 'tenant' => 'Ferretería El Tornillo', 'asunto' => 'Sistema bloqueado, no me deja aprobar', 'prioridad' => 'Alta', 'estado' => 'Urgente', 'tiempo' => 'Hace 15 min'],
    ['id' => 'TKT-8492', 'tenant' => 'Corporación ACME', 'asunto' => 'Error al subir documento adjunto', 'prioridad' => 'Baja', 'estado' => 'Respondido', 'tiempo' => 'Hace 1 día'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte Global | WorkFlow Master</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 flex h-screen overflow-hidden font-sans antialiased text-slate-300">

    <?php include '../components/saas_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden w-full">
        
        <header class="h-16 flex items-center justify-between px-4 md:px-8 border-b border-slate-800 bg-slate-900">
            <div class="flex items-center gap-3">
                <button onclick="toggleSaasSidebar()" class="md:hidden text-slate-400 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h2 class="text-lg font-medium text-white">Mesa de Ayuda (HelpDesk)</h2>
            </div>
            <span class="bg-rose-500/20 text-rose-400 border border-rose-500/30 px-3 py-1 rounded-full text-xs font-bold">2 Pendientes</span>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto p-4 md:p-8">
            
            <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden">
                <div class="px-4 md:px-6 py-4 border-b border-slate-700 flex justify-between items-center bg-slate-800/50">
                    <h3 class="text-white font-medium">Bandeja de Entrada Global</h3>
                    <div class="flex gap-2">
                        <select class="bg-slate-900 border border-slate-700 text-sm text-slate-300 rounded px-3 py-1 focus:outline-none focus:border-emerald-500">
                            <option>Filtrar: Pendientes</option>
                            <option>Filtrar: Todos</option>
                        </select>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-700">
                        <thead class="bg-slate-900/50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-400 uppercase">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-400 uppercase">Tenant</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-400 uppercase">Asunto</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-400 uppercase">Prioridad</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-slate-400 uppercase">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            <?php foreach ($tickets_globales as $ticket): ?>
                            <tr class="hover:bg-slate-750 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-emerald-400">
                                    <?php echo $ticket['id']; ?>
                                    <div class="text-[10px] text-slate-500 mt-1"><?php echo $ticket['tiempo']; ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white font-medium">
                                    <?php echo $ticket['tenant']; ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-300">
                                    <?php echo $ticket['asunto']; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if($ticket['prioridad'] == 'Alta'): ?>
                                        <span class="px-2 py-1 text-[10px] uppercase tracking-wider font-bold bg-rose-900/50 text-rose-400 rounded border border-rose-800">Alta</span>
                                    <?php else: ?>
                                        <span class="px-2 py-1 text-[10px] uppercase tracking-wider font-bold bg-slate-700 text-slate-300 rounded border border-slate-600"><?php echo $ticket['prioridad']; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                    <button class="bg-slate-700 hover:bg-slate-600 text-white px-4 py-1.5 rounded transition shadow-sm text-xs font-medium">
                                        Atender
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

</body>
</html>