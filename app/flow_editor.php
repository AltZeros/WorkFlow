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
    $createdSubflows = json_decode($_POST['created_subflows'] ?? '[]', true) ?: [];

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

        $normalizedSteps = normalizeSteps($steps);
        foreach ($normalizedSteps as $stepIndex => $stepData) {
            if ($stepData['type'] === 'Subflujo' && empty($stepData['linked_flow_id'])) {
                $error = 'La etapa '.($stepIndex + 1).' está marcada como Subflujo, pero no tiene un flujo vinculado.';
                break;
            }
            if ($stepData['type'] === 'Subflujo' && !empty($stepData['linked_flow_id'])) {
                $found = false;
                    foreach (array_merge($flows, $createdSubflows) as $f) {
                    break;
                }
            }
        }

        if (!$error) {
            $newFlow = [
                'id' => $flowId,
                'name' => $name,
                'owner' => $owner,
                'version' => $version,
                'status' => $status,
                'description' => $desc,
                'steps' => $normalizedSteps,
            ];

            $candidateFlows = $flows;
            if ($existingIndex !== null) {
                $candidateFlows[$existingIndex] = $newFlow;
            } else {
                array_unshift($candidateFlows, $newFlow);
            }

            foreach ($createdSubflows as $createdFlow) {
                if (!empty($createdFlow['id'])) {
                    $candidateFlows[] = [
                        'id' => $createdFlow['id'],
                        'name' => $createdFlow['name'] ?? '',
                        'owner' => $createdFlow['owner'] ?? '',
                        'version' => $createdFlow['version'] ?? 1,
                        'status' => $createdFlow['status'] ?? 'Borrador',
                        'description' => $createdFlow['description'] ?? '',
                        'steps' => normalizeSteps($createdFlow['steps'] ?? []),
                    ];
                }
            }

            if (detectFlowCycles($candidateFlows)) {
                $error = 'No se puede guardar el flujo porque genera un ciclo de subflujos.';
            } elseif (file_put_contents($mockFlows, json_encode($candidateFlows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) === false) {
                $error = 'No se pudo guardar el flujo.';
            } else {
                $success = 'Flujo guardado exitosamente.';
                $flow = $newFlow;
                $flows = $candidateFlows;
            }
        }
    }
}

function normalizeSteps($steps) {
    if (!is_array($steps)) {
        return [];
    }
    return array_values(array_map(function ($step) {
        if (!is_array($step)) {
            return [
                'name' => '',
                'type' => 'Manual',
                'approver' => '',
                'linked_flow_id' => '',
            ];
        }
        return [
            'name' => $step['name'] ?? '',
            'type' => $step['type'] ?? 'Manual',
            'approver' => $step['approver'] ?? '',
            'linked_flow_id' => $step['linked_flow_id'] ?? '',
        ];
    }, $steps));
}

function buildFlowGraph(array $flows) {
    $graph = [];
    foreach ($flows as $flowItem) {
        $flowIdItem = $flowItem['id'] ?? '';
        if (!$flowIdItem) {
            continue;
        }
        foreach (normalizeSteps($flowItem['steps'] ?? []) as $stepData) {
            if (!empty($stepData['linked_flow_id'])) {
                $graph[$flowIdItem][] = $stepData['linked_flow_id'];
            }
        }
    }
    return $graph;
}

function hasCycle(array $graph, string $node, array &$visited, array &$stack): bool {
    $visited[$node] = true;
    $stack[$node] = true;

    foreach ($graph[$node] ?? [] as $neighbor) {
        if (!isset($visited[$neighbor]) && hasCycle($graph, $neighbor, $visited, $stack)) {
            return true;
        }
        if (isset($stack[$neighbor])) {
            return true;
        }
    }

    unset($stack[$node]);
    return false;
}

function detectFlowCycles(array $flows): bool {
    $graph = buildFlowGraph($flows);
    $visited = [];
    $stack = [];
    foreach (array_keys($graph) as $node) {
        if (!isset($visited[$node]) && hasCycle($graph, $node, $visited, $stack)) {
            return true;
        }
    }
    return false;
}

if (!$flow && $flowId) {
    foreach ($flows as $f) {
        if ($f['id'] === $flowId) {
            $flow = $f;
            break;
        }
    }
}

$availableFlows = array_values(array_filter($flows, function ($f) use ($flow) {
    return !isset($flow['id']) || $f['id'] !== $flow['id'];
}));

$allFlows = array_values(array_map(function ($f) {
    return [
        'id' => $f['id'] ?? '',
        'name' => $f['name'] ?? '',
        'steps' => normalizeSteps($f['steps'] ?? []),
    ];
}, $flows));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Flujo | WorkFlow</title>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
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
                    <div id="flow-tree" class="mb-6 bg-slate-50 p-4 rounded-lg border border-slate-200">
                        <h4 class="text-sm font-semibold text-slate-900 mb-3">Mapa del flujo</h4>
                        <div id="flow-tree-content" class="space-y-2 text-sm text-slate-700">
                            <p class="text-slate-500">Crea etapas y vincula subflujos para ver la estructura del proceso.</p>
                        </div>
                    </div>
                    <div id="stages" class="space-y-4"></div>
                    <div class="mt-4">
                        <button type="button" onclick="addStage()" class="px-4 py-2 bg-slate-100 rounded-md">Añadir Etapa</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="flow_id" value="<?php echo htmlspecialchars($flow['id'] ?? ''); ?>">
            <textarea id="created-subflows" name="created_subflows" class="hidden">[]</textarea>
            <textarea id="flow-steps" name="steps" class="hidden"><?php echo htmlspecialchars(json_encode(is_array($flow['steps'] ?? null) ? $flow['steps'] : [['name' => '', 'type' => 'Manual', 'approver' => '', 'linked_flow_id' => '']], JSON_UNESCAPED_UNICODE)); ?></textarea>
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

    <div id="modal-subflow" class="hidden fixed inset-0 bg-slate-900 bg-opacity-50 z-50 flex justify-center items-center">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
            <h3 class="text-lg font-bold mb-4">Crear Subflujo</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-slate-700 mb-1">Nombre del subflujo</label>
                    <input id="subflow-name" class="w-full px-3 py-2 border rounded-md" placeholder="Ej. Validación de Legal" />
                </div>
                <div>
                    <label class="block text-sm text-slate-700 mb-1">Departamento responsable</label>
                    <input id="subflow-owner" class="w-full px-3 py-2 border rounded-md" placeholder="Ej. Legal" />
                </div>
                <div>
                    <label class="block text-sm text-slate-700 mb-1">Descripción</label>
                    <textarea id="subflow-desc" class="w-full px-3 py-2 border rounded-md" rows="3" placeholder="Descripción breve"></textarea>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button onclick="closeSubflowModal()" class="px-4 py-2 bg-white border rounded-md">Cancelar</button>
                <button onclick="createSubflow()" class="px-4 py-2 bg-blue-600 text-white rounded-md">Crear subflujo</button>
            </div>
        </div>
    </div>

    <script>
    let currentApproverStage = null;

    const availableFlows = <?php echo json_encode(array_map(function($f){ return ['id' => $f['id'], 'name' => $f['name']]; }, $availableFlows), JSON_UNESCAPED_UNICODE); ?>;
    const allFlows = <?php echo json_encode($allFlows, JSON_UNESCAPED_UNICODE); ?>;
    const currentFlowId = '<?php echo $flow['id'] ?? ''; ?>';
    let createdSubflows = [];
    let currentCreateSubflowStage = null;

    function findFlow(id) {
        return allFlows.find(flow => flow.id === id) || createdSubflows.find(flow => flow.id === id) || null;
    }

    function updateSubflowSelects() {
        document.querySelectorAll('select[name^="stage_subflow_"]').forEach(select => {
            const currentValue = select.value;
            select.innerHTML = `<option value="">Selecciona un flujo</option>${availableFlows.map(flow => `<option value="${flow.id}">${flow.name} (${flow.id})</option>`).join('')}`;
            select.value = currentValue;
        });
    }

    function openCreateSubflowModal(stageIndex) {
        currentCreateSubflowStage = stageIndex;
        document.getElementById('subflow-name').value = '';
        document.getElementById('subflow-owner').value = document.getElementById('flow-owner').value || '';
        document.getElementById('subflow-desc').value = '';
        document.getElementById('modal-subflow').classList.remove('hidden');
    }

    function closeSubflowModal() {
        document.getElementById('modal-subflow').classList.add('hidden');
    }

    function createSubflow() {
        const name = document.getElementById('subflow-name').value.trim();
        const owner = document.getElementById('subflow-owner').value.trim();
        const desc = document.getElementById('subflow-desc').value.trim();
        if (!name) {
            alert('El nombre del subflujo es obligatorio.');
            return;
        }
        const id = 'FL-' + Math.random().toString(36).substr(2, 5).toUpperCase() + '-' + Date.now().toString(36).toUpperCase();
        const newFlow = {
            id,
            name,
            owner,
            version: 1,
            status: 'Borrador',
            description: desc,
            steps: [],
        };
        createdSubflows.push(newFlow);
        availableFlows.push({id: newFlow.id, name: newFlow.name});
        updateSubflowSelects();
        const select = document.querySelector(`select[name='stage_subflow_${currentCreateSubflowStage}']`);
        if (select) {
            select.value = newFlow.id;
        }
        document.getElementById('created-subflows').value = JSON.stringify(createdSubflows);
        closeSubflowModal();
        renderFlowTree();
        showToast('Subflujo creado y vinculado.');
    }

    function buildFlowTree(flow, visited = new Set()) {
        if (!flow) {
            return '<p class="text-slate-500">No hay flujo seleccionado.</p>';
        }

        if (visited.has(flow.id)) {
            return `<div class="text-sm text-rose-600">Ciclo detectado en ${flow.name} (${flow.id})</div>`;
        }

        visited.add(flow.id);
        let html = '<div class="space-y-2">';
        html += `<div class="text-sm font-semibold text-slate-900">${flow.name} (${flow.id})</div>`;
        html += '<div class="space-y-2 pl-4 border-l border-slate-200">';

        if (flow.steps.length === 0) {
            html += '<div class="text-slate-500">Sin etapas definidas.</div>';
        } else {
            flow.steps.forEach((step, index) => {
                html += '<div class="rounded-lg p-3 bg-white border border-slate-200 shadow-sm">';
                html += `<div class="text-sm font-medium text-slate-800">${index + 1}. ${step.name || 'Etapa sin nombre'}</div>`;
                html += `<div class="text-xs text-slate-500">Tipo: ${step.type}</div>`;
                if (step.type === 'Subflujo' && step.linked_flow_id) {
                    const linked = findFlow(step.linked_flow_id);
                    html += `<div class="text-xs text-slate-600">Subflujo: ${linked ? linked.name : step.linked_flow_id} (${step.linked_flow_id})</div>`;
                    if (linked) {
                        html += `<div class="text-xs mt-1"><a href="flow_editor.php?id=${linked.id}" class="text-blue-600 hover:underline">Abrir subflujo</a></div>`;
                    }
                    html += buildFlowTree(linked, new Set(visited));
                }
                html += '</div>';
            });
        }

        html += '</div></div>';
        return html;
    }

    function renderFlowTree() {
        const treeContainer = document.getElementById('flow-tree-content');
        const flow = findFlow(currentFlowId);
        treeContainer.innerHTML = buildFlowTree(flow);
    }

    function createStageElement(stage, index) {
        const wrapper = document.createElement('div');
        wrapper.className = 'bg-slate-50 p-4 rounded-md border border-slate-200';
        wrapper.dataset.stageIndex = index;
        const isSubflow = stage.type === 'Subflujo';
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
                            <select name="stage_type_${index}" onchange="toggleSubflowControls(this)" class="w-full px-3 py-2 border rounded-md">
                                <option ${stage.type === 'Automática' ? 'selected' : ''}>Automática</option>
                                <option ${stage.type === 'Manual' ? 'selected' : ''}>Manual</option>
                                <option ${stage.type === 'Subflujo' ? 'selected' : ''}>Subflujo</option>
                            </select>
                        </div>
                        <div class="stage-subflow-select ${isSubflow ? '' : 'hidden'}">
                            <label class="text-sm text-slate-600">Subflujo vinculado</label>
                            <div class="flex gap-2 items-center">
                                <select name="stage_subflow_${index}" class="w-full px-3 py-2 border rounded-md">
                                    <option value="">Selecciona un flujo</option>
                                    ${availableFlows.map(flow => `<option value="${flow.id}" ${flow.id === (stage.linked_flow_id || '') ? 'selected' : ''}>${flow.name} (${flow.id})</option>`).join('')}
                                </select>
                                <button type="button" onclick="openCreateSubflowModal(${index})" class="px-3 py-2 bg-blue-600 text-white rounded-md text-sm">Crear</button>
                            </div>
                            <p class="text-xs text-slate-500 mt-1">Este paso invocará el subflujo seleccionado como parte del proceso.</p>
                        </div>
                        <div class="stage-approver-field ${isSubflow ? 'hidden' : ''}">
                            <label class="text-sm text-slate-600">Aprobador</label>
                            <div class="flex gap-2">
                                <input name="stage_approver_${index}" class="w-full px-3 py-2 border rounded-md" value="${stage.approver || ''}" placeholder="Aprobador" />
                                <button type="button" onclick="openApproverModal(this)" class="px-3 py-2 bg-slate-100 rounded-md">Buscar</button>
                            </div>
                        </div>
                        ${isSubflow && stage.linked_flow_id ? `<div class="text-xs text-blue-600"><a href="flow_editor.php?id=${stage.linked_flow_id}" class="hover:underline">Ir al subflujo</a></div>` : ''}
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
        } else {
            steps.forEach((step, index) => container.appendChild(createStageElement(step, index)));
        }
        renderFlowTree();
    }

    function addStage(stage = {name: '', type: 'Manual', approver: '', linked_flow_id: ''}) {
        const container = document.getElementById('stages');
        const index = container.children.length;
        container.appendChild(createStageElement(stage, index));
        renderFlowTree();
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
            const approverInput = element.querySelector(`input[name^='stage_approver_']`);
            if (approverInput) {
                approverInput.name = `stage_approver_${idx}`;
            }
            const subflowSelect = element.querySelector(`select[name^='stage_subflow_']`);
            if (subflowSelect) {
                subflowSelect.name = `stage_subflow_${idx}`;
            }
            const button = element.querySelector('button[onclick^="openApproverModal"]');
            if (button) {
                button.setAttribute('onclick', 'openApproverModal(this)');
            }
        });
        renderFlowTree();
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

    function toggleSubflowControls(select) {
        const stageElement = select.closest('[data-stage-index]');
        const type = select.value;
        const subflowSection = stageElement.querySelector('.stage-subflow-select');
        const approverField = stageElement.querySelector('.stage-approver-field');
        if (subflowSection) subflowSection.classList.toggle('hidden', type !== 'Subflujo');
        if (approverField) approverField.classList.toggle('hidden', type === 'Subflujo');
    }

    function saveFlow() {
        document.getElementById('created-subflows').value = JSON.stringify(createdSubflows);
        const stageElements = Array.from(document.querySelectorAll('#stages [data-stage-index]'));
        const steps = stageElements.map((element, index) => {
            const type = element.querySelector(`select[name='stage_type_${index}']`).value;
            const step = {
                name: element.querySelector(`input[name='stage_name_${index}']`).value.trim(),
                type,
                approver: element.querySelector(`input[name='stage_approver_${index}']`)?.value.trim() || '',
            };
            if (type === 'Subflujo') {
                step.linked_flow_id = element.querySelector(`select[name='stage_subflow_${index}']`)?.value || '';
                step.approver = '';
            }
            return step;
        }).filter(step => step.name.length > 0);

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
