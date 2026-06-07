<!-- components/modal_confirm.php -->
<div id="modal-confirm" class="hidden fixed inset-0 bg-slate-900 bg-opacity-50 z-50 flex justify-center items-center">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
        <h3 id="confirm-title" class="text-lg font-bold text-slate-900 mb-4">Confirmar acción</h3>
        <p id="confirm-body" class="text-sm text-slate-600">¿Estás seguro?</p>
        <div class="mt-6 flex justify-end gap-3">
            <button onclick="closeConfirm()" class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">Cancelar</button>
            <button id="confirm-ok" onclick="confirmOk()" class="px-4 py-2 text-sm font-medium text-white bg-rose-600 rounded-md hover:bg-rose-700">Confirmar</button>
        </div>
    </div>
</div>

<script>
let confirmCallback = null;
function openConfirm(title, body, cb){
    document.getElementById('confirm-title').innerText = title || 'Confirmar acción';
    document.getElementById('confirm-body').innerText = body || '¿Estás seguro?';
    confirmCallback = cb || null;
    document.getElementById('modal-confirm').classList.remove('hidden');
}
function closeConfirm(){
    document.getElementById('modal-confirm').classList.add('hidden');
    confirmCallback = null;
}
function confirmOk(){
    if(confirmCallback) confirmCallback();
    closeConfirm();
}
</script>
