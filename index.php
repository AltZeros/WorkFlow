<?php include 'components/header.php'; ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 flex flex-col items-center text-center">
    <h1 class="text-5xl md:text-6xl font-extrabold text-slate-900 mb-6 tracking-tight">
        Gestiona tus procesos <br>
        <span class="text-blue-600">sin cuellos de botella</span>
    </h1>
    <p class="text-xl text-slate-600 mb-10 max-w-2xl">
        WorkFlow es el WMS definitivo para digitalizar, auditar y acelerar los trámites internos de tu empresa. Configura flujos en minutos, no en meses.
    </p>
    
    <div class="flex gap-4">
        <a href="register.php" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-bold text-lg shadow-lg transition transform hover:-translate-y-1">
            Crea tu Entorno de Trabajo
        </a>
        <a href="#features" class="bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 px-8 py-4 rounded-lg font-bold text-lg shadow-sm transition">
            Saber más
        </a>
    </div>
</main>

<!-- Hay que mejorar todo lo de aqui abajo -->

<section id="features" class="bg-white py-20 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Deberia de haber una seccion informativa sobre que es un WMS ademas de esto -->
        <h1 class="text-5xl md:text-6xl font-extrabold text-slate-900 mb-6 tracking-tight">
        Caracteristicas
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="p-6 bg-slate-50 rounded-xl border border-slate-100 shadow-sm">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4 text-2xl font-bold">1</div>
                <h3 class="text-xl font-bold mb-2">Motor de Estados Finitos</h3>
                <p class="text-slate-600">Diseña flujos jerárquicos con transiciones predecibles y seguras para cada trámite.</p>
            </div>
            
            <div class="p-6 bg-slate-50 rounded-xl border border-slate-100 shadow-sm">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4 text-2xl font-bold">2</div>
                <h3 class="text-xl font-bold mb-2">Aislamiento Multi-Tenant</h3>
                <p class="text-slate-600">Tus datos están separados de forma segura. Cada empresa opera en su propio ecosistema.</p>
            </div>
            
            <div class="p-6 bg-slate-50 rounded-xl border border-slate-100 shadow-sm">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4 text-2xl font-bold">3</div>
                <h3 class="text-xl font-bold mb-2">Trazabilidad Total</h3>
                <p class="text-slate-600">Auditoría completa de cada acción, aprobación o rechazo en la plataforma.</p>
            </div>
        </div>
    </div>
</section>

<section id="plans" class="bg-white py-20 border-t border-slate-100"> <!--Hay que acomodar esta seccion, el modelo de subscricion se plantea como freemium -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl md:text-6xl font-extrabold text-slate-900 mb-6 tracking-tight">
        Planes
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="p-6 bg-slate-50 rounded-xl border border-slate-100 shadow-sm">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4 text-2xl font-bold">1</div>
                <h3 class="text-xl font-bold mb-2">Free</h3>
                <p class="text-slate-600">Diseña flujos jerárquicos con transiciones predecibles y seguras para cada trámite.</p>
            </div>
            
            <div class="p-6 bg-slate-50 rounded-xl border border-slate-100 shadow-sm">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4 text-2xl font-bold">3</div>
                <h3 class="text-xl font-bold mb-2">Pro</h3>
                <p class="text-slate-600">Auditoría completa de cada acción, aprobación o rechazo en la plataforma.</p>
            </div>
        </div>
    </div>
</section>

<!--
Hay que colocar una seccion de contacto en caso de bugs errores o consultas, probablemente una vista separada?
Tambien una vista o seccion de AboutUs con informacion al respecto de la empresa NexusTecnologicalSolutionsC.A
-->

<?php include 'components/footer.php'; ?>