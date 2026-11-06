<?php

class Producto
{
    private $id;
    private $nombre;
    private $categoria;
    private $carrera;
    private $precio;
    private $descripcion;
    private $imagen;
    private $stock;
    private $fecha_ingreso;

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
    public function getCategoria(): string
    {
        return $this->categoria;
    }

    /**
     * Obtiene la carrera de Producto
     */
    public function getCarrera(): string
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
     * Setea la categoria de Producto
     * @param string $dato categoria del producto
     */
    public function setCategoria(string $dato)
    {
        $this->categoria = $dato;
    }

    /**
     * Setea la carrera de Producto
     * @param string $dato carrera del producto
     */
    public function setCarrera(string $dato)
    {
        $this->carrera = $dato;
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
        $connect = (new Conexion())->getDB();
        $query =  "SELECT 
                        p.id,
                        p.nombre,
                        p.descripcion,
                        p.precio,
                        p.fecha_ingreso,
                        p.imagen, 
                        c.nombre as categoria,
                        car.nombre as carrera
                    FROM producto as p
                    LEFT JOIN categoria as c ON pxc.id_categoria = c.id_categoria
                    LEFT JOIN producto_x_categoria as pxc ON p.id_producto = pxc.id_producto
                    LEFT JOIN producto_x_carrera as pxcar ON p.id_producto = pxcar.id_producto
                    LEFT JOIN carrera as car ON pxcar.id_carrera = car.id_carrera";
        $PDOStatement = $connect->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $productos = $PDOStatement->fetchAll();
        
        return $productos;
    }

    public static function get_x_id(int $id): ?Producto
    {
        
    }

    public static function catalogo_carrera(string $categoria): array
    {
        $resultado = [];
        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $c) {
            if ($c->categoria == $categoria) {
                $resultado[] = $c;
            }
        }
        return $resultado;
    }

    public static function catalogo_fecha(string $fechaFiltro): array
    {
        $resultado = [];
        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $producto) {
            $date = $producto->getFechaIngreso();

            $fecha = substr($date, 0, 4);

            if ($fecha === $fechaFiltro) {
                $resultado[] = $producto;
            }
        }

        return $resultado;
    }

    public static function catalogo_stock(): array
    {
        $resultado = [];
        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $producto) {
            if ($producto->getStock() > 0) {
                $resultado[] = $producto;
            }
        }
        return $resultado;
    }

    public static function destacados(): array
    {
        $resultado = [];
        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $producto) {
            if ($producto->getDestacado() === true) {
                $resultado[] = $producto;
            }
        }
        return $resultado;
    }

    public static function producto_id(int $id): ?Producto
    {
        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $p) {
            if ($p->id == $id) {
                return $p;
            }
        }
        return null;
    }
}
