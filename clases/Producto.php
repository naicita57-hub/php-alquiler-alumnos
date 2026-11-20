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
                p.stock,
                p.fecha_ingreso,
                p.imagen,
                GROUP_CONCAT(DISTINCT cat.id ORDER BY cat.id SEPARATOR ',') AS id_catgoria,
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
        $query = "SELECT p.id, p.nombre, p.descripcion, p.precio, p.stock, p.fecha_ingreso, p.imagen,
                  GROUP_CONCAT(DISTINCT cat.nombre SEPARATOR ', ') AS categoria,
                  GROUP_CONCAT(DISTINCT car.nombre SEPARATOR ', ') AS carrera
                  FROM producto AS p
                  LEFT JOIN producto_x_categoria pxc ON p.id = pxc.id_producto
                  LEFT JOIN categorias cat ON pxc.id_categoria = cat.id
                  LEFT JOIN producto_x_carrera pxcar ON p.id = pxcar.id_producto
                  LEFT JOIN carreras car ON pxcar.id_carrera = car.id
                  WHERE p.id = :id
                  GROUP BY p.id, p.nombre, p.descripcion, p.precio, p.fecha_ingreso, p.imagen
                  LIMIT 1";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(["id" => $id]);

        $lista = $PDOStatement->fetch();

        return !empty($lista) ? $lista : null;
    }

    public static function catalogo_por_categoria(string $nombreCategoria): array
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT 
                    p.id,
                    p.nombre,
                    p.descripcion,
                    p.precio,
                    p.stock,
                    p.fecha_ingreso,
                    p.imagen,
                    GROUP_CONCAT(DISTINCT cat.nombre SEPARATOR ', ') AS categoria,
                    GROUP_CONCAT(DISTINCT car.nombre SEPARATOR ', ') AS carrera
                  FROM producto AS p
                  LEFT JOIN producto_x_categoria pxc ON p.id = pxc.id_producto
                  LEFT JOIN categorias cat ON pxc.id_categoria = cat.id
                  LEFT JOIN producto_x_carrera pxcar ON p.id = pxcar.id_producto
                  LEFT JOIN carreras car ON pxcar.id_carrera = car.id
                  GROUP BY p.id, p.nombre, p.descripcion, p.precio, p.fecha_ingreso, p.imagen
                  HAVING FIND_IN_SET(:categoria, GROUP_CONCAT(cat.nombre)) > 0";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['categoria' => $nombreCategoria]);

        return $PDOStatement->fetchAll();
    }

    public static function catalogo_por_carrera(string $nombreCarrera): array
    {
        $conexion = (new Conexion())->getDB();
        $query = "SELECT 
                    p.id,
                    p.nombre,
                    p.descripcion,
                    p.precio,
                    p.stock,
                    p.fecha_ingreso,
                    p.imagen,
                    GROUP_CONCAT(DISTINCT cat.nombre SEPARATOR ', ') AS categoria,
                    GROUP_CONCAT(DISTINCT car.nombre SEPARATOR ', ') AS carrera
                  FROM producto AS p
                  LEFT JOIN producto_x_categoria pxc ON p.id = pxc.id_producto
                  LEFT JOIN categorias cat ON pxc.id_categoria = cat.id
                  LEFT JOIN producto_x_carrera pxcar ON p.id = pxcar.id_producto
                  LEFT JOIN carreras car ON pxcar.id_carrera = car.id
                  GROUP BY p.id, p.nombre, p.descripcion, p.precio, p.fecha_ingreso, p.imagen
                  HAVING FIND_IN_SET(:carrera, GROUP_CONCAT(car.nombre)) > 0";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['carrera' => $nombreCarrera]);

        return $PDOStatement->fetchAll();
    }
}
