<form class="container" action="?p='enviado'" method="get">
    <?php
    if (isset($_GET['p']) && $_GET['p'] === 'contacto') {
        ?>
        <input type="hidden" name="p" value="enviado" />
        <?php
    }
    ?>

    <div class="mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre">
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email">
    </div>
    <div class="mb-3">
        <label for="comentario">Comentario</label>
        <textarea id="comentario" rows="3" name="comentario"></textarea>
    </div>

    <input type="submit" value="Enviar">
</form>