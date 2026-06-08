<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte Interno | WorkFlow</title>
    <link rel="stylesheet" href="../assets/css/tailwind.css">
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            
            <div class="max-w-3xl mx-auto">
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-slate-900">Centro de Soporte Técnico</h1>
                    <p class="text-slate-600">¿Tienes problemas con un flujo o el sistema? Genera un ticket interno.</p>
                </div>

                <form class="bg-white p-8 rounded-xl border border-slate-200 shadow-sm space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Asunto del Ticket</label>
                        <input type="text" placeholder="Ej. Error al subir documento adjunto" class="w-full px-4 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Categoría del Problema</label>
                        <select class="w-full px-4 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option>Problema Técnico / Bug</option>
                            <option>Duda sobre uso del sistema</option>
                            <option>Solicitud de nuevos permisos</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Descripción detallada</label>
                        <textarea rows="5" placeholder="Describe exactamente qué estabas haciendo cuando ocurrió el problema..." class="w-full px-4 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex justify-end">
                        <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-md transition shadow-sm">
                            Enviar Ticket de Soporte
                        </button>
                    </div>
                </form>
            </div>

        </main>
    </div>

</body>
</html>