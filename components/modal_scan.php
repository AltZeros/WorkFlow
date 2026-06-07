<!-- components/modal_scan.php -->
<div id="modal-scan" class="hidden fixed inset-0 bg-slate-900 bg-opacity-50 z-50 flex justify-center items-center">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
        <h3 class="text-lg font-bold text-slate-900 mb-4">Escanear / Ingresar Código</h3>
        <div class="space-y-4">
            <input id="scan-input" type="text" placeholder="Escanea o escribe el barcode aquí" class="w-full px-3 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
            <p id="scan-help" class="text-sm text-slate-500">Presiona Enter para confirmar. Simulación sin backend.</p>
        </div>
        <div class="mt-6 flex justify-end gap-3">
            <button onclick="closeScanModal()" class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">Cancelar</button>
            <button onclick="confirmScan()" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Confirmar</button>
        </div>
    </div>
</div>

<script>
function openScanModal(prefill=''){
    document.getElementById('modal-scan').classList.remove('hidden');
    const input = document.getElementById('scan-input');
    input.value = prefill;
    setTimeout(()=>input.focus(),100);
}
function closeScanModal(){
    document.getElementById('modal-scan').classList.add('hidden');
}
function confirmScan(){
    const code = document.getElementById('scan-input').value.trim();
    closeScanModal();
    if(code) showToast('Escaneado: '+code);
}
document.addEventListener('keydown', function(e){
    if(e.key === 'Escape') closeScanModal();
    if(e.key === 'Enter' && !document.getElementById('modal-scan').classList.contains('hidden')) confirmScan();
});
</script>
