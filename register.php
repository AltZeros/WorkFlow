<?php include 'components/header.php'; ?>

<main class="min-h-[80vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-slate-50">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-slate-900 tracking-tight">
            Crea tu espacio de trabajo
        </h2>
        <p class="mt-2 text-center text-sm text-slate-600">
            Prueba gratis todas las funciones de WorkFlow por 14 días.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow-sm sm:rounded-xl sm:px-10 border border-slate-200">
            
            <form class="space-y-5" action="app/dashboard.php" method="GET">
                
                <div>
                    <label for="empresa" class="block text-sm font-medium text-slate-700">
                        Nombre de la Empresa
                    </label>
                    <div class="mt-1">
                        <input id="empresa" name="empresa" type="text" required 
                            class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition"
                            placeholder="Ej. Corporación ACME">
                    </div>
                </div>

                <div>
                    <label for="nombre" class="block text-sm font-medium text-slate-700">
                        Tu Nombre Completo (Administrador)
                    </label>
                    <div class="mt-1">
                        <input id="nombre" name="nombre" type="text" required 
                            class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition"
                            placeholder="Juan Pérez">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">
                        Correo Corporativo
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" required 
                            class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition"
                            placeholder="juan@empresa.com">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">
                        Contraseña
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" required 
                            class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                        class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        Registrar mi Empresa
                    </button>
                </div>
            </form>

            <div class="mt-6 border-t border-slate-200 pt-6 text-center">
                <p class="text-sm text-slate-600">
                    ¿Ya tienes un espacio de trabajo? 
                    <a href="login.php" class="font-medium text-blue-600 hover:text-blue-500 transition">
                        Inicia sesión aquí
                    </a>
                </p>
            </div>
        </div>
    </div>
</main>

<?php include 'components/footer.php'; ?>