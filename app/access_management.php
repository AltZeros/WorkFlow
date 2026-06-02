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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Directorio de Usuarios</h1>
                    <p class="text-slate-600">Gestiona los accesos, roles y departamentos de tu personal.</p>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-md font-medium transition shadow-sm flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    Añadir Usuario
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
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3 transition">Editar</a>
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
</html>