<?php
// Mock Data: Simulando la tabla auditoria_logs
$logs = [
    ['fecha' => '2026-06-02 10:05:12', 'ip' => '192.168.1.45', 'usuario' => 'Admin_ACME', 'accion' => 'CAMBIO_ETAPA', 'detalles' => 'Aprobó trámite TR-1050. Transición a: Registro en Nómina.', 'color' => 'bg-blue-100 text-blue-700'],
    ['fecha' => '2026-06-02 09:30:00', 'ip' => '10.0.0.8', 'usuario' => 'Carlos Ruiz', 'accion' => 'INICIO_FLUJO', 'detalles' => 'Inició instancia de flujo ID: Solicitud de Vacaciones.', 'color' => 'bg-emerald-100 text-emerald-700'],
    ['fecha' => '2026-06-01 16:40:20', 'ip' => '192.168.1.45', 'usuario' => 'Admin_ACME', 'accion' => 'MODIFICACION_FLUJO', 'detalles' => 'Modificó parámetros del flujo ID 6. Nueva versión: 2. Estado: Inactivo.', 'color' => 'bg-amber-100 text-amber-700'],
    ['fecha' => '2026-06-01 15:12:11', 'ip' => '203.0.113.42', 'usuario' => 'Super_Admin_SaaS', 'accion' => 'ACCESO_SISTEMA', 'detalles' => 'Autenticación exitosa mediante bypass técnico de mantenimiento.', 'color' => 'bg-purple-100 text-purple-700'],
    ['fecha' => '2026-06-01 14:05:00', 'ip' => '10.0.0.22', 'usuario' => 'Ana López', 'accion' => 'INICIO_FLUJO', 'detalles' => 'Inició instancia de flujo ID: Revisión de Viáticos.', 'color' => 'bg-emerald-100 text-emerald-700'],
    ['fecha' => '2026-05-31 08:15:33', 'ip' => '192.168.1.102', 'usuario' => 'Sistema (Auto)', 'accion' => 'ALERTA_SEGURIDAD', 'detalles' => 'Intento fallido de acceso (Contraseña incorrecta).', 'color' => 'bg-red-100 text-red-700'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Auditoría | WorkFlow</title>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900 flex items-center gap-2">
                        <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        Registro de Auditoría (Logs)
                    </h1>
                    <p class="text-slate-600 mt-1">Trazabilidad inmutable de todos los eventos del sistema.</p>
                </div>
                
                <button class="bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 px-4 py-2 rounded-md text-sm font-medium transition shadow-sm flex items-center gap-2">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Exportar a CSV
                </button>
            </div>

            <div class="bg-white p-4 rounded-t-xl border border-slate-200 border-b-0 flex gap-4 items-center">
                <input type="date" class="px-3 py-1.5 border border-slate-300 rounded-md text-sm text-slate-600 focus:ring-blue-500 focus:border-blue-500">
                <select class="px-3 py-1.5 border border-slate-300 rounded-md text-sm text-slate-600 focus:ring-blue-500 focus:border-blue-500">
                    <option>Todas las acciones</option>
                    <option>INICIO_FLUJO</option>
                    <option>CAMBIO_ETAPA</option>
                </select>
                <div class="relative flex-1">
                    <input type="text" placeholder="Buscar por IP, Usuario o Detalle..." class="w-full pl-9 pr-3 py-1.5 border border-slate-300 rounded-md text-sm text-slate-600 focus:ring-blue-500 focus:border-blue-500">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <div class="bg-white rounded-b-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-900">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Fecha / Hora</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Dirección IP</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Usuario</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Tipo de Acción</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Detalles del Evento</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200 font-mono text-sm"> <?php foreach ($logs as $log): ?>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 whitespace-nowrap text-slate-500 text-xs">
                                    <?php echo $log['fecha']; ?>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-slate-900 text-xs">
                                    <?php echo $log['ip']; ?>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-slate-700 text-xs font-sans font-medium">
                                    <?php echo $log['usuario']; ?>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="px-2 py-0.5 inline-flex text-[10px] leading-4 font-bold rounded-sm font-sans <?php echo $log['color']; ?>">
                                        <?php echo $log['accion']; ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-slate-600 text-xs truncate max-w-md font-sans" title="<?php echo $log['detalles']; ?>">
                                    <?php echo $log['detalles']; ?>
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