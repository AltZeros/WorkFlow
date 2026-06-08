<?php
// Preferir mocks JSON si existen (prototipo sin backend)
$mockFile = __DIR__ . '/../mocks/items.json';
if(file_exists($mockFile)){
    $items = json_decode(file_get_contents($mockFile), true);
} else {
    $items = [
        ['sku'=>'SKU-001','name'=>'Cinta Adhesiva 48mm','qty'=>120,'location'=>'A1-01'],
        ['sku'=>'SKU-002','name'=>'Caja Cartón Mediana','qty'=>45,'location'=>'B2-05'],
        ['sku'=>'SKU-003','name'=>'Papel Térmico 80mm','qty'=>8,'location'=>'C3-02'],
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario | WorkFlow</title>
    <link rel="stylesheet" href="../assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Inventario</h1>
                    <p class="text-slate-600">Listado de artículos y stock disponible.</p>
                </div>
                <div class="flex gap-2">
                    <button onclick="openScanModal()" class="px-4 py-2 bg-blue-600 text-white rounded-md">Escanear</button>
                    <button onclick="showToast('Exportando CSV (simulado)')" class="px-4 py-2 bg-slate-100 rounded-md">Exportar</button>
                </div>
            </div>

            <?php
                $columns = ['sku'=>'SKU','name'=>'Nombre','qty'=>'Cantidad','location'=>'Ubicación'];
                $rowsPerPage = 8;
                $rows = $items;
                include __DIR__ . '/../components/simple_table.php';
            ?>
        </main>
    </div>

    <?php include '../components/modal_scan.php'; ?>
    <?php include '../components/modal_confirm.php'; ?>
    <?php include '../components/toasts.php'; ?>

</body>
</html>
