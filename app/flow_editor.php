<?php
// Editor de flujo (scaffold) — utiliza mocks si existen
$flowId = $_GET['id'] ?? null;
$mockFlows = __DIR__ . '/../mocks/flows.json';
$flows = file_exists($mockFlows) ? json_decode(file_get_contents($mockFlows), true) : [];
$flow = null;
if($flowId){
    foreach($flows as $f) if($f['id']==$flowId) $flow = $f;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Flujo | WorkFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden font-sans antialiased">

    <?php include '../components/app_sidebar.php'; ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?php include '../components/app_navbar.php'; ?>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900"><?php echo $flow ? 'Editar: '.$flow['name'] : 'Nuevo Flujo'; ?></h1>
                    <p class="text-slate-600">Define etapas, aprobadores y condiciones.</p>
                </div>
                <div class="flex gap-2">
                    <button onclick="saveFlow()" class="px-4 py-2 bg-emerald-600 text-white rounded-md">Guardar</button>
                    <button onclick="openConfirm('Publicar versión','Publicar nueva versión del flujo', ()=>showToast('Flujo publicado (simulado)'))" class="px-4 py-2 bg-blue-600 text-white rounded-md">Publicar</button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-1 bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-bold mb-4">Propiedades</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm text-slate-700 mb-1 block">Nombre del Flujo</label>
                            <input id="flow-name" class="w-full px-3 py-2 border rounded-md" value="<?php echo $flow?htmlspecialchars($flow['name']):''; ?>">
                        </div>
                        <div>
                            <label class="text-sm text-slate-700 mb-1 block">Departamento Responsable</label>
                            <input id="flow-owner" class="w-full px-3 py-2 border rounded-md" value="<?php echo $flow?htmlspecialchars($flow['owner']):''; ?>">
                        </div>
                        <div>
                            <label class="text-sm text-slate-700 mb-1 block">Descripción</label>
                            <textarea id="flow-desc" class="w-full px-3 py-2 border rounded-md" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-bold mb-4">Etapas y Reglas</h3>
                    <div id="stages" class="space-y-4">
                        <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-md border border-slate-200">
                            <div class="h-10 w-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold">1</div>
                            <div class="flex-1">
                                <input class="w-full px-3 py-2 border rounded-md" placeholder="Nombre de la etapa (p. ej. Validación)" />
                                <div class="text-sm text-slate-500 mt-1">Tipo: <select class="ml-2"><option>Automática</option><option>Manual</option></select></div>
                            </div>
                            <div>
                                <button onclick="openApproverModal()" class="px-3 py-1 bg-slate-100 rounded-md">Asignar aprobador</button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button onclick="addStage()" class="px-4 py-2 bg-slate-100 rounded-md">Añadir Etapa</button>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <?php include '../components/modal_confirm.php'; ?>
    <?php include '../components/modal_scan.php'; ?>
    <?php include '../components/toasts.php'; ?>

    <div id="modal-approver" class="hidden fixed inset-0 bg-slate-900 bg-opacity-50 z-50 flex justify-center items-center">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
            <h3 class="text-lg font-bold mb-4">Asignar Aprobador</h3>
            <div>
                <label class="block text-sm text-slate-700 mb-1">Buscar usuario</label>
                <input id="approver-search" class="w-full px-3 py-2 border rounded-md" placeholder="Nombre o email...">
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button onclick="closeApproverModal()" class="px-4 py-2 bg-white border rounded-md">Cancelar</button>
                <button onclick="assignApprover()" class="px-4 py-2 bg-blue-600 text-white rounded-md">Asignar</button>
            </div>
        </div>
    </div>

    <script>
    function addStage(){
        const container = document.getElementById('stages');
        const idx = container.children.length + 1;
        const el = document.createElement('div');
        el.className = 'flex items-center gap-4 bg-slate-50 p-4 rounded-md border border-slate-200';
        el.innerHTML = `<div class="h-10 w-10 bg-slate-100 text-slate-700 rounded-full flex items-center justify-center font-bold">${idx}</div><div class="flex-1"><input class="w-full px-3 py-2 border rounded-md" placeholder="Nombre de la etapa" /></div><div><button onclick="openApproverModal()" class="px-3 py-1 bg-slate-100 rounded-md">Asignar aprobador</button></div>`;
        container.appendChild(el);
    }
    function openApproverModal(){ document.getElementById('modal-approver').classList.remove('hidden'); }
    function closeApproverModal(){ document.getElementById('modal-approver').classList.add('hidden'); }
    function assignApprover(){ closeApproverModal(); showToast('Aprobador asignado (simulado)'); }
    function saveFlow(){ showToast('Flujo guardado (simulado)'); }
    </script>

</body>
</html>
