<?php
require_once "../clases/Producto.php";

//$destacados = Producto::destacados();
?>
<section class="py-6">
    
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-800">Panel de Administración</h1>
        <p class="text-slate-600 mt-1">Seleccioná una sección para gestionar las tablas del sistema.</p>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
    
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
            <div>
                <h2 class="text-xl font-bold text-slate-800 mb-2"> Productos</h2>
            </div>
            <div class="flex flex-col gap-2 mt-4">
                <a href="index.php?p=productos" class="bg-blue-600 text-white px-3 py-1 rounded">
                    Ver Tabla de Productos
                </a>
                <a href="index.php?p=crear_producto" class="bg-blue-600 text-white px-3 py-1 rounded">
                    + Nuevo Producto
                </a>
            </div>
        </div>

      
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
            <div>
                <h2 class="text-xl font-bold text-slate-800 mb-2">Carreras</h2>
               
            </div>
            <div class="flex flex-col gap-2 mt-4">
                <a href="index.php?p=carreras" class="bg-blue-600 text-white px-3 py-1 rounded">
                    Ver Tabla de Carreras
                </a>
                <a href="index.php?p=crear_carrera" class="wbg-blue-600 text-white px-3 py-1 rounded">
                    + Nueva Carrera
                </a>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
            <div>
                <h2 class="text-xl font-bold text-slate-800 mb-2">Usuarios</h2>
            </div>
            <div class="flex flex-col gap-2 mt-4">
                <a href="index.php?p=usuarios" class="bg-blue-600 text-white px-3 py-1 rounded">
                    Ver Tabla de Usuarios
                </a>
            </div>
        </div>

    </div>
</section>