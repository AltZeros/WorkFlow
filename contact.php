<?php include 'components/header.php'; ?>
<main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <h1 class="text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">Centro de Soporte</h1>
    <p class="text-lg text-slate-600 mb-10">¿Encontraste un bug, tienes dudas de facturación o necesitas ayuda configurando un flujo? Contáctanos.</p>
    
    <form class="bg-white p-8 rounded-xl border border-slate-200 shadow-sm space-y-6">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nombre</label>
                <input type="text" class="w-full px-4 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Correo Electrónico</label>
                <input type="email" class="w-full px-4 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Tipo de Consulta</label>
            <select class="w-full px-4 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <option>Soporte Técnico / Reporte de Bug</option>
                <option>Dudas de Facturación</option>
                <option>Ventas / Plan Enterprise</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Mensaje</label>
            <textarea rows="5" class="w-full px-4 py-2 border border-slate-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>
        <button type="button" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition">Enviar Mensaje</button>
    </form>
</main>
<?php include 'components/footer.php'; ?>