<?php


include '../model/Clientes.php';

class ClientesController
{

    public static function ctrConsultarClientes()
    {
        $Cliente = new Clientes();
        $idCliente = (isset($_GET['idCliente'])) ? $_GET['idCliente'] : null;
        $Cliente->setIdCliente($idCliente);
        $result = $Cliente->mdlConsultarClientes();
        echo json_encode($result);
    }
}


ClientesController::ctrConsultarClientes();

