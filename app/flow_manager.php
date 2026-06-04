<?php
// Mock Data
$departamentos = ['Recursos Humanos', 'Tecnología', 'Finanzas', 'Operaciones'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Flujos | WorkFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <!-- Incluimos el Sidebar -->
    <?php include '../components/app_sidebar.php'; ?>

    <!-- Contenedor Principal -->
    <div class="flex-1 flex flex-col overflow-hidden">
        
        <!-- Incluimos el Navbar -->
        <?php include '../components/app_navbar.php'; ?>

        <!-- Contenido -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Constructor de Flujos</h1>
                    <p class="text-slate-600">Diseña las reglas y etapas de un nuevo trámite.</p>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md font-medium transition shadow-sm">
                    Guardar Flujo
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <!-- Columna Izquierda: Parámetros del Flujo -->
                <div class="lg:col-span-1 bg-white rounded-xl shadow-sm border border-slate-200 p-6 h-fit">
                    <h3 class="text-lg font-bold text-slate-800 mb-4 border-b pb-2">Configuración General</h3>
                    
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Nombre del Flujo</label>
                            <input type="text" placeholder="Ej. Solicitud de Viáticos" class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Departamento Responsable</label>
                            <select class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-white">
                                <option value="">Selecciona un departamento...</option>
                                <?php foreach($departamentos as $depto): ?>
                                    <option><?php echo $depto; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Descripción</label>
                            <textarea rows="3" placeholder="Instrucciones para este flujo..." class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                        </div>
                    </form>
                </div>

                <!-- Columna Derecha: Etapas Visuales (Mock) -->
                <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-bold text-slate-800 mb-4 border-b pb-2">Secuencia de Aprobación</h3>
                    
                    <div class="space-y-4">
                        
                        <!-- Etapa 1 -->
                        <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-lg border border-slate-200 relative">
                            <div class="h-10 w-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-lg z-10 shadow-sm">1</div>
                            <div class="flex-1">
                                <p class="font-semibold text-slate-800">Validación Automática</p>
                                <p class="text-sm text-slate-500">Verifica si el solicitante cumple con los requisitos iniciales.</p>
                            </div>
                            <button class="text-slate-400 hover:text-red-500 transition">
                                <!-- Icono de basura SVG -->
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                            <!-- Línea conectora -->
                            <div class="absolute left-9 top-14 bottom-[-16px] w-0.5 bg-slate-300"></div>
                        </div>

                        <!-- Etapa 2 -->
                        <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-lg border border-slate-200 relative mt-4">
                            <div class="h-10 w-10 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center font-bold text-lg z-10 shadow-sm">2</div>
                            <div class="flex-1">
                                <p class="font-semibold text-slate-800">Aprobación de Jefe Directo</p>
                                <p class="text-sm text-slate-500">Requiere acción manual del supervisor asignado.</p>
                            </div>
                            <button class="text-slate-400 hover:text-red-500 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>

                        <!-- Botón Simulador de Agregar Etapa -->
                        <button onclick="document.getElementById('modal-etapa').classList.remove('hidden')" class="w-full mt-6 flex items-center justify-center gap-2 py-4 border-2 border-dashed border-slate-300 rounded-lg text-slate-500 hover:text-blue-600 hover:border-blue-400 hover:bg-blue-50 transition font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Añadir nueva etapa
                        </button>

                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

<div id="modal-etapa" class="hidden fixed inset-0 bg-slate-900 bg-opacity-50 z-50 flex justify-center items-center backdrop-blur-sm transition-opacity">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
        <h3 class="text-lg font-bold text-slate-900 mb-4">Añadir Nueva Etapa</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nombre de la Etapa</label>
                <input type="text" placeholder="Ej. Revisión Contable" class="w-full px-3 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tipo de Aprobación</label>
                <select class="w-full px-3 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option>Aprobación Manual (Supervisor)</option>
                    <option>Validación Automática (Sistema)</option>
                </select>
            </div>
        </div>
        <div class="mt-6 flex justify-end gap-3">
            <button onclick="document.getElementById('modal-etapa').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">Cancelar</button>
            <button onclick="document.getElementById('modal-etapa').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Guardar Etapa</button>
        </div>
    </div>
</div>

</html>