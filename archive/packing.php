<?php
// Cargar shipments desde mocks si existen
$mockFile = __DIR__ . '/../mocks/shipments.json';
if(file_exists($mockFile)){
    $shipments = json_decode(file_get_contents($mockFile), true);
} else {
    $shipments = [
        ['id'=>'SH-5001','status'=>'Listo','packages'=>1,'carrier'=>'Correo Local'],
        ['id'=>'SH-5002','status'=>'En Cola','packages'=>2,'carrier'=>'Transportes S.A.'],
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packing | WorkFlow</title>
    <link rel="stylesheet" href="../assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Packing y Envíos</h1>
                    <p class="text-slate-600">Crear paquetes y preparar envíos.</p>
                </div>
                <div>
                    <button onclick="showToast('Generando etiqueta (simulado)')" class="px-4 py-2 bg-blue-600 text-white rounded-md">Generar Etiqueta</button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <?php
                    $columns = ['id'=>'Envío','carrier'=>'Transportista','packages'=>'Paquetes','status'=>'Estado'];
                    $rows = $shipments;
                    $rowsPerPage = 6;
                    include __DIR__ . '/../components/simple_table.php';
                ?>
            </div>
        </main>
    </div>

    <?php include '../components/modal_confirm.php'; ?>
    <?php include '../components/toasts.php'; ?>

</body>
</html>
