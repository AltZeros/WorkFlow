<?php
// Mock Data[cite: 30]
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
                <h2 class="text-lg font-medium text-white truncate">Panel de Control (Nivel 0)</h2>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-sm hidden sm:block">Hola, Fundador</span>
                <div class="h-8 w-8 rounded-md bg-emerald-500 flex items-center justify-center text-white font-bold text-sm">F</div>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto p-4 md:p-8">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mb-8">
                <div class="bg-slate-800 rounded-xl p-6 border border-slate-700">
                    <p class="text-sm font-medium text-slate-400">Ingreso Recurrente Mensual (MRR)</p>
                    <p class="text-3xl font-bold text-white mt-2">$4,250 <span class="text-emerald-400 text-sm font-medium">+12%</span></p>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 border border-slate-700">
                    <p class="text-sm font-medium text-slate-400">Empresas Activas (Tenants)</p>
                    <p class="text-3xl font-bold text-white mt-2">42 <span class="text-emerald-400 text-sm font-medium">+3 este mes</span></p>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 border border-slate-700 sm:col-span-2 md:col-span-1">
                    <p class="text-sm font-medium text-slate-400">Usuarios Totales en la Red</p>
                    <p class="text-3xl font-bold text-white mt-2">1,840</p>
                </div>
            </div>

            <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden">
                <div class="px-4 md:px-6 py-4 md:py-5 border-b border-slate-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <h3 class="text-lg font-medium text-white">Empresas Registradas</h3>
                    <!-- Se agrega evento onclick para abrir el modal -->
                    <button onclick="openModal()" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-md text-sm font-medium transition shadow-sm">
                        + Nuevo Tenant Manual
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-700">
                        <thead class="bg-slate-900/50">
                            <tr>
                                <th class="px-4 md:px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Empresa / ID</th>
                                <th class="px-4 md:px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Plan</th>
                                <th class="px-4 md:px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Usuarios</th>
                                <th class="px-4 md:px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Estado</th>
                                <th class="px-4 md:px-6 py-4 text-right text-xs font-semibold text-slate-400 uppercase tracking-wider">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            
                            <?php foreach ($empresas_clientes as $empresa): ?>
                            <tr class="hover:bg-slate-750 transition">
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-white"><?php echo $empresa['nombre']; ?></div>
                                    <div class="text-xs text-slate-500"><?php echo $empresa['dominio']; ?></div>
                                </td>
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded bg-slate-700 text-slate-300">
                                        <?php echo $empresa['plan']; ?>
                                    </span>
                                </td>
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                    <?php echo $empresa['usuarios']; ?> as.
                                </td>
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap">
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
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-slate-400 hover:text-white mr-2 md:mr-3 transition">Gestión</a>
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

    <!-- MODAL NUEVO TENANT -->
    <div id="modal-tenant" class="fixed inset-0 z-[60] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-slate-900/80 transition-opacity backdrop-blur-sm" aria-hidden="true" onclick="closeModal()"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Contenedor del Modal -->
            <div class="inline-block align-bottom bg-slate-800 rounded-xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-slate-700">
                <div class="bg-slate-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-white mb-5" id="modal-title">Agregar Nuevo Tenant Manual</h3>
                            
                            <!-- Formulario (Lógica UI) -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-400 mb-1">Nombre de la Empresa</label>
                                    <input type="text" class="w-full bg-slate-900 border border-slate-700 rounded-md py-2 px-3 text-white focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500" placeholder="Ej. Corporación ACME">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-slate-400 mb-1">Subdominio Asignado</label>
                                    <div class="flex rounded-md shadow-sm">
                                        <input type="text" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md bg-slate-900 border border-slate-700 border-r-0 text-white focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500" placeholder="empresa">
                                        <span class="inline-flex items-center px-3 rounded-r-md border border-slate-700 bg-slate-900 text-slate-500 text-sm">
                                            .workflow.com
                                        </span>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-slate-400 mb-1">Plan de Suscripción</label>
                                    <select class="w-full bg-slate-900 border border-slate-700 rounded-md py-2 px-3 text-white focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
                                        <option value="basico">Básico (hasta 10 usuarios)</option>
                                        <option value="pro">Pro (hasta 50 usuarios)</option>
                                        <option value="enterprise">Enterprise (Ilimitado)</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-slate-400 mb-1">Email del Administrador</label>
                                    <input type="email" class="w-full bg-slate-900 border border-slate-700 rounded-md py-2 px-3 text-white focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500" placeholder="admin@empresa.com">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Botones del Modal -->
                <div class="bg-slate-900/50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-slate-700">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-emerald-600 text-base font-medium text-white hover:bg-emerald-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                        Crear Tenant e Inicializar DB
                    </button>
                    <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-slate-700 shadow-sm px-4 py-2 bg-slate-800 text-base font-medium text-slate-300 hover:bg-slate-700 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Control -->
    <script>
        function openModal() {
            document.getElementById('modal-tenant').classList.remove('hidden');
        }
        
        function closeModal() {
            document.getElementById('modal-tenant').classList.add('hidden');
        }
    </script>

</body>
</html>