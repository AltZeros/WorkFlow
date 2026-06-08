<?php
// Mock Data: Información específica del trámite que estamos evaluando
$tramite = [
    'id' => 'TR-1050',
    'solicitante' => 'Carlos Ruiz',
    'departamento' => 'Operaciones',
    'fecha' => '31 May 2026',
    'flujo' => 'Solicitud de Vacaciones',
    'justificacion' => 'Solicito 5 días de vacaciones correspondientes al periodo 2025, a tomar desde el 15 de Junio hasta el 20 de Junio, por motivos de viaje familiar.'
];

// Mock Data: La línea de tiempo para la columna derecha
$timeline = [
    ['etapa' => 'Creación de Solicitud', 'usuario' => 'Carlos Ruiz', 'fecha' => '31 May, 09:00 AM', 'estado' => 'Completado', 'color' => 'bg-blue-500'],
    ['etapa' => 'Validación de Días Disponibles', 'usuario' => 'Sistema (Auto)', 'fecha' => '31 May, 09:05 AM', 'estado' => 'Completado', 'color' => 'bg-emerald-500', 'nota' => 'El empleado cuenta con 12 días disponibles.'],
    ['etapa' => 'Aprobación de Jefe Directo', 'usuario' => 'Pendiente (Tú)', 'fecha' => 'En espera', 'estado' => 'Actual', 'color' => 'bg-amber-500'],
    ['etapa' => 'Registro en Nómina', 'usuario' => 'Dpto. Finanzas', 'fecha' => '-', 'estado' => 'Bloqueado', 'color' => 'bg-slate-300'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluar Trámite | WorkFlow</title>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            
            <div class="mb-6">
                <a href="pending_tasks.php" class="text-sm font-medium text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-2 transition">
                    &larr; Volver a la bandeja
                </a>
                <h1 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                    Evaluar Trámite #<?php echo $tramite['id']; ?>
                    <span class="bg-amber-100 text-amber-700 py-1 px-3 rounded-full text-sm font-bold border border-amber-200">
                        Requiere tu acción
                    </span>
                </h1>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 space-y-6">
                    
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="border-b border-slate-200 bg-slate-50 px-6 py-4">
                            <h3 class="text-lg font-bold text-slate-800"><?php echo $tramite['flujo']; ?></h3>
                            <p class="text-sm text-slate-500">Iniciado el <?php echo $tramite['fecha']; ?></p>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-2 gap-6 mb-6 border-b border-slate-100 pb-6">
                                <div>
                                    <p class="text-sm font-medium text-slate-500 mb-1">Solicitante</p>
                                    <div class="flex items-center gap-2">
                                        <div class="h-8 w-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-700 font-bold text-sm">
                                            C
                                        </div>
                                        <p class="font-medium text-slate-900"><?php echo $tramite['solicitante']; ?></p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-slate-500 mb-1">Departamento</p>
                                    <p class="font-medium text-slate-900"><?php echo $tramite['departamento']; ?></p>
                                </div>
                            </div>
                            
                            <div>
                                <p class="text-sm font-medium text-slate-500 mb-2">Justificación / Detalles proporcionados</p>
                                <div class="bg-slate-50 p-4 rounded-lg border border-slate-200 text-slate-700 text-sm leading-relaxed">
                                    "<?php echo $tramite['justificacion']; ?>"
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 border-t-4 border-t-blue-500">
                        <h3 class="text-lg font-bold text-slate-800 mb-4">Tu Resolución</h3>
                        
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Comentarios (Obligatorio para rechazos)
                            </label>
                            <textarea rows="3" placeholder="Añade una nota explicativa sobre tu decisión..." class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition"></textarea>
                        </div>

                        <div class="flex gap-4">
                            <a href="pending_tasks.php" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold transition transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Aprobar Trámite
                            </a>
                            <a href="pending_tasks.php" class="flex-1 bg-rose-600 hover:bg-rose-700 text-white flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold transition transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                Rechazar / Devolver
                            </a>
                        </div>
                    </div>

                </div>

                <div class="lg:col-span-1 bg-white rounded-xl shadow-sm border border-slate-200 p-6 h-fit">
                    <h3 class="text-lg font-bold text-slate-800 mb-6 border-b pb-2">Historial del Flujo</h3>
                    
                    <div class="relative border-l-2 border-slate-200 ml-3 space-y-8">
                        <?php foreach ($timeline as $index => $paso): ?>
                            <div class="relative pl-6">
                                <div class="absolute -left-[9px] top-1 h-4 w-4 rounded-full border-2 border-white <?php echo $paso['color']; ?>"></div>
                                
                                <div>
                                    <p class="font-bold text-sm <?php echo ($paso['estado'] == 'Actual') ? 'text-blue-600' : 'text-slate-800'; ?>">
                                        <?php echo $paso['etapa']; ?>
                                    </p>
                                    <p class="text-xs text-slate-500 font-medium mt-0.5"><?php echo $paso['usuario']; ?> &bull; <?php echo $paso['fecha']; ?></p>
                                    
                                    <?php if(isset($paso['nota'])): ?>
                                        <div class="mt-2 bg-slate-50 text-slate-600 text-xs p-2 rounded border border-slate-200">
                                            <?php echo $paso['nota']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>