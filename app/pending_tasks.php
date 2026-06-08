<?php
// Mock Data: Trámites esperando la acción de este supervisor
$tramites_pendientes = [
    [
        'id' => 'TR-1050', 
        'empleado' => 'Carlos Ruiz', 
        'flujo' => 'Solicitud de Vacaciones', 
        'etapa_actual' => 'Aprobación de Jefe Directo', 
        'tiempo_espera' => '2 días',
        'urgencia' => 'text-red-600 bg-red-50' // Resaltamos si lleva mucho tiempo
    ],
    [
        'id' => 'TR-1052', 
        'empleado' => 'Ana López', 
        'flujo' => 'Revisión de Viáticos', 
        'etapa_actual' => 'Validación de Gastos', 
        'tiempo_espera' => '5 horas',
        'urgencia' => 'text-slate-600'
    ],
    [
        'id' => 'TR-1055', 
        'empleado' => 'Miguel Santos', 
        'flujo' => 'Adquisición de Equipo', 
        'etapa_actual' => 'Visto Bueno de Presupuesto', 
        'tiempo_espera' => '10 min',
        'urgencia' => 'text-slate-600'
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandeja de Pendientes | WorkFlow</title>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                        Bandeja de Pendientes
                        <span class="bg-blue-100 text-blue-700 py-1 px-3 rounded-full text-sm font-bold">
                            <?php echo count($tramites_pendientes); ?> tareas
                        </span>
                    </h1>
                    <p class="text-slate-600 mt-1">Trámites que requieren tu revisión y aprobación.</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Trámite</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Solicitante</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Etapa Requerida</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Tiempo en Espera</th>
                                <th class="px-6 py-4 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            
                            <?php foreach ($tramites_pendientes as $tramite): ?>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-slate-900">#<?php echo $tramite['id']; ?></div>
                                    <div class="text-xs text-slate-500"><?php echo $tramite['flujo']; ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 font-bold text-xs mr-3">
                                            <?php echo substr($tramite['empleado'], 0, 1); ?>
                                        </div>
                                        <span class="text-sm font-medium text-slate-900"><?php echo $tramite['empleado']; ?></span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-amber-600">
                                    <span class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                        <?php echo $tramite['etapa_actual']; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-md <?php echo $tramite['urgencia']; ?>">
                                        <?php echo $tramite['tiempo_espera']; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="assessment.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 transition">
                                        Evaluar Trámite
                                    </a>
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