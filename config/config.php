<?php

/** config
*  @author Rodrigo Cardoso
*  @version 1.0
*  @copyright SIC © 2020
*  @access public
*  @example Classe conexao.
**/


class Conexao
{

    protected $conexao;

    public function __construct()
    {
        $this->conecta();
    }

    public function __destruct()
    {
        $this->desconecta();
    }
    public static function desconecta()
    {
        $conexao = null;
    }
    public static function conecta()
    {
        try {
            $conexao = new PDO('mysql:host=localhost;dbname=sic;', 'root', '');
            $conexao->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexao->exec("SET NAMES 'utf8';");
            return $conexao;
        } catch (PDOException $e) {
            echo 'ERROR: conexao ' . $e->getMessage();
        }
    }
}
