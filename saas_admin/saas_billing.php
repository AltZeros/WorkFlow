<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturación | WorkFlow Master</title>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
</head>
<body class="bg-slate-900 flex h-screen overflow-hidden font-sans antialiased text-slate-300">

    <?php include '../components/saas_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden w-full">
        <header class="h-16 flex items-center justify-between px-4 md:px-8 border-b border-slate-800 bg-slate-900">
            <div class="flex items-center gap-3">
                <button onclick="toggleSaasSidebar()" class="md:hidden text-slate-400 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h2 class="text-lg font-medium text-white">Gestión de Facturación</h2>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto p-4 md:p-8">
            <div class="bg-slate-800 p-6 md:p-8 rounded-xl border border-slate-700 shadow-lg text-center mb-8">
                <h3 class="text-lg font-medium text-slate-400 mb-2">Ingreso Recurrente Mensual Estimado</h3>
                <p class="text-5xl font-extrabold text-white">$4,250.00</p>
                <button class="mt-6 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-md font-bold transition">Generar Reporte Fiscal</button>
            </div>

            <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-700"><h3 class="text-white font-medium">Últimos Pagos Procesados</h3></div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-700">
                        <thead class="bg-slate-900/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs text-slate-400 uppercase">Empresa</th>
                            <th class="px-6 py-3 text-left text-xs text-slate-400 uppercase">Monto</th>
                            <th class="px-6 py-3 text-left text-xs text-slate-400 uppercase">Fecha</th>
                            <th class="px-6 py-3 text-left text-xs text-slate-400 uppercase">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700">
                        <tr class="hover:bg-slate-750">
                            <td class="px-6 py-4 text-white text-sm">TechSolutions LLC</td>
                            <td class="px-6 py-4 text-emerald-400 font-mono text-sm">$144.00</td>
                            <td class="px-6 py-4 text-slate-400 text-sm">01 Jun 2026</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 bg-emerald-900 text-emerald-300 text-xs rounded">Completado</span></td>
                        </tr>
                        <tr class="hover:bg-slate-750">
                            <td class="px-6 py-4 text-white text-sm">Corporación ACME</td>
                            <td class="px-6 py-4 text-emerald-400 font-mono text-sm">$540.00</td>
                            <td class="px-6 py-4 text-slate-400 text-sm">28 May 2026</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 bg-emerald-900 text-emerald-300 text-xs rounded">Completado</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>