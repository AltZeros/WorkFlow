<?php
// Mock Data (Humo y espejos)
$metricas = [
    'flujos_activos' => 8,
    'tramites_pendientes' => 142,
    'empleados' => 45,
    'tiempo_promedio' => '2.4 días'
];

$actividad_reciente = [
    ['usuario' => 'Carlos Ruiz', 'accion' => 'Aprobó: Vacaciones', 'tiempo' => 'Hace 10 min'],
    ['usuario' => 'Ana López', 'accion' => 'Inició: Viáticos', 'tiempo' => 'Hace 45 min'],
    ['usuario' => 'Sistema', 'accion' => 'Flujo Creado: Auditoría', 'tiempo' => 'Hace 2 horas'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | WorkFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../componentes/app_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <?php include '../componentes/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-slate-900">Resumen Operativo</h1>
                <p class="text-slate-600">Vista general del estado de la empresa.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 border-l-4 border-l-blue-500">
                    <p class="text-sm font-medium text-slate-500">Flujos Activos</p>
                    <p class="text-3xl font-bold text-slate-800 mt-2"><?php echo $metricas['flujos_activos']; ?></p>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 border-l-4 border-l-amber-500">
                    <p class="text-sm font-medium text-slate-500">Trámites en Espera</p>
                    <p class="text-3xl font-bold text-slate-800 mt-2"><?php echo $metricas['tramites_pendientes']; ?></p>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 border-l-4 border-l-emerald-500">
                    <p class="text-sm font-medium text-slate-500">Empleados Registrados</p>
                    <p class="text-3xl font-bold text-slate-800 mt-2"><?php echo $metricas['empleados']; ?></p>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 border-l-4 border-l-purple-500">
                    <p class="text-sm font-medium text-slate-500">Tiempo de Resolución</p>
                    <p class="text-3xl font-bold text-slate-800 mt-2"><?php echo $metricas['tiempo_promedio']; ?></p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200">
                    <h3 class="text-lg font-medium text-slate-800">Actividad Reciente del Sistema</h3>
                </div>
                <div class="p-0">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Usuario / Sistema</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Acción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Tiempo</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            <?php foreach ($actividad_reciente as $actividad): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    <?php echo $actividad['usuario']; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                    <?php echo $actividad['accion']; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                    <?php echo $actividad['tiempo']; ?>
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