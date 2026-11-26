<?php
class Alerta
{
    /**
     * Regitra una alerta en el sistema, guardandola en la sesión.
     * @param string $tipo primary | secondary | success | danger | warning | info | light | dark
     * @param string $mensaje Mensaje que quiere que aparezca
     */
    public static function add_alerta(string $tipo, string $mensaje)
    {
        $_SESSION['alertas'][]=[
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ];
    }

    /**
     * Vacía la lista de alertas
     */
    public static function clear_alertas()
    {
        $_SESSION['alertas'] = [];
    }

    /**
     * Imprime las alertas en la sesión
     */
    public static function print_alerta($alerta) :string
    {
        $estilos = [
            'primary'   => 'bg-indigo-50 mt-5 text-indigo-700 border-indigo-200',
            'secondary' => 'bg-slate-100 mt-5 text-slate-600 border-slate-200',
            'success'   => 'bg-emerald-50 mt-5 text-emerald-700 border-emerald-200',
            'danger'    => 'bg-rose-50 mt-5 text-rose-700 border-rose-200',
            'warning'   => 'bg-amber-50 mt-5 text-amber-700 border-amber-200',
            'info'      => 'bg-sky-50 mt-5 text-sky-700 border-sky-200',
            'light'     => 'bg-white mt-5 text-slate-600 border-slate-200',
            'dark'      => 'bg-slate-800 mt-5 text-slate-100 border-slate-700',
        ];
        $clases = $estilos[$alerta['tipo']] ?? $estilos['info'];

        $html = "<div class='flex items-center justify-between gap-4 mb-4 px-5 py-3 rounded-2xl border shadow-sm font-semibold {$clases}' role='alert'>";
        $html .= "<span>" . $alerta['mensaje'] . "</span>";
        $html .= "<button type='button' class='text-xl leading-none opacity-60 hover:opacity-100 transition cursor-pointer' onclick=\"this.closest('[role=alert]').remove()\" aria-label='Cerrar'>&times;</button>";
        $html .= "</div>";
        return $html;
    }

    /**
     * Obtiene las alertas
     */
    public static function get_alertas()
    {
        if (!empty($_SESSION['alertas'])){
            $alertasActuales = "";
            foreach ($_SESSION['alertas'] as $alerta) {
                $alertasActuales .= self::print_alerta($alerta);
            }
            self::clear_alertas();
            return $alertasActuales;
        }else{
            return null;
        }
    }
}
?>