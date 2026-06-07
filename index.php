<?php include 'components/header.php'; ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 flex flex-col items-center text-center">
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-sm font-semibold mb-6 border border-blue-100">
        <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span></span>
        Nexus Tecnological Solutions C.A. presenta
    </div>
    <h1 class="text-5xl md:text-6xl font-extrabold text-slate-900 mb-6 tracking-tight leading-tight">
        Gestiona tus procesos <br>
        <span class="text-blue-600">sin cuellos de botella</span>
    </h1>
    <p class="text-xl text-slate-600 mb-10 max-w-2xl">
        WorkFlow es el WMS definitivo para digitalizar, auditar y acelerar los trámites internos de tu empresa. Configura flujos en minutos, no en meses.
    </p>
    <div class="max-w-3xl mx-auto mb-8 text-sm text-slate-500">
        <p>Registra tu empresa y configura al primer administrador con el botón principal. Después, invita a tus empleados desde el directorio para que reclamen su cuenta y comiencen a trabajar.</p>
    </div>
    <div class="flex gap-4">
        <a href="register.php" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-bold text-lg shadow-lg transition transform hover:-translate-y-1">
            Crea tu Entorno de Trabajo
        </a>
        <a href="#wms-info" class="bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 px-8 py-4 rounded-lg font-bold text-lg shadow-sm transition">
            Saber más
        </a>
    </div>
</main>

<section id="wms-info" class="bg-slate-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2">
            <h2 class="text-3xl font-extrabold mb-4">¿Qué es un Workflow Management System?</h2>
            <p class="text-slate-400 text-lg mb-4">Un WMS es el motor lógico de tu empresa. En lugar de usar correos electrónicos desordenados o papeles físicos para aprobar permisos o presupuestos, un WMS centraliza todo.</p>
            <p class="text-slate-400 text-lg">Define reglas claras: la persona <span class="text-emerald-400 font-bold">A</span> solicita, el sistema valida, y la persona <span class="text-blue-400 font-bold">B</span> aprueba. Todo queda registrado, medido y automatizado.</p>
        </div>
        <div class="md:w-1/2 bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl">
            <div class="flex items-center justify-between text-center">
                <div><div class="h-12 w-12 bg-emerald-500/20 text-emerald-400 rounded-full flex items-center justify-center font-bold mx-auto mb-2">1</div><span class="text-sm">Solicitud</span></div>
                <div class="flex-1 h-0.5 bg-slate-600 mx-4"></div>
                <div><div class="h-12 w-12 bg-amber-500/20 text-amber-400 rounded-full flex items-center justify-center font-bold mx-auto mb-2">2</div><span class="text-sm">Revisión</span></div>
                <div class="flex-1 h-0.5 bg-slate-600 mx-4"></div>
                <div><div class="h-12 w-12 bg-blue-500/20 text-blue-400 rounded-full flex items-center justify-center font-bold mx-auto mb-2">3</div><span class="text-sm">Aprobación</span></div>
            </div>
        </div>
    </div>
</section>

<section class="bg-slate-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-extrabold text-slate-900">Tenant Owner vs Empleado</h2>
            <p class="mt-3 text-slate-600 max-w-2xl mx-auto">Una cuenta de tenant owner crea y administra el espacio de trabajo. Las cuentas de empleado son invitadas y reclaman su acceso con una contraseña.</p>
        </div>
        <div class="grid gap-6 md:grid-cols-2">
            <div class="p-8 bg-white rounded-3xl border border-slate-200 shadow-sm">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold uppercase tracking-wide">Tenant Owner</span>
                <h3 class="mt-6 text-2xl font-bold text-slate-900">Administrador de empresa</h3>
                <p class="mt-4 text-slate-600">Registra la empresa desde la landing, crea el primer administrador, define el tenant y configura flujos, usuarios y suscripción.</p>
                <ul class="mt-6 space-y-3 text-slate-600">
                    <li class="flex gap-3"><span class="mt-1 text-emerald-500">•</span> Onboarding inicial del tenant.</li>
                    <li class="flex gap-3"><span class="mt-1 text-emerald-500">•</span> Invita empleados desde el directorio.</li>
                    <li class="flex gap-3"><span class="mt-1 text-emerald-500">•</span> Administra roles, flujos y organización.</li>
                </ul>
                <div class="mt-8">
                    <a href="register.php" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-5 py-3 text-white font-semibold hover:bg-blue-700 transition">Registrar tenant</a>
                </div>
            </div>
            <div class="p-8 bg-white rounded-3xl border border-slate-200 shadow-sm">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold uppercase tracking-wide">Empleado</span>
                <h3 class="mt-6 text-2xl font-bold text-slate-900">Cuenta reclamada</h3>
                <p class="mt-4 text-slate-600">Recibe una invitación desde tu empresa y reclama tu cuenta con tu correo corporativo. Luego podrás iniciar solicitudes y seguir tus trámites.</p>
                <ul class="mt-6 space-y-3 text-slate-600">
                    <li class="flex gap-3"><span class="mt-1 text-emerald-500">•</span> No se registra libremente.</li>
                    <li class="flex gap-3"><span class="mt-1 text-emerald-500">•</span> Reclama la cuenta con correo corporativo.</li>
                    <li class="flex gap-3"><span class="mt-1 text-emerald-500">•</span> Accede a solicitudes, aprobaciones y operación según rol.</li>
                </ul>
                <div class="mt-8">
                    <a href="claim_account.php" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-5 py-3 text-white font-semibold hover:bg-slate-800 transition">Reclamar cuenta</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="features" class="bg-white py-20 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-extrabold text-slate-900 mb-16 tracking-tight">Arquitectura de Nivel Empresarial</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-left">
            <div class="p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:shadow-md transition">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Motor de Estados Finitos</h3>
                <p class="text-slate-600 leading-relaxed">Diseña flujos jerárquicos con transiciones predecibles. Construye el recorrido de cada trámite visualmente.</p>
            </div>
            
            <div class="p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:shadow-md transition">
                <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Aislamiento Multi-Tenant</h3>
                <p class="text-slate-600 leading-relaxed">Tus datos están separados. Cada empresa opera en su propio ecosistema de base de datos garantizando privacidad.</p>
            </div>
            
            <div class="p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:shadow-md transition">
                <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Trazabilidad Total</h3>
                <p class="text-slate-600 leading-relaxed">Auditoría completa e inmutable de cada acción. Registramos quién, cuándo y desde dónde se aprobó cada solicitud.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Freemium -->
<section id="plans" class="bg-slate-50 py-20 border-t border-slate-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">Planes Simples y Transparentes</h2>
            <p class="text-lg text-slate-600">Empieza gratis, escala cuando lo necesites.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm flex flex-col">
                <h3 class="text-2xl font-bold text-slate-900 mb-2">WorkFlow Free</h3>
                <p class="text-slate-500 mb-6">Perfecto para equipos pequeños o pruebas.</p>
                <p class="text-5xl font-extrabold text-slate-900 mb-8">$0<span class="text-lg text-slate-500 font-medium">/mes</span></p>
                <ul class="space-y-4 mb-8 flex-1">
                    <li class="flex items-center gap-3 text-slate-700"><svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Hasta 8 Usuarios activos</li>
                    <li class="flex items-center gap-3 text-slate-700"><svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 3 Flujos de trabajo máximos</li>
                    <li class="flex items-center gap-3 text-slate-700"><svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Límite de 100 trámites al mes</li>
                </ul>
                <a href="register.php" class="block w-full py-3 px-4 bg-slate-100 text-slate-800 font-bold text-center rounded-lg hover:bg-slate-200 transition">Comenzar Gratis</a>
            </div>

            <div class="bg-slate-900 p-8 rounded-2xl border border-slate-800 shadow-xl flex flex-col relative transform md:-translate-y-4">
                <div class="absolute top-0 right-8 transform -translate-y-1/2">
                    <span class="bg-blue-500 text-white text-xs font-bold uppercase tracking-wider py-1 px-3 rounded-full">Recomendado</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">WorkFlow Pro</h3>
                <p class="text-slate-400 mb-6">Para empresas que necesitan control total.</p>
                <p class="text-5xl font-extrabold text-white mb-8">$12<span class="text-lg text-slate-400 font-medium">/mes</span></p>
                <ul class="space-y-4 mb-8 flex-1">
                    <li class="flex items-center gap-3 text-slate-300"><svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Usuarios Ilimitados</li>
                    <li class="flex items-center gap-3 text-slate-300"><svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Flujos Ilimitados</li>
                    <li class="flex items-center gap-3 text-slate-300"><svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Trámites y auditoría sin límites</li>
                    <li class="flex items-center gap-3 text-slate-300"><svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Soporte Prioritario 24/7</li>
                </ul>
                <a href="register.php" class="block w-full py-3 px-4 bg-blue-600 text-white font-bold text-center rounded-lg hover:bg-blue-500 transition shadow-lg">Actualizar a Pro</a>
            </div>
            
        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>