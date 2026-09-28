<?php 

class Producto{
    private $id;
    private $nombre;
    private $categoria;
    private $precio;
    private $descripcion;
    private $imagen;
    private $stock;

    //GETTERS

    /**
     * Obtiene el id de Producto
     */
    public function getId():int{
        return $this->id;
    }

    /**
     * Obtiene el nombre de Producto
     */
    public function getNombre():string{
        return $this->nombre;
    }

    /**
     * Obtiene el categoria de Producto
     */
    public function getCategoria():string{
        return $this->categoria;
    }

    /**
     * Obtiene el precio de Producto
     */
    public function getPrecio():int{
        return $this->precio;
    }

    /**
     * Obtiene el descripcion de Producto
     */
    public function getDescripcion():string{
        return $this->descripcion;
    }

    /**
     * Obtiene el imagen de Producto
     */
    public function getImagen():string{
        return $this->imagen;
    }

    /**
     * Obtiene el stock de Producto
     */
    public function getStock():int{
        return $this->stock;
    }

    //SETTERS

    /**
     * Setea el id de Producto
     * @param int $dato id del producto
     */
    public function setId(int $dato){
    $this->id = $dato;
    }

    /**
     * Setea el nombre de Producto
     * @param string $dato nombre del producto
     */
    public function setNombre (string $dato){
        $this->nombre = $dato;
    }

    /**
     * Setea el categoria de Producto
     * @param string $dato categoria del producto
     */
    public function setCategoria(string $dato){
        $this->categoria = $dato;
    }

    /**
     * Setea el precio de Producto
     * @param int $dato precio del producto
     */
    public function setPrecio(int $dato){
        $this->precio = $dato;
    }

    /**
     * Setea el descripcion de Producto
     * @param string $dato descripcion del producto
     */
    public function setDescripcion(string $dato){
        $this->descripcion = $dato;
    }

    /**
     * Setea el imagen de Producto
     * @param string $dato imagen del producto
     */
    public function setImagen(string $dato){
        $this->imagen = $dato;
    }

    /**
     * Setea el stock de Producto
     * @param int $dato stock del producto
     */
    public function setStock(int $dato){
        $this->stock = $dato;
    }
}

?>