<?php
// Mock Data: Tipos de flujos activos que el empleado puede elegir
$flujos_disponibles = [
    'Solicitud de Vacaciones',
    'Revisión de Viáticos',
    'Adquisición de Equipo',
    'Permiso de Ausencia'
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Solicitud | WorkFlow</title>
    <link rel="stylesheet" href="../assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            
            <div class="max-w-3xl mx-auto">
                <div class="mb-6">
                    <a href="my_procedures.php" class="text-sm font-medium text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-2 transition">
                        &larr; Volver a Mis Solicitudes
                    </a>
                    <h1 class="text-2xl font-bold text-slate-900">Iniciar Nuevo Trámite</h1>
                    <p class="text-slate-600">Completa la información requerida para lanzar el flujo de aprobación.</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 sm:p-8">
                    <form action="my_procedures.php" method="GET" class="space-y-6">
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                1. ¿Qué trámite deseas iniciar?
                            </label>
                            <select required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-700 bg-white shadow-sm transition">
                                <option value="" disabled selected>Selecciona un tipo de solicitud...</option>
                                <?php foreach($flujos_disponibles as $flujo): ?>
                                    <option><?php echo $flujo; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                2. Justificación / Detalles de la solicitud
                            </label>
                            <textarea required rows="4" placeholder="Explica detalladamente los motivos, fechas o montos de tu solicitud..." class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-700 shadow-sm transition"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                3. Documentos adjuntos (Opcional)
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-lg hover:border-blue-400 hover:bg-blue-50 transition cursor-pointer">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-slate-600 justify-center">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Sube un archivo</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">o arrástralo aquí</p>
                                    </div>
                                    <p class="text-xs text-slate-500">
                                        PDF, PNG, JPG hasta 10MB
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
                            <a href="my_procedures.php" class="bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 px-6 py-2.5 rounded-lg font-medium transition shadow-sm">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg font-bold shadow-sm transition flex items-center gap-2">
                                Lanzar Solicitud
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </main>
    </div>

</body>
</html>