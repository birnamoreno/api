<?php
header('Access-Control-Allow-Origin: *');
require 'ConexcionModel.php';
class Clientes extends ConexcionModel
{

    // At
    private  $idCliente;
    private  $nombreCliente;
    private  $apellidosCliente;
    private  $statusCliente;

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @return mixed
     */
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    /**
     * @param mixed $nombreCliente
     */
    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;
    }

    /**
     * @return mixed
     */
    public function getApellidosCliente()
    {
        return $this->apellidosCliente;
    }

    /**
     * @param mixed $apellidosCliente
     */
    public function setApellidosCliente($apellidosCliente)
    {
        $this->apellidosCliente = $apellidosCliente;
    }

    /**
     * @return mixed
     */
    public function getStatusCliente()
    {
        return $this->statusCliente;
    }

    /**
     * @param mixed $statusCliente
     */
    public function setStatusCliente($statusCliente)
    {
        $this->statusCliente = $statusCliente;
    }

    public function mdlConsultarClientes()
    {

        $idCliente = $this->getIdCliente();
        if (empty($idCliente)){
            $stmt = ConexcionModel::conectar()->prepare("SELECT * FROM clientes");
            $stmt->execute();
            return $stmt->fetchAll();
        }else{
            $stmt = ConexcionModel::conectar()->prepare("SELECT * FROM clientes WHERE idCliente = :idCliente");
            $stmt->bindParam(':idCliente' , $idCliente , PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }
    }



}