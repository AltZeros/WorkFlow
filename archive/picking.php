<?php
// Cargar órdenes desde mocks si existen
$mockFile = __DIR__ . '/../mocks/orders.json';
if(file_exists($mockFile)){
    $orders = json_decode(file_get_contents($mockFile), true);
} else {
    $orders = [
        ['id'=>'PK-9001','customer'=>'Oficina Central','lines'=>4,'status'=>'Asignado'],
        ['id'=>'PK-9002','customer'=>'Sucursal Norte','lines'=>2,'status'=>'Pendiente'],
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picking | WorkFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Bandeja de Picking</h1>
                    <p class="text-slate-600">Órdenes listas para preparar.</p>
                </div>
                <div>
                    <button onclick="openScanModal()" class="px-4 py-2 bg-blue-600 text-white rounded-md">Iniciar Pick (simulado)</button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <?php
                    $columns = ['id'=>'Orden','customer'=>'Cliente','lines'=>'Líneas','status'=>'Estado'];
                    $rows = $orders;
                    $rowsPerPage = 6;
                    include __DIR__ . '/../components/simple_table.php';
                ?>
            </div>
        </main>
    </div>

    <?php include '../components/modal_scan.php'; ?>
    <?php include '../components/modal_confirm.php'; ?>
    <?php include '../components/toasts.php'; ?>

</body>
</html>
