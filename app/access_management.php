<?php
// Mock Data: Lista de usuarios de la empresa
$usuarios = [
    ['nombre' => 'Admin ACME', 'email' => 'admin@acme.com', 'rol' => 'Administrador', 'depto' => 'Dirección', 'estado' => 'Activo', 'rol_color' => 'bg-purple-100 text-purple-700'],
    ['nombre' => 'Ana López', 'email' => 'alopez@acme.com', 'rol' => 'Supervisor', 'depto' => 'Finanzas', 'estado' => 'Activo', 'rol_color' => 'bg-blue-100 text-blue-700'],
    ['nombre' => 'Carlos Ruiz', 'email' => 'cruiz@acme.com', 'rol' => 'Solicitante', 'depto' => 'Operaciones', 'estado' => 'Activo', 'rol_color' => 'bg-slate-100 text-slate-700'],
    ['nombre' => 'Miguel Santos', 'email' => 'msantos@acme.com', 'rol' => 'Solicitante', 'depto' => 'Recursos Humanos', 'estado' => 'Suspendido', 'rol_color' => 'bg-slate-100 text-slate-700'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio de Usuarios | WorkFlow</title>
    <link rel="stylesheet" href="../assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Directorio de Usuarios</h1>
                    <p class="text-slate-600">Invita empleados, asigna roles y controla el acceso desde tu tenant.</p>
                </div>
                <button onclick="document.getElementById('modal-usuario').classList.remove('hidden')" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-md font-medium transition shadow-sm flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Invitar Empleado
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Empleado</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Nivel de Acceso (Rol)</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Departamento</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-4 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            
                            <?php foreach ($usuarios as $usuario): ?>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 font-bold mr-4">
                                            <?php echo substr($usuario['nombre'], 0, 1); ?>
                                        </div>
                                        <div>
                                            <div class="text-sm font-bold text-slate-900"><?php echo $usuario['nombre']; ?></div>
                                            <div class="text-xs text-slate-500"><?php echo $usuario['email']; ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full <?php echo $usuario['rol_color']; ?>">
                                        <?php echo $usuario['rol']; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 font-medium">
                                    <?php echo $usuario['depto']; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if($usuario['estado'] == 'Activo'): ?>
                                        <span class="flex items-center gap-1.5 text-sm font-medium text-emerald-600">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            Activo
                                        </span>
                                    <?php else: ?>
                                        <span class="flex items-center gap-1.5 text-sm font-medium text-slate-500">
                                            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                                            Suspendido
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="document.getElementById('modal-editar-usuario').classList.remove('hidden')" class="text-blue-600 hover:text-blue-900 mr-3 transition font-medium">
                                    Editar
                                    </button>
                                    <a href="#" class="text-red-600 hover:text-red-900 transition">Revocar</a>
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

<div id="modal-usuario" class="hidden fixed inset-0 bg-slate-900 bg-opacity-50 z-50 flex justify-center items-center backdrop-blur-sm transition-opacity">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
        <h3 class="text-lg font-bold text-slate-900 mb-4">Invitar Nuevo Empleado</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nombre Completo</label>
                <input type="text" class="w-full px-3 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Correo Electrónico</label>
                <input type="email" class="w-full px-3 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Rol</label>
                    <select class="w-full px-3 py-2 border border-slate-300 rounded-md sm:text-sm">
                        <option>Solicitante</option>
                        <option>Supervisor</option>
                        <option>Administrador</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Departamento</label>
                    <select class="w-full px-3 py-2 border border-slate-300 rounded-md sm:text-sm">
                        <option>Operaciones</option>
                        <option>Finanzas</option>
                        <option>Tecnología</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-6 flex justify-end gap-3">
            <button onclick="document.getElementById('modal-usuario').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-slate-700 border border-slate-300 rounded-md hover:bg-slate-50">Cancelar</button>
            <button onclick="document.getElementById('modal-usuario').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Enviar Invitación</button>
        </div>
    </div>
</div>


<div id="modal-editar-usuario" class="hidden fixed inset-0 bg-slate-900 bg-opacity-50 z-50 flex justify-center items-center backdrop-blur-sm transition-opacity">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-slate-900">Editar Empleado</h3>
            <span class="bg-emerald-100 text-emerald-700 text-xs font-bold px-2 py-1 rounded">Activo</span>
        </div>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nombre Completo</label>
                <input type="text" value="Ana López" class="w-full px-3 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Correo Electrónico</label>
                <input type="email" value="alopez@acme.com" class="w-full px-3 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Rol</label>
                    <select class="w-full px-3 py-2 border border-slate-300 rounded-md sm:text-sm">
                        <option>Solicitante</option>
                        <option selected>Supervisor</option>
                        <option>Administrador</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Departamento</label>
                    <select class="w-full px-3 py-2 border border-slate-300 rounded-md sm:text-sm">
                        <option>Operaciones</option>
                        <option selected>Finanzas</option>
                        <option>Tecnología</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-6 flex justify-between items-center">
            <button class="text-sm font-medium text-red-600 hover:text-red-800 transition">Suspender Cuenta</button>
            <div class="flex gap-3">
                <button onclick="document.getElementById('modal-editar-usuario').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-slate-700 border border-slate-300 rounded-md hover:bg-slate-50">Cancelar</button>
                <button onclick="document.getElementById('modal-editar-usuario').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


</html>