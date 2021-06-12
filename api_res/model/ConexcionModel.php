<?php


/**
 * Class ConexcionModel
 */
class ConexcionModel
{
    /**
     * @return PDO
     */
    static public function conectar()
    {

        $link = new PDO(
            "mysql:host=localhost;dbname=tienda", "root","",
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );

        $link->exec("set names utf8");

        return $link;
    }
}