<?php
$plan = ['name'=>'WorkFlow Pro','price'=>'$12/mo','billing_cycle'=>'Mensual','next_due'=>'2026-07-01'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripción | WorkFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">
    <?php include '../components/app_sidebar.php'; ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?php include '../components/app_navbar.php'; ?>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Suscripción</h1>
                    <p class="text-slate-600">Información de billing y facturación para tu tenant.</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 max-w-2xl">
                <h3 class="text-lg font-bold mb-4">Plan Actual</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div><strong>Plan:</strong> <?php echo $plan['name']; ?></div>
                    <div><strong>Precio:</strong> <?php echo $plan['price']; ?></div>
                    <div><strong>Ciclo:</strong> <?php echo $plan['billing_cycle']; ?></div>
                    <div><strong>Siguiente pago:</strong> <?php echo $plan['next_due']; ?></div>
                </div>
                <div class="mt-6 flex gap-3">
                    <button onclick="showToast('Cambiar plan (simulado)')" class="px-4 py-2 bg-blue-600 text-white rounded-md">Cambiar Plan</button>
                    <button onclick="showToast('Ver facturas (simulado)')" class="px-4 py-2 bg-slate-100 rounded-md">Ver Facturas</button>
                </div>
            </div>
        </main>
    </div>

    <?php include '../components/toasts.php'; ?>
</body>
</html>
