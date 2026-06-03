<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Trámite | WorkFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">
    <?php include '../components/app_sidebar.php'; ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?php include '../components/app_navbar.php'; ?>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            <div class="mb-6">
                <a href="my_procedures.php" class="text-sm font-medium text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-2 transition">&larr; Volver a Mis Solicitudes</a>
                <h1 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                    Solicitud #TR-1045
                    <span class="bg-amber-100 text-amber-700 py-1 px-3 rounded-full text-sm font-bold border border-amber-200">En Revisión</span>
                </h1>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="border-b border-slate-200 bg-slate-50 px-6 py-4">
                            <h3 class="text-lg font-bold text-slate-800">Revisión de Viáticos</h3>
                            <p class="text-sm text-slate-500">Iniciado el 01 Jun 2026</p>
                        </div>
                        <div class="p-6">
                            <p class="text-sm font-medium text-slate-500 mb-2">Justificación enviada:</p>
                            <div class="bg-slate-50 p-4 rounded-lg border border-slate-200 text-slate-700 text-sm leading-relaxed mb-6">
                                "Solicitud de reembolso por gastos de transporte y alojamiento durante la conferencia anual de tecnología."
                            </div>
                            <div class="flex items-center gap-4 border-t border-slate-100 pt-4">
                                <span class="text-sm font-medium text-slate-700">Documento Adjunto:</span>
                                <a href="#" class="text-blue-600 text-sm flex items-center gap-1 hover:underline">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                    factura_hotel.pdf
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-1 bg-white rounded-xl shadow-sm border border-slate-200 p-6 h-fit">
                    <h3 class="text-lg font-bold text-slate-800 mb-6 border-b pb-2">Estado Actual</h3>
                    <div class="relative border-l-2 border-slate-200 ml-3 space-y-8">
                        <div class="relative pl-6">
                            <div class="absolute -left-[9px] top-1 h-4 w-4 rounded-full border-2 border-white bg-emerald-500"></div>
                            <div>
                                <p class="font-bold text-sm text-slate-800">Creación de Solicitud</p>
                                <p class="text-xs text-slate-500">Completado</p>
                            </div>
                        </div>
                        <div class="relative pl-6">
                            <div class="absolute -left-[9px] top-1 h-4 w-4 rounded-full border-2 border-white bg-amber-500 animate-pulse"></div>
                            <div>
                                <p class="font-bold text-sm text-blue-600">Validación de Gastos</p>
                                <p class="text-xs text-slate-500 mt-1">Esperando revisión de: Dpto. Finanzas</p>
                            </div>
                        </div>
                        <div class="relative pl-6 opacity-50">
                            <div class="absolute -left-[9px] top-1 h-4 w-4 rounded-full border-2 border-white bg-slate-300"></div>
                            <div>
                                <p class="font-bold text-sm text-slate-600">Desembolso a Nómina</p>
                                <p class="text-xs text-slate-500">Bloqueado</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>