<?php
// Mock Data: Simulamos el historial del usuario actual
$mis_tramites = [
    ['id' => 'TR-1048', 'flujo' => 'Adquisición de Equipo', 'fecha' => '02 Jun 2026', 'estado' => 'Borrador', 'clase_color' => 'bg-slate-100 text-slate-700'],
    ['id' => 'TR-1045', 'flujo' => 'Revisión de Viáticos', 'fecha' => '01 Jun 2026', 'estado' => 'En Revisión', 'clase_color' => 'bg-amber-100 text-amber-700'],
    ['id' => 'TR-1042', 'flujo' => 'Solicitud de Vacaciones', 'fecha' => '28 May 2026', 'estado' => 'Aprobado', 'clase_color' => 'bg-emerald-100 text-emerald-700'],
    ['id' => 'TR-1011', 'flujo' => 'Permiso de Ausencia', 'fecha' => '15 May 2026', 'estado' => 'Rechazado', 'clase_color' => 'bg-red-100 text-red-700'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Solicitudes | WorkFlow</title>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Mis Solicitudes</h1>
                    <p class="text-slate-600">Historial y estado de tus trámites actuales.</p>
                </div>
                <a href="new_application.php" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md font-medium transition shadow-sm flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Nuevo Trámite
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">ID Trámite</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Tipo de Flujo</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Fecha de Inicio</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Estado Actual</th>
                                <th class="px-6 py-4 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            
                            <?php foreach ($mis_tramites as $tramite): ?>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">
                                    #<?php echo $tramite['id']; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    <?php echo $tramite['flujo']; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                    <?php echo $tramite['fecha']; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $tramite['clase_color']; ?>">
                                        <?php echo $tramite['estado']; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="procedure_details.php" class="text-blue-600 hover:text-blue-900">Ver detalles</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                
                <div class="bg-slate-50 px-6 py-3 border-t border-slate-200 flex items-center justify-between sm:px-6">
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-slate-700">
                                Mostrando <span class="font-medium">1</span> a <span class="font-medium">4</span> de <span class="font-medium">4</span> resultados
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-slate-300 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50">Anterior</a>
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-slate-300 bg-blue-50 text-sm font-medium text-blue-600">1</a>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-slate-300 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50">Siguiente</a>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>

</body>
</html>