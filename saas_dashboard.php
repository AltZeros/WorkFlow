<?php
// Mock Data: Las empresas (Tenants) que están pagando por usar tu software
$empresas_clientes = [
    ['id' => 'TNT-001', 'nombre' => 'Corporación ACME', 'dominio' => 'acme.workflow.com', 'plan' => 'Enterprise', 'usuarios' => 45, 'estado' => 'Activo'],
    ['id' => 'TNT-002', 'nombre' => 'TechSolutions LLC', 'dominio' => 'techsol.workflow.com', 'plan' => 'Pro', 'usuarios' => 12, 'estado' => 'Activo'],
    ['id' => 'TNT-003', 'nombre' => 'Ferretería El Tornillo', 'dominio' => 'tornillo.workflow.com', 'plan' => 'Básico', 'usuarios' => 5, 'estado' => 'Atraso de Pago'],
    ['id' => 'TNT-004', 'nombre' => 'Ministerio de Obras', 'dominio' => 'minobras.workflow.com', 'plan' => 'Enterprise', 'usuarios' => 120, 'estado' => 'Activo'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaaS SuperAdmin | WorkFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 flex h-screen overflow-hidden font-sans antialiased text-slate-300">

    <aside class="bg-black w-64 min-h-screen flex flex-col border-r border-slate-800">
        <div class="h-16 flex items-center px-6 border-b border-slate-800">
            <span class="text-xl font-bold text-white tracking-tight">
            	<a href="index.php">WorkFlow </a>
            <span class="text-emerald-500">Master</span></span>
        </div>
        <div class="flex-1 py-6 px-4 space-y-2">
            <a href="#" class="bg-slate-800 text-white flex items-center px-3 py-2.5 rounded-lg text-sm font-medium">Resumen Global</a>
            <a href="#" class="text-slate-400 hover:text-white hover:bg-slate-800 flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">Gestión de Inquilinos</a>
            <a href="#" class="text-slate-400 hover:text-white hover:bg-slate-800 flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">Facturación e Ingresos</a>
            <a href="#" class="text-slate-400 hover:text-white hover:bg-slate-800 flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">Estado del Servidor</a>
        </div>
        <div class="p-4 border-t border-slate-800">
            <a href="index.php" class="text-slate-500 hover:text-white text-sm flex items-center transition">&larr; Volver a la Web Pública</a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <header class="h-16 flex items-center justify-between px-8 border-b border-slate-800 bg-slate-900">
            <h2 class="text-lg font-medium text-white">Panel de Control (Nivel 0)</h2>
            <div class="flex items-center gap-3">
                <span class="text-sm">Hola, Fundador</span>
                <div class="h-8 w-8 rounded-md bg-emerald-500 flex items-center justify-center text-white font-bold text-sm">F</div>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-slate-800 rounded-xl p-6 border border-slate-700">
                    <p class="text-sm font-medium text-slate-400">Ingreso Recurrente Mensual (MRR)</p>
                    <p class="text-3xl font-bold text-white mt-2">$4,250 <span class="text-emerald-400 text-sm font-medium">+12%</span></p>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 border border-slate-700">
                    <p class="text-sm font-medium text-slate-400">Empresas Activas (Tenants)</p>
                    <p class="text-3xl font-bold text-white mt-2">42 <span class="text-emerald-400 text-sm font-medium">+3 este mes</span></p>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 border border-slate-700">
                    <p class="text-sm font-medium text-slate-400">Usuarios Totales en la Red</p>
                    <p class="text-3xl font-bold text-white mt-2">1,840</p>
                </div>
            </div>

            <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-700 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-white">Empresas Registradas</h3>
                    <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-md text-sm font-medium transition shadow-sm">
                        + Nuevo Tenant Manual
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-700">
                        <thead class="bg-slate-900/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Empresa / ID</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Plan</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Usuarios</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Estado de Cuenta</th>
                                <th class="px-6 py-4 text-right text-xs font-semibold text-slate-400 uppercase tracking-wider">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            
                            <?php foreach ($empresas_clientes as $empresa): ?>
                            <tr class="hover:bg-slate-750 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-white"><?php echo $empresa['nombre']; ?></div>
                                    <div class="text-xs text-slate-500"><?php echo $empresa['dominio']; ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded bg-slate-700 text-slate-300">
                                        <?php echo $empresa['plan']; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                    <?php echo $empresa['usuarios']; ?> asientos
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if($empresa['estado'] == 'Activo'): ?>
                                        <span class="flex items-center gap-1.5 text-sm font-medium text-emerald-400">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Activo
                                        </span>
                                    <?php else: ?>
                                        <span class="flex items-center gap-1.5 text-sm font-medium text-rose-400">
                                            <span class="w-2 h-2 rounded-full bg-rose-500"></span> <?php echo $empresa['estado']; ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-slate-400 hover:text-white mr-3 transition">Gestionar</a>
                                    <a href="#" class="text-rose-500 hover:text-rose-400 transition">Suspender</a>
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