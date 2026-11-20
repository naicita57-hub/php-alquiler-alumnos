<?php
class Secciones
{
    private $vinculo;
    private $texto;
    private $title;
    private $inMenu;

    public function getVinculo():string
    {
        return $this->vinculo;
    }
    public function getTexto():string
    {
        return $this->texto;
    }
    public function getTitle():string
    {
        return $this->title;
    }
    public function getInMenu():bool
    {
        return $this->inMenu;
    }
    public static function secciones_del_sitio():array
    {
        $secciones = [];
        $JSON = file_get_contents('data/secciones.json');
        $JSONData = json_decode($JSON);

        foreach ($JSONData as $value){
            $p = new self();
            $p->vinculo = $value->vinculo;
            $p->texto = $value->texto;
            $p->title = $value->title;
            $p->inMenu = $value->inMenu;
            $secciones[] = $p;
        }
        return $secciones;
    }
    public static function secciones_validas():array
    {
        $secciones_validas = [];
        $JSON = file_get_contents('data/secciones.json');
        $JSONData = json_decode($JSON, true);
        
        foreach ($JSONData as $value){
                $secciones_validas[] = $value["vinculo"];
        }
        return $secciones_validas;
    }

    public static function secciones_menu():array
    {
        $secciones_validas = [];
        $JSON = file_get_contents('data/secciones.json');
        $JSONData = json_decode($JSON, true);
        
        foreach ($JSONData as $value){
            if($value["inMenu"]){
                $secciones_validas[] = $value["vinculo"];
            }
        }
        return $secciones_validas;
    }
}
?>