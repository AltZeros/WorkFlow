<?php
// Editor de flujo con persistencia en mocks
$mockFlows = __DIR__ . '/../mocks/flows.json';
if (!file_exists($mockFlows)) {
    file_put_contents($mockFlows, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
$flows = json_decode(file_get_contents($mockFlows), true) ?: [];
$flowId = $_GET['id'] ?? null;
$flow = null;
$success = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flowIdPost = trim($_POST['flow_id'] ?? '');
    $name = trim($_POST['flow_name'] ?? '');
    $owner = trim($_POST['flow_owner'] ?? '');
    $desc = trim($_POST['flow_desc'] ?? '');
    $steps = json_decode($_POST['steps'] ?? '[]', true);

    if (!$name) {
        $error = 'El nombre del flujo es obligatorio.';
    } elseif (!is_array($steps) || count($steps) === 0) {
        $error = 'El flujo debe tener al menos una etapa.';
    } else {
        $existingIndex = null;
        foreach ($flows as $index => $f) {
            if ($flowIdPost && ($f['id'] === $flowIdPost)) {
                $existingIndex = $index;
                break;
            }
        }

        if ($existingIndex !== null) {
            $version = isset($flows[$existingIndex]['version']) ? ((int)$flows[$existingIndex]['version'] + 1) : 2;
            $status = $flows[$existingIndex]['status'] ?? 'Activo';
            $flowId = $flowIdPost;
        } else {
            $version = 1;
            $status = 'Activo';
            $flowId = 'FL-' . strtoupper(substr(uniqid(), -6));
        }

        $newFlow = [
            'id' => $flowId,
            'name' => $name,
            'owner' => $owner,
            'version' => $version,
            'status' => $status,
            'description' => $desc,
            'steps' => array_values($steps),
        ];

        if ($existingIndex !== null) {
            $flows[$existingIndex] = $newFlow;
        } else {
            array_unshift($flows, $newFlow);
        }

        if (file_put_contents($mockFlows, json_encode($flows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) === false) {
            $error = 'No se pudo guardar el flujo.';
        } else {
            $success = 'Flujo guardado exitosamente.';
            $flow = $newFlow;
        }
    }
}

if (!$flow && $flowId) {
    foreach ($flows as $f) {
        if ($f['id'] === $flowId) {
            $flow = $f;
            break;
        }
    }
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
                    <button type="button" onclick="saveFlow()" class="px-4 py-2 bg-emerald-600 text-white rounded-md">Guardar</button>
                    <button type="button" onclick="openConfirm('Publicar versión','Publicar nueva versión del flujo', saveFlow)" class="px-4 py-2 bg-blue-600 text-white rounded-md">Publicar</button>
                </div>
            </div>

            <?php if ($success): ?>
                <div class="mb-4 px-4 py-3 rounded-lg bg-emerald-50 text-emerald-800 border border-emerald-200">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="mb-4 px-4 py-3 rounded-lg bg-rose-50 text-rose-800 border border-rose-200">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form id="flow-form" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-1 bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-bold mb-4">Propiedades</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm text-slate-700 mb-1 block">Nombre del Flujo</label>
                            <input id="flow-name" name="flow_name" class="w-full px-3 py-2 border rounded-md" value="<?php echo $flow?htmlspecialchars($flow['name']):''; ?>">
                        </div>
                        <div>
                            <label class="text-sm text-slate-700 mb-1 block">Departamento Responsable</label>
                            <input id="flow-owner" name="flow_owner" class="w-full px-3 py-2 border rounded-md" value="<?php echo $flow?htmlspecialchars($flow['owner']):''; ?>">
                        </div>
                        <div>
                            <label class="text-sm text-slate-700 mb-1 block">Descripción</label>
                            <textarea id="flow-desc" name="flow_desc" class="w-full px-3 py-2 border rounded-md" rows="3"><?php echo $flow?htmlspecialchars($flow['description'] ?? ''):''; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-bold mb-4">Etapas y Reglas</h3>
                    <div id="stages" class="space-y-4"></div>
                    <div class="mt-4">
                        <button type="button" onclick="addStage()" class="px-4 py-2 bg-slate-100 rounded-md">Añadir Etapa</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="flow_id" value="<?php echo htmlspecialchars($flow['id'] ?? ''); ?>">
            <textarea id="flow-steps" name="steps" class="hidden"><?php echo htmlspecialchars(json_encode($flow['steps'] ?? [['name' => '', 'type' => 'Manual', 'approver' => '']], JSON_UNESCAPED_UNICODE)); ?></textarea>
        </form>

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
    let currentApproverStage = null;

    function createStageElement(stage, index) {
        const wrapper = document.createElement('div');
        wrapper.className = 'bg-slate-50 p-4 rounded-md border border-slate-200';
        wrapper.dataset.stageIndex = index;
        wrapper.innerHTML = `
            <div class="flex items-start gap-4">
                <div class="h-10 w-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold">${index + 1}</div>
                <div class="flex-1 space-y-3">
                    <div>
                        <label class="text-sm text-slate-600">Nombre de la etapa</label>
                        <input name="stage_name_${index}" class="w-full px-3 py-2 border rounded-md" value="${stage.name || ''}" placeholder="Nombre de la etapa" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label class="text-sm text-slate-600">Tipo</label>
                            <select name="stage_type_${index}" class="w-full px-3 py-2 border rounded-md">
                                <option ${stage.type === 'Automática' ? 'selected' : ''}>Automática</option>
                                <option ${stage.type === 'Manual' ? 'selected' : ''}>Manual</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm text-slate-600">Aprobador</label>
                            <div class="flex gap-2">
                                <input name="stage_approver_${index}" class="w-full px-3 py-2 border rounded-md" value="${stage.approver || ''}" placeholder="Aprobador" />
                                <button type="button" onclick="openApproverModal(this)" class="px-3 py-2 bg-slate-100 rounded-md">Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2 justify-between">
                    <button type="button" onclick="removeStage(this)" class="px-3 py-2 bg-rose-100 text-rose-700 rounded-md">Eliminar</button>
                </div>
            </div>
        `;
        return wrapper;
    }

    function renderStages() {
        const container = document.getElementById('stages');
        container.innerHTML = '';
        const steps = JSON.parse(document.getElementById('flow-steps').value || '[]');
        if (steps.length === 0) {
            addStage();
            return;
        }
        steps.forEach((step, index) => container.appendChild(createStageElement(step, index)));
    }

    function addStage(stage = {name: '', type: 'Manual', approver: ''}) {
        const container = document.getElementById('stages');
        const index = container.children.length;
        container.appendChild(createStageElement(stage, index));
    }

    function removeStage(button) {
        const stageElement = button.closest('[data-stage-index]');
        if (!stageElement) return;
        stageElement.remove();
        document.querySelectorAll('#stages [data-stage-index]').forEach((element, idx) => {
            element.dataset.stageIndex = idx;
            element.querySelector('.h-10').textContent = idx + 1;
            element.querySelector(`input[name^='stage_name_']`).name = `stage_name_${idx}`;
            element.querySelector(`select[name^='stage_type_']`).name = `stage_type_${idx}`;
            element.querySelector(`input[name^='stage_approver_']`).name = `stage_approver_${idx}`;
            const button = element.querySelector('button[onclick^="openApproverModal"]');
            if (button) {
                button.setAttribute('onclick', 'openApproverModal(this)');
            }
        });
    }

    function openApproverModal(button) {
        const stageElement = button.closest('[data-stage-index]');
        currentApproverStage = stageElement ? Number(stageElement.dataset.stageIndex) : null;
        document.getElementById('approver-search').value = '';
        document.getElementById('modal-approver').classList.remove('hidden');
    }

    function closeApproverModal() {
        document.getElementById('modal-approver').classList.add('hidden');
    }

    function assignApprover() {
        const query = document.getElementById('approver-search').value.trim() || 'Usuario simulado';
        if (currentApproverStage === null) return;
        const stageElement = document.querySelector(`#stages [data-stage-index='${currentApproverStage}']`);
        if (stageElement) {
            const approverInput = stageElement.querySelector(`input[name='stage_approver_${currentApproverStage}']`);
            if (approverInput) {
                approverInput.value = query;
            }
        }
        closeApproverModal();
        showToast('Aprobador asignado.');
    }

    function saveFlow() {
        const stageElements = Array.from(document.querySelectorAll('#stages [data-stage-index]'));
        const steps = stageElements.map((element, index) => ({
            name: element.querySelector(`input[name='stage_name_${index}']`).value.trim(),
            type: element.querySelector(`select[name='stage_type_${index}']`).value,
            approver: element.querySelector(`input[name='stage_approver_${index}']`).value.trim(),
        })).filter(step => step.name.length > 0);

        if (steps.length === 0) {
            alert('Agrega al menos una etapa con nombre antes de guardar.');
            return;
        }

        document.getElementById('flow-steps').value = JSON.stringify(steps);
        document.getElementById('flow-form').submit();
    }

    window.addEventListener('load', renderStages);
    </script>

</body>
</html>
