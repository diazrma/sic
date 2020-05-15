<?php

/** modelCliente
 *  @author Rodrigo Cardoso
 *  @version 1.0
 *  @copyright SIC © 2020
 *  @access public
 *  @example Classe modelCliente.
 **/
require_once '../config/config.php';
class modelLogs extends Conexao
{
    /** cadastrarLog
     * @param mixed $tipo
     * @param mixed $nome
     */
    public function cadastrarLog($tipo, $nome)
    {
        $data  = date('Y-m-d');
        $time  = date('H:i:s');
        switch ($tipo) {
            case 0:
                $acao = 'Cadastrou Cliente: ' . $nome;
                break;
            case 1:
                $acao = 'Atualizou Cliente: ' . $nome;
                break;
            case 2:
                $acao = 'Excluiu Cliente: ' . $nome;
                break;
        }
        $pdo = $this->conecta()->prepare('INSERT INTO logs (acao,data,time)
        VALUE (?,?,?)');
        $pdo->bindValue(1, $acao);
        $pdo->bindValue(2, $data);
        $pdo->bindValue(3, $time);
        $pdo->execute();
    }
    /** modelListar
     *@return Array
     */
    public function modelListar($filtro)
    {
        try {
            if ($filtro != '') {
                $pdo = $this->conecta()->prepare('SELECT cod_log,acao,data,time FROM logs WHERE acao LIKE :filtro');
                $pdo->bindValue(':filtro', '%' . $filtro . '%');
                $pdo->execute();
                $resultado = $pdo->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } else {
                $pdo = $this->conecta()->prepare('SELECT cod_log,acao,data,time FROM logs');
                $pdo->execute();
                $resultado = $pdo->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
    /** modelLimpar
     *@return Array
     */
    public function modelLimpar()
    {
        try {
            $pdo = $this->conecta()->prepare('DELETE FROM logs');
            $pdo->execute();
            $count = $pdo->rowCount();
            if ($count == 0) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
}
