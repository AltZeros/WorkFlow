<?php
// Cargar flujos desde mocks
$mockFile = __DIR__ . '/../mocks/flows.json';
$flows = file_exists($mockFile) ? json_decode(file_get_contents($mockFile), true) : [];
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

    <?php include '../components/app_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden">
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Gestor de Flujos</h1>
                    <p class="text-slate-600">Lista de plantillas de flujo activas y versiones disponibles.</p>
                </div>
                <a href="flow_editor.php" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md font-medium transition shadow-sm">Nuevo Flujo</a>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Dueño</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Versión</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            <?php if(count($flows) === 0): ?>
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-slate-500">No hay flujos configurados. Crea uno nuevo para comenzar.</td>
                                </tr>
                            <?php endif; ?>
                            <?php foreach($flows as $flow): ?>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 text-sm font-medium text-slate-900"><?php echo htmlspecialchars($flow['id']); ?></td>
                                <td class="px-6 py-4 text-sm text-slate-700"><?php echo htmlspecialchars($flow['name']); ?></td>
                                <td class="px-6 py-4 text-sm text-slate-600"><?php echo htmlspecialchars($flow['owner']); ?></td>
                                <td class="px-6 py-4 text-sm text-slate-600"><?php echo htmlspecialchars($flow['version']); ?></td>
                                <td class="px-6 py-4 text-sm text-slate-600"><?php echo htmlspecialchars($flow['status']); ?></td>
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <a href="flow_editor.php?id=<?php echo urlencode($flow['id']); ?>" class="text-blue-600 hover:text-blue-900">Editar</a>
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