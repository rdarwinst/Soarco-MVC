<?php

namespace Controllers;

use Model\Clientes;

class ClientesController
{
    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    if ($tipo === 'cliente') {
                        $cliente = Clientes::find($id);
                        $cliente->eliminar();
                    }
                }
            }
        }
    }
}
