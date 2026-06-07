<!-- components/toasts.php -->
<div id="toasts" class="fixed top-6 right-6 z-60 space-y-2"></div>

<script>
function showToast(message, type='info'){
    const container = document.getElementById('toasts');
    const el = document.createElement('div');
    el.className = 'max-w-sm px-4 py-2 rounded-lg shadow-md text-white';
    el.style.opacity = '0';
    if(type === 'error') el.classList.add('bg-rose-600');
    else if(type === 'success') el.classList.add('bg-emerald-600');
    else el.classList.add('bg-slate-800');
    el.innerText = message;
    container.appendChild(el);
    setTimeout(()=>{ el.style.opacity = '1'; el.style.transition='opacity 200ms ease'; },10);
    setTimeout(()=>{ el.style.opacity='0'; setTimeout(()=>el.remove(),300); },3000);
}
</script>
