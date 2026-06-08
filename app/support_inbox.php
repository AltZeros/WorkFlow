<?php
// Mock Data: Tickets generados por esta empresa
$mis_tickets = [
    ['id' => 'TKT-8492', 'asunto' => 'Error al subir documento adjunto en viáticos', 'fecha' => '02 Jun 2026', 'estado' => 'Respondido', 'color' => 'bg-emerald-100 text-emerald-700', 'dot' => 'bg-emerald-500'],
    ['id' => 'TKT-8501', 'asunto' => 'Duda sobre configuración de nuevo flujo', 'fecha' => '01 Jun 2026', 'estado' => 'Abierto', 'color' => 'bg-amber-100 text-amber-700', 'dot' => 'bg-amber-500'],
    ['id' => 'TKT-8210', 'asunto' => 'Solicitud de aumento de límite de usuarios', 'fecha' => '15 May 2026', 'estado' => 'Cerrado', 'color' => 'bg-slate-100 text-slate-700', 'dot' => 'bg-slate-400'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tickets | WorkFlow</title>
    <link rel="stylesheet" href="../assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6 md:p-8">
            
            <div class="max-w-5xl mx-auto">
                <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900">Mis Tickets de Soporte</h1>
                        <p class="text-slate-600">Historial y respuestas del equipo de Nexus.</p>
                    </div>
                    <a href="contact_support.php" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-md font-medium transition shadow-sm flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Nuevo Ticket
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Ticket</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Asunto</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-4 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-200">
                                <?php foreach ($mis_tickets as $ticket): ?>
                                <tr class="hover:bg-slate-50 transition cursor-pointer" onclick="openTicketModal()">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-blue-600">
                                        #<?php echo $ticket['id']; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                        <?php echo $ticket['asunto']; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                        <?php echo $ticket['fecha']; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="flex items-center gap-1.5 text-xs font-bold px-2.5 py-1 rounded-full w-max <?php echo $ticket['color']; ?>">
                                            <span class="w-1.5 h-1.5 rounded-full <?php echo $ticket['dot']; ?>"></span>
                                            <?php echo $ticket['estado']; ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-slate-400 hover:text-blue-600 transition">Ver Respuesta</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <div id="modal-leer-ticket" class="hidden fixed inset-0 bg-slate-900/60 z-50 flex justify-center items-center backdrop-blur-sm transition-opacity px-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
            <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center bg-slate-50">
                <h3 class="text-lg font-bold text-slate-900">Ticket #TKT-8492</h3>
                <button onclick="closeTicketModal()" class="text-slate-400 hover:text-slate-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <div class="p-6 overflow-y-auto space-y-6">
                <div class="flex gap-4">
                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold shrink-0">Tú</div>
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl rounded-tl-none p-4 text-sm text-slate-700">
                        <p class="font-bold text-slate-900 mb-1">Error al subir documento adjunto en viáticos</p>
                        <p>Hola, al intentar adjuntar el PDF de la factura en el paso 2, el sistema se queda cargando y no avanza. ¿Podrían revisar?</p>
                        <span class="text-xs text-slate-400 mt-2 block">02 Jun 2026, 09:15 AM</span>
                    </div>
                </div>

                <div class="flex gap-4 flex-row-reverse">
                    <div class="h-10 w-10 rounded-full bg-emerald-600 flex items-center justify-center text-white font-bold shrink-0">NX</div>
                    <div class="bg-emerald-50 border border-emerald-100 rounded-2xl rounded-tr-none p-4 text-sm text-slate-800">
                        <p>¡Hola! Gracias por contactar al soporte de Nexus. Hemos verificado los logs y notamos que el PDF pesaba 12MB, superando el límite actual de 10MB para tu plan. Hemos aplicado un parche temporal para que puedas subirlo, pero te recomendamos comprimir futuros archivos. ¡Saludos!</p>
                        <span class="text-xs text-emerald-600 mt-2 block">02 Jun 2026, 11:30 AM</span>
                    </div>
                </div>
            </div>

            <div class="p-4 border-t border-slate-200 bg-slate-50">
                <div class="flex gap-2">
                    <input type="text" placeholder="Escribe una respuesta..." class="flex-1 px-4 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <button onclick="closeTicketModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium text-sm transition">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openTicketModal() { document.getElementById('modal-leer-ticket').classList.remove('hidden'); }
        function closeTicketModal() { document.getElementById('modal-leer-ticket').classList.add('hidden'); }
    </script>
</body>
</html>