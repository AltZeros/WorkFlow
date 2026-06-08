<?php
$org = ['name'=>'ACME S.A.','subdomain'=>'acme','timezone'=>'America/Caracas','locale'=>'es-VE'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organización | WorkFlow</title>
    <link rel="stylesheet" href="../assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">
    <?php include '../components/app_sidebar.php'; ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?php include '../components/app_navbar.php'; ?>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Organización</h1>
                    <p class="text-slate-600">Configuración del tenant y parámetros SaaS.</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 max-w-2xl">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-slate-700 mb-1">Nombre de la organización</label>
                        <input class="w-full px-3 py-2 border rounded-md" value="<?php echo $org['name']; ?>">
                    </div>
                    <div>
                        <label class="block text-sm text-slate-700 mb-1">Subdominio</label>
                        <div class="flex items-center gap-2">
                            <input class="px-3 py-2 border rounded-md" value="<?php echo $org['subdomain']; ?>">
                            <span class="text-sm text-slate-500">.workflow.local</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-slate-700 mb-1">Zona Horaria</label>
                            <input class="w-full px-3 py-2 border rounded-md" value="<?php echo $org['timezone']; ?>">
                        </div>
                        <div>
                            <label class="block text-sm text-slate-700 mb-1">Localización</label>
                            <input class="w-full px-3 py-2 border rounded-md" value="<?php echo $org['locale']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button onclick="showToast('Guardado (simulado)')" class="px-4 py-2 bg-blue-600 text-white rounded-md">Guardar</button>
                </div>
            </div>
        </main>
    </div>

    <?php include '../components/toasts.php'; ?>
</body>
</html>
