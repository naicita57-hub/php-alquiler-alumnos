<?php
?>
<h2>Agregar una nueva carrera</h2>
<form action="actions/crear_carrera_acc.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="carrera" class="form-label">Nombre de la carrera</label>
        <input type="text" class="form-control" id="carrera" name="carrera">
    </div>
    <input type="submit" value="Crear">
    <a href="?p=carreras" class="">Cancelar</a>
</form>