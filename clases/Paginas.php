<?php
class Paginas
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
    public static function paginas_del_sitio():array
    {
        $paginas = [];
        $JSON = file_get_contents('data/paginas.json');
        $JSONData = json_decode($JSON);

        foreach ($JSONData as $value){
            $p = new self();
            $p->vinculo = $value->vinculo;
            $p->texto = $value->texto;
            $p->title = $value->title;
            $p->inMenu = $value->inMenu;
            $paginas[] = $p;
        }
        return $paginas;
    }
    public static function paginas_validas():array
    {
        $paginas_validas = [];
        $JSON = file_get_contents('data/paginas.json');
        $JSONData = json_decode($JSON, true);
        
        foreach ($JSONData as $value){
                $paginas_validas[] = $value["vinculo"];
        }
        return $paginas_validas;
    }

    public static function paginas_menu():array
    {
        $paginas_validas = [];
        $JSON = file_get_contents('data/paginas.json');
        $JSONData = json_decode($JSON, true);
        
        foreach ($JSONData as $value){
            if($value["inMenu"]){
                $paginas_validas[] = $value["vinculo"];
            }
        }
        return $paginas_validas;
    }
}
?>