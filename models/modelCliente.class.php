<?php
/** modelCliente
 *  @author Rodrigo Cardoso
 *  @version 1.0
 *  @copyright SIC © 2020
 *  @access public
 *  @example Classe modelCliente.
 **/

require_once '../config/config.php';

class modelCliente extends Conexao
{
    /**
     * modelCadastrar
     * @return 'true || false'
     */
    public function modelCadastrar($nome,$cpf,$email,$telefone)
    {
        $pdo = $this->conecta()->prepare( 'INSERT INTO clientes (nome,cpf,email,telefone)
        VALUE (?,?,?,?)' );
        $pdo->bindValue( 1, $nome );
        $pdo->bindValue( 2, $cpf );
        $pdo->bindValue( 3, $email );
        $pdo->bindValue( 4, $telefone );
        $pdo->execute();
        if ( $pdo == true ) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * modelListar
     * @return 'Array de clientes'
     */
    public function modelListar()
    {
        try {
        $resultado = array();
        $pdo = $this->conecta()->prepare('SELECT cod_cliente,nome,cpf,email,telefone FROM clientes');
        $pdo->execute();
        $resultado = $pdo->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    } catch (Exception $e) {
        echo 'Erro: ' . $e->getMessage();
    }
    }
    /**
     * modelListarCod
     * @return 'Cliente único'
     */
    public function modelListarCod($cod)
    {
        try {
            $resultado = array();
            $pdo = $this->conecta()->prepare('SELECT cod_cliente,nome,cpf,email,telefone FROM clientes WHERE cod_cliente = ?');
            $pdo->bindValue(1,$cod);
            $pdo->execute();
            $resultado = $pdo->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
    /**
     * modelAtualizar
     * @return 'true || false'
     */
    public function modelAtualizar($nome,$cpf,$email,$telefone,$cod)
    {
        $pdo = $this->conecta()->prepare( 'UPDATE clientes SET nome=?, cpf=?, email=?, telefone=? WHERE cod_cliente =?' );
        $pdo->bindValue( 1, $nome );
        $pdo->bindValue( 2, $cpf );
        $pdo->bindValue( 3, $email );
        $pdo->bindValue( 4, $telefone );
        $pdo->bindValue( 5, $cod );
        $pdo->execute();
        if ( $pdo == true ) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * modelRemover
     * @return 'true || false'
     */
    public function modelRemover($cod)
    {
        try {
            $pdo = $this->conecta()->prepare( 'DELETE FROM clientes  WHERE cod_cliente = ?' );
            $pdo->bindValue( 1, $cod );
        
            $pdo->execute();
            $count = $pdo->rowCount();
            if ( $count == 0 ) {
                return false;
            } else {
                return true;
            }
        } catch ( Exception $e ) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
}