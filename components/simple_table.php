<?php
// Usage: set $id, $columns (['key'=>'label'...]), $rows (array of assoc arrays), $rowsPerPage optional
if(!isset($id)) $id = 'table_'.rand(1000,9999);
if(!isset($columns)) $columns = [];
if(!isset($rows)) $rows = [];
if(!isset($rowsPerPage)) $rowsPerPage = 10;
?>
<div class="mb-4">
    <div class="flex items-center justify-between mb-3">
        <input id="<?php echo $id; ?>-search" data-target="<?php echo $id; ?>" placeholder="Buscar..." class="px-3 py-2 border rounded-md w-64" />
        <div id="<?php echo $id; ?>-stats" class="text-sm text-slate-500"></div>
    </div>

    <div class="overflow-auto bg-white rounded-lg border border-slate-200">
        <table class="min-w-full divide-y divide-slate-200" id="<?php echo $id; ?>">
            <thead class="bg-slate-50">
                <tr>
                    <?php foreach($columns as $col): ?>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"><?php echo $col; ?></th>
                    <?php endforeach; ?>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-200" id="<?php echo $id; ?>-body">
                <?php foreach($rows as $r): ?>
                <tr class="data-row">
                    <?php foreach(array_keys($columns) as $k): ?>
                        <td class="px-4 py-3 text-sm text-slate-700"><?php echo isset($r[$k]) ? htmlspecialchars($r[$k]) : ''; ?></td>
                    <?php endforeach; ?>
                    <td class="px-4 py-3 text-right">
                        <button onclick="openScanModal('<?php echo isset($r['sku'])?htmlspecialchars($r['sku']):''; ?>')" class="text-sm text-blue-600 hover:underline mr-2">Escanear</button>
                        <button onclick="openConfirm('Acción','Ejecutar acción sobre este registro', ()=>showToast('Acción ejecutada (simulado)'))" class="text-sm text-rose-600 hover:underline">Acción</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-3 flex justify-between items-center">
        <div id="<?php echo $id; ?>-pager" class="text-sm"></div>
        <div class="text-sm text-slate-500">Mostrando <span id="<?php echo $id; ?>-from">0</span> - <span id="<?php echo $id; ?>-to">0</span> de <span id="<?php echo $id; ?>-total">0</span></div>
    </div>
</div>

<script>
function initSimpleTable(id, rowsPerPage){
    const table = document.getElementById(id);
    const body = document.getElementById(id+'-body');
    const rows = Array.from(body.querySelectorAll('.data-row'));
    const pager = document.getElementById(id+'-pager');
    const fromEl = document.getElementById(id+'-from');
    const toEl = document.getElementById(id+'-to');
    const totalEl = document.getElementById(id+'-total');
    const search = document.getElementById(id+'-search');
    let filtered = rows.slice();
    let page = 1;

    function render(){
        const total = filtered.length;
        const pages = Math.max(1, Math.ceil(total/rowsPerPage));
        if(page>pages) page = pages;
        const start = (page-1)*rowsPerPage;
        const end = Math.min(start+rowsPerPage, total);

        rows.forEach(r=>r.style.display='none');
        for(let i=start;i<end;i++) filtered[i].style.display='table-row';

        // pager
        pager.innerHTML = '';
        for(let p=1;p<=pages;p++){
            const btn = document.createElement('button');
            btn.textContent = p;
            btn.className = 'px-2 py-1 mx-1 rounded '+(p===page? 'bg-slate-800 text-white':'bg-slate-100');
            btn.onclick = ()=>{ page=p; render(); };
            pager.appendChild(btn);
        }

        fromEl.innerText = total===0?0:start+1;
        toEl.innerText = total===0?0:end;
        totalEl.innerText = total;
    }

    function applyFilter(term){
        term = term.trim().toLowerCase();
        filtered = rows.filter(r=>{
            if(!term) return true;
            return Array.from(r.querySelectorAll('td')).some(td=> td.innerText.toLowerCase().includes(term));
        });
        page = 1; render();
    }

    search.addEventListener('input', ()=> applyFilter(search.value));
    render();
}

// Auto init for this table
document.addEventListener('DOMContentLoaded', ()=> initSimpleTable('<?php echo $id; ?>', <?php echo (int)$rowsPerPage; ?>));
</script>
