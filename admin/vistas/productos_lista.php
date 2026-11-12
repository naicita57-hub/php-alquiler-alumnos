<?php
// Carga del catálogo completo de productos
$productos = Producto::catalogo_completo();
?>

<div class="space-y-6">
  
  <!-- aca seria el titulo del profe?? o hay q hacer otro inicio? -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white/80 backdrop-blur-md p-6 rounded-3xl border border-slate-200/80 shadow-sm">
    <div>
      <h2 class="text-2xl font-bold text-slate-800">Bienvenido a tu panel de Administrador</h2>
    </div>
    
    <a href="index.php?v=productos_crear" class="inline-flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-5 py-3 rounded-2xl transition-all shadow-sm text-sm">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Agregar Nuevo Insumo
    </a>
  </div>

  <!-- Tabla de los prods -->
  <div class="bg-white/80 backdrop-blur-md rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        
        <!-- guias -->
        <thead>
          <tr class="bg-slate-900 text-slate-300 text-xs font-bold uppercase tracking-wider">
            <th class="py-4 px-6 text-center">ID</th>
            <th class="py-4 px-6">Imagen</th>
            <th class="py-4 px-6">Insumo</th>
            <th class="py-4 px-6">Categoría</th>
            <th class="py-4 px-6">Carreras</th>
            <th class="py-4 px-6">Precio / Día</th>
            <th class="py-4 px-6 text-center">Acciones</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-slate-100 text-sm">
          <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $item): ?>
              <tr class="hover:bg-slate-50/80 transition-colors">
       
                <td class="py-4 px-6 text-center font-bold text-slate-400">
                  #<?= $item->getId(); ?>
                </td>

                <td class="py-4 px-6">
                  <div class="w-12 h-12 rounded-xl bg-slate-100 p-1 border border-slate-200 overflow-hidden flex items-center justify-center">
                    <img 
                      src="../assets/imagenes/<?= $item->getImagen(); ?>" 
                      alt="<?= $item->getNombre(); ?>" 
                      class="w-full h-full object-contain"
                      onerror="this.src='../assets/imagenes/logo-davinci-alquiler.webp'"
                    >
                  </div>
                </td>

              
                <td class="py-4 px-6">
                  <span class="font-bold text-slate-800 block"><?= $item->getNombre(); ?></span>
                  <span class="text-xs text-slate-400">Ingreso: <?= $item->getFechaIngreso(); ?></span>
                </td>

               
                <td class="py-4 px-6">
                  <span class="text-xs font-bold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full inline-block">
                    <?= $item->getCategoria() ?: 'Sin categoría'; ?>
                  </span>
                </td>

               
                <td class="py-4 px-6">
                  <span class="text-xs text-slate-600 bg-slate-100 px-2.5 py-1 rounded-lg inline-block max-w-[180px] truncate" title="<?= $item->getCarrera(); ?>">
                    <?= $item->getCarrera() ?: 'General'; ?>
                  </span>
                </td>

               
                <td class="py-4 px-6 font-black text-slate-900">
                  $<?= number_format($item->getPrecio(), 0, ',', '.'); ?>
                  <span class="text-xs font-normal text-slate-500">/día</span>
                </td>

              
                <td class="py-4 px-6 text-center">
                  <div class="inline-flex items-center gap-2">
                
                    <a href="index.php?v=productos_editar&id=<?= $item->getId(); ?>" class="p-2 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-xl border border-amber-200 transition-colors" title="Editar">
                      ✏️
                    </a>

                    
                    <a href="" class="p-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl border border-red-200 transition-colors" title="Eliminar">
                      🗑️
                    </a>
                  </div>
                </td>

              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="py-8 text-center text-slate-500">
                No hay insumos cargados en la base de datos.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>

      </table>
    </div>
  </div>

</div>