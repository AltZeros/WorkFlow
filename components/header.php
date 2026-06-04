<!-- components/header.php -->
<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkFlow | Automatiza tu Empresa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">

    <nav class="bg-white shadow-sm py-4 border-b border-slate-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center relative">
            
            <!-- Logo -->
            <div class="flex items-center">
                <a href="index.php" class="text-2xl font-bold text-blue-600 tracking-tight">WorkFlow</a>
            </div>
            
            <!-- Menú Desktop -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="index.php#features" class="text-slate-600 hover:text-blue-600 font-medium transition">Características</a>
                <a href="index.php#plans" class="text-slate-600 hover:text-blue-600 font-medium transition">Planes</a>
                <a href="about.php" class="text-slate-600 hover:text-blue-600 font-medium transition">Nosotros</a>
                <a href="contact.php" class="text-slate-600 hover:text-blue-600 font-medium transition">Contacto</a>
            </div>
            
            <!-- Botones de Acción Desktop -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="login.php" class="text-slate-600 hover:text-blue-600 font-medium transition">Iniciar Sesión</a>
                <a href="register.php" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md font-medium transition shadow-sm">Comenzar</a>
            </div>

            <!-- Botón de Menú Móvil -->
            <div class="md:hidden flex items-center">
                <button onclick="togglePublicMenu()" class="text-slate-600 hover:text-blue-600 focus:outline-none p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>

        <!-- Menú Desplegable Móvil -->
        <div id="public-mobile-menu" class="hidden md:hidden bg-white border-t border-slate-200 absolute w-full left-0 top-full shadow-xl">
            <div class="px-4 pt-3 pb-6 space-y-2 flex flex-col">
                <a href="index.php#features" class="block px-3 py-2 text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-md">Características</a>
                <a href="index.php#plans" class="block px-3 py-2 text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-md">Planes</a>
                <a href="about.php" class="block px-3 py-2 text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-md">Nosotros</a>
                <a href="contact.php" class="block px-3 py-2 text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-md">Contacto</a>
                
                <div class="border-t border-slate-100 my-3 pt-3">
                    <a href="login.php" class="block px-3 py-2 text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-md mb-2">Iniciar Sesión</a>
                    <a href="register.php" class="block px-3 py-2 text-base font-medium text-center text-white bg-blue-600 hover:bg-blue-700 rounded-md shadow-sm">Comenzar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Script de control móvil -->
    <script>
        function togglePublicMenu() {
            document.getElementById('public-mobile-menu').classList.toggle('hidden');
        }
    </script>