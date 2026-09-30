<form class="container" action="?p='enviado'" method="get">
    <?php
    if (isset($_GET['p']) && $_GET['p'] === 'contacto') {
        ?>
        <input type="hidden" name="p" value="enviado" />
        <?php
    }
    ?>
    <h2>Pedinos la disponibilidad</h2>

    <div class="mb-3">
        <label for="nombre">
            <span class="after:ml-0.5 after:text-red-500 after:content-['*']">Nombre</span>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
        </label>

        <label for="apellido">
            <span class="after:ml-0.5 after:text-red-500 after:content-['*']">Apellido</span>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
        </label>
    </div>
    <div class="mb-3">
        <label for="email">
            <span class="after:ml-0.5 after:text-red-500 after:content-['*']">Email</span>
            <input type="email" id="email" name="email" placeholder="you@example.com" required>
        </label>

        <label for="telefono">
            <span class="after:ml-0.5 after:text-red-500 after:content-['*']">Número de teléfono</span>
            <input type="tel" id="telefono" name="telefono" maxlength="10" placeholder="11-1234-5678" required>
        </label>
    </div>
    <div class="mb-3">
        <label for="comentario">
            <span class="after:ml-0.5 after:text-red-500 after:content-['*']"></span>
            <textarea id="comentario" rows="3" name="comentario" required></textarea>
        </label>
    </div>

    <input type="submit" value="Enviar">
</form>