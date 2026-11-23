<?php

class Producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $fecha_ingreso;
    private $imagen;
    private $categoria = [];
    private $carrera = [];
    public $id_categoria;
    public $nombre_categoria;
    private $sin_iva;
    public $id_carrera;
    public $nombre_carrera;
    //GETTERS

    /**
     * Obtiene el id de Producto
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Obtiene el nombre de Producto
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Obtiene la categoria de Producto
     */
    public function getCategoria(): array
    {
        return $this->categoria;
    }

    /**
     * Obtiene la carrera de Producto
     */
    public function getCarrera(): array
    {
        return $this->carrera;
    }

    /**
     * Obtiene el precio de Producto
     */
    public function getPrecio(): int
    {
        return $this->precio;
    }

    public function getSinIva(): float
    {
        return (float) $this->sin_iva;
    }

    /**
     * Obtiene la descripcion de Producto
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Obtiene la imagen de Producto
     */
    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * Obtiene el stock de Producto
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Obtiene la fecha de ingreso de Producto
     */
    public function getFechaIngreso(): string
    {
        return $this->fecha_ingreso;
    }

    //SETTERS

    /**
     * Setea el id de Producto
     * @param int $dato id del producto
     */
    public function setId(int $dato)
    {
        $this->id = $dato;
    }

    /**
     * Setea el nombre de Producto
     * @param string $dato nombre del producto
     */
    public function setNombre(string $dato)
    {
        $this->nombre = $dato;
    }

    /**
     * Setea las categorías del Producto
     * @param string|null $ids ids de las categorías separados por coma
     * @param string|null $nombres nombres de las categorías separados por "||"
     */
    public function setCategoria(?string $ids, ?string $nombres): void
    {
        $this->categoria = [];

        if (empty($ids)) {
            return;
        }

        $listaIds = explode(',', $ids);
        $listaNombres = explode('||', (string) $nombres);

        foreach ($listaIds as $i => $id) {
            $this->categoria[] = [
                'id'     => (int) $id,
                'nombre' => $listaNombres[$i] ?? ''
            ];
        }
    }

    /**
     * Setea las carreras del Producto
     * @param string|null $ids ids de las carreras separados por coma
     * @param string|null $nombres nombres de las carreras separados por "||"
     */
    public function setCarrera(?string $ids, ?string $nombres): void
    {
        $this->carrera = [];

        if (empty($ids)) {
            return;
        }

        $listaIds = explode(',', $ids);
        $listaNombres = explode('||', (string) $nombres);

        foreach ($listaIds as $i => $id) {
            $this->carrera[] = [
                'id'     => (int) $id,
                'nombre' => $listaNombres[$i] ?? ''
            ];
        }
    }

    /**
     * Setea el precio de Producto
     * @param int $dato precio del producto
     */
    public function setPrecio(int $dato)
    {
        $this->precio = $dato;
    }

    /**
     * Setea la descripcion de Producto
     * @param string $dato descripcion del producto
     */
    public function setDescripcion(string $dato)
    {
        $this->descripcion = $dato;
    }

    /**
     * Setea la imagen de Producto
     * @param string $dato imagen del producto
     */
    public function setImagen(string $dato)
    {
        $this->imagen = $dato;
    }

    /**
     * Setea el stock de Producto
     * @param int $dato stock del producto
     */
    public function setStock(int $dato)
    {
        $this->stock = $dato;
    }

    /**
     * Setea la fecha de ingreso de Producto
     * @param string $dato fecha de ingreso del producto
     */
    public function setFechaIngreso(string $dato)
    {
        $this->fecha_ingreso = $dato;
    }

    //Para que aparezcan los productos


    public static function catalogo_completo(): array
    {
        $conexion = (new Conexion())->getDB();

        $query = "SELECT 
                p.id,
                p.nombre,
                p.descripcion,
                p.precio,
                ROUND(p.precio / 1.21, 2) AS sin_iva,
                p.stock,
                p.fecha_ingreso,
                p.imagen,
                GROUP_CONCAT(DISTINCT cat.id ORDER BY cat.id SEPARATOR ',') AS id_categoria,
                GROUP_CONCAT(DISTINCT cat.nombre ORDER BY cat.id SEPARATOR '||') AS nombre_categoria,
                GROUP_CONCAT(DISTINCT car.id ORDER BY car.id SEPARATOR ',') AS id_carrera,
                GROUP_CONCAT(DISTINCT car.nombre ORDER BY car.id SEPARATOR '||') AS nombre_carrera
              FROM producto AS p
              LEFT JOIN producto_x_categoria pxc ON p.id = pxc.id_producto
              LEFT JOIN categorias cat ON pxc.id_categoria = cat.id
              LEFT JOIN producto_x_carrera pxcar ON p.id = pxcar.id_producto
              LEFT JOIN carreras car ON pxcar.id_carrera = car.id
              GROUP BY p.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $productos = $PDOStatement->fetchAll();

        foreach ($productos as $producto) {
            $producto->setCategoria(
                $producto->id_categoria,
                $producto->nombre_categoria
            );

            $producto->setCarrera(
                $producto->id_carrera,
                $producto->nombre_carrera
            );
        }

        return $productos;
    }

    public static function get_x_id(int $id): ?Producto
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT 
                    p.id, 
                    p.nombre, 
                    p.descripcion, 
                    p.precio,
                    ROUND(p.precio / 1.21, 2) AS sin_iva,
                    p.stock, 
                    p.fecha_ingreso, 
                    p.imagen,
                    GROUP_CONCAT(DISTINCT cat.id ORDER BY cat.id SEPARATOR ',') AS id_categoria,
                    GROUP_CONCAT(DISTINCT cat.nombre ORDER BY cat.id SEPARATOR '||') AS nombre_categoria,
                    GROUP_CONCAT(DISTINCT car.id ORDER BY car.id SEPARATOR ',') AS id_carrera,
                    GROUP_CONCAT(DISTINCT car.nombre ORDER BY car.id SEPARATOR '||') AS nombre_carrera
                  FROM producto AS p
                  LEFT JOIN producto_x_categoria pxc ON p.id = pxc.id_producto
                  LEFT JOIN categorias cat ON pxc.id_categoria = cat.id
                  LEFT JOIN producto_x_carrera pxcar ON p.id = pxcar.id_producto
                  LEFT JOIN carreras car ON pxcar.id_carrera = car.id
                  WHERE p.id = :id
                  GROUP BY p.id
                  LIMIT 1";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(["id" => $id]);

        $producto = $PDOStatement->fetch();

        if(!$producto) {
            return null;
        }

        $producto->setCategoria(
            $producto->id_categoria,
            $producto->nombre_categoria
        );

        $producto->setCarrera(
            $producto->id_carrera,
            $producto->nombre_carrera
        );

        return $producto;
    }

    public static function catalogo_x_idcategoria(int $idCategoria): array
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT 
                    p.id,
                    p.nombre,
                    p.descripcion,
                    p.precio,
                    p.stock,
                    ROUND(p.precio / 1.21, 2) AS sin_iva,
                    p.fecha_ingreso,
                    p.imagen,
                    GROUP_CONCAT(DISTINCT cat.id ORDER BY cat.id SEPARATOR ',') AS id_categoria,
                    GROUP_CONCAT(DISTINCT cat.nombre ORDER BY cat.id SEPARATOR '||') AS nombre_categoria
                  FROM producto AS p
                  LEFT JOIN producto_x_categoria pxc ON p.id = pxc.id_producto
                  LEFT JOIN categorias cat ON pxc.id_categoria = cat.id
                  GROUP BY p.id
                  HAVING FIND_IN_SET(:idCategoria, GROUP_CONCAT(cat.id)) > 0";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['idCategoria' => $idCategoria]);

        $productos = $PDOStatement->fetchAll();

        foreach ($productos as $producto) {
            $producto->setCategoria(
                $producto->id_categoria,
                $producto->nombre_categoria
            );
        }

        return $productos;
    }

    public static function catalogo_x_idcarrera(int $idCarrera): array
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT 
                    p.id,
                    p.nombre,
                    p.descripcion,
                    p.precio,
                    ROUND(p.precio / 1.21, 2) AS sin_iva,
                    p.stock,
                    p.fecha_ingreso,
                    p.imagen,
                    GROUP_CONCAT(DISTINCT cat.id ORDER BY cat.id SEPARATOR ',') AS id_categoria,
                    GROUP_CONCAT(DISTINCT cat.nombre ORDER BY cat.id SEPARATOR '||') AS nombre_categoria
                  FROM producto AS p
                  LEFT JOIN producto_x_categoria pxc ON p.id = pxc.id_producto
                  LEFT JOIN categorias cat ON pxc.id_categoria = cat.id
                  LEFT JOIN producto_x_carrera pxcar ON p.id = pxcar.id_producto
                  LEFT JOIN carreras car ON pxcar.id_carrera = car.id
                  GROUP BY p.id, p.nombre, p.descripcion, p.precio, p.fecha_ingreso, p.imagen
                  HAVING FIND_IN_SET(:idCarrera, GROUP_CONCAT(car.id)) > 0";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['idCarrera' => $idCarrera]);

        $productos = $PDOStatement->fetchAll();

        foreach ($productos as $producto) {
            $producto->setCategoria(
                $producto->id_categoria,
                $producto->nombre_categoria
            );
        }

        return $productos;
    }

    public static function insert(
        string $nombre,
        string $descripcion,
        int $precio,
        int $stock,
        string $fecha_ingreso,
        string $imagen
    ): int {

        $conexion = (new Conexion())->getDB();
        $query = "INSERT INTO producto
                (nombre, descripcion, precio, stock, fecha_ingreso, imagen)
              VALUES
                (:nombre, :descripcion, :precio, :stock, :fecha_ingreso, :imagen)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock,
            'fecha_ingreso' => $fecha_ingreso,
            'imagen' => $imagen
        ]);

        return (int) $conexion->lastInsertId();
    }

    public static function guardar_categoria(int $idProducto, int $idCategoria): void
    {
        $conexion = (new Conexion())->getDB();
        $query = "INSERT INTO producto_x_categoria (id_producto, id_categoria)
                    VALUES (:id_producto, :id_categoria)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id_producto' => $idProducto,
            'id_categoria' => $idCategoria
        ]);
    }

    public static function guardar_carrera(int $id_producto, int $id_carrera): void
    {
        $conexion = (new Conexion())->getDB();
        $query = "INSERT INTO producto_x_carrera (id_producto, id_carrera) 
                    VALUES (:id_producto, :id_carrera)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id_producto' => $id_producto,
            'id_carrera'  => $id_carrera
        ]);
    }

    public function edit(
        string $nombre,
        string $descripcion,
        int $precio,
        int $stock,
        string $fecha_ingreso,
        string $imagen
    ): void {

        $conexion = (new Conexion())->getDB();

        $query = "UPDATE producto
              SET nombre = :nombre,
                  descripcion = :descripcion,
                  precio = :precio,
                  stock = :stock,
                  fecha_ingreso = :fecha_ingreso,
                  imagen = :imagen
              WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $this->id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock,
            'fecha_ingreso' => $fecha_ingreso,
            'imagen' => $imagen
        ]);
    }

    public static function editar_categoria(int $idProducto, int $idCategoria): void
    {
        $conexion = (new Conexion())->getDB();
        $query = "UPDATE SET producto_x_categoria (id_producto, id_categoria)
                    VALUES (:id_producto, :id_categoria)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id_producto' => $idProducto,
            'id_categoria' => $idCategoria
        ]);
    }

    public function delete(): void
    {
        $conexion = (new Conexion())->getDB();
        $query = "DELETE FROM producto WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $this->id
        ]);
    }
    public function clear_categorias(): void
    {
        $conexion = (new Conexion())->getDB();
        $query = "DELETE FROM producto_x_categoria WHERE id_producto = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $this->id
        ]);
    }

    public function clear_carreras(): void
    {
        $conexion = (new Conexion())->getDB();
        $query = "DELETE FROM producto_x_carrera WHERE id_producto = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $this->id
        ]);
    }
}