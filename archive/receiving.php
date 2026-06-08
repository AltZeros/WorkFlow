<?php
// Cargar POs desde mocks si existen
$mockFile = __DIR__ . '/../mocks/pos.json';
if(file_exists($mockFile)){
    $pos = json_decode(file_get_contents($mockFile), true);
} else {
    $pos = [
        ['po'=>'PO-1001','supplier'=>'Distribuciones SA','lines'=>3,'eta'=>'Hoy'],
        ['po'=>'PO-1002','supplier'=>'PaperCo','lines'=>1,'eta'=>'Mañana'],
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepciones | WorkFlow</title>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Recepciones</h1>
                    <p class="text-slate-600">Registrar llegada de mercancía y crear tareas de put-away.</p>
                </div>
                <div>
                    <button onclick="openScanModal()" class="px-4 py-2 bg-blue-600 text-white rounded-md">Escanear pallet</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                        <h3 class="font-bold mb-4">Recepciones Pendientes</h3>
                        <?php
                            $columns = ['po'=>'Referencia','supplier'=>'Proveedor','eta'=>'ETA'];
                            $rows = $pos;
                            $rowsPerPage = 6;
                            include __DIR__ . '/../components/simple_table.php';
                        ?>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <h3 class="font-bold mb-4">Registrar Recepción Manual</h3>
                    <form onsubmit="event.preventDefault(); showToast('Recepción creada (simulado)')" class="space-y-4">
                        <div>
                            <label class="block text-sm text-slate-700 mb-1">Proveedor</label>
                            <input class="w-full px-3 py-2 border rounded-md" />
                        </div>
                        <div>
                            <label class="block text-sm text-slate-700 mb-1">Referencia</label>
                            <input class="w-full px-3 py-2 border rounded-md" />
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Crear Recepción</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <?php include '../components/modal_scan.php'; ?>
    <?php include '../components/modal_confirm.php'; ?>
    <?php include '../components/toasts.php'; ?>

</body>
</html>
