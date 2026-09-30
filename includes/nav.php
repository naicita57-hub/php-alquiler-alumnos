
<nav class="max-w-6xl mx-auto bg-white/90 backdrop-blur-md  shadow-sm  px-6 py-3 flex items-center justify-between transition-all">
        
        <!-- Logo a la Izquierda -->
        <a href="index.php?p=inicio" class="flex items-center gap-2 hover:opacity-90 transition-opacity">
            <img src="imagenes/logo-davinci-alquiler.webp" 
                 alt="Logo Davinci Alquiler" 
                 class="h-9 w-auto object-contain">
        </a>

        <!-- Navegación a la Derecha -->
        <ul class="flex items-center gap-1 sm:gap-3 font-medium text-xs sm:text-sm">
            <li>
                <a href="index.php?p=inicio" 
                   class="px-4 py-2 rounded-full transition-all <?= ($seccion === 'inicio') ? 'bg-slate-900 text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/80' ?>">
                    Inicio
                </a>
            </li>
            <li>
                <a href="index.php?p=productos" 
                   class="px-4 py-2 rounded-full transition-all <?= ($seccion === 'productos') ? 'bg-slate-900 text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/80' ?>">
                    Productos
                </a>
            </li>
            <li>
                <a href="index.php?p=contacto" 
                   class="px-4 py-2 rounded-full transition-all <?= ($seccion === 'contacto') ? 'bg-slate-900 text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/80' ?>">
                    Contacto
                </a>
            </li>
            <li>
                <a href="index.php?p=alumnas" 
                   class="px-4 py-2 rounded-full transition-all <?= ($seccion === 'alumnas' || $seccion === 'alumno') ? 'bg-slate-900 text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/80' ?>">
                    Alumnas
                </a>
            </li>
        </ul>

    </nav>