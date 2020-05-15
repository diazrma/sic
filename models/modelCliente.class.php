<?php
/** modelCliente
*  @author Rodrigo Cardoso
*  @version 1.0
*  @copyright SIC © 2020
*  @access public
*  @example Classe modelCliente.
**/
require_once '../config/config.php';
class logs extends Conexao {
    /** cadastrarLog
    * @param mixed $tipo
    * @param mixed $nome
    */
    public function cadastrarLog( $tipo, $nome ) {
        $data  = date( 'Y-m-d' );
        $time  = date( 'H:i:s' );
        switch ( $tipo ) {
            case 0:
            $acao = 'Cadastrou Cliente: '.$nome;
            break;
            case 1:
            $acao = 'Atualizou Cliente: '.$nome;
            break;
            case 2:
            $acao = 'Excluiu Cliente: '.$nome;
            break;
        }
        $pdo = $this->conecta()->prepare( 'INSERT INTO logs (acao,data,time)
        VALUE (?,?,?)' );
        $pdo->bindValue( 1, $acao );
        $pdo->bindValue( 2, $data );
        $pdo->bindValue( 3, $time );
        $pdo->execute();
    }
}
class modelCliente extends Conexao {
    /** modelCadastrar
    *@param mixed $nome
    *@param mixed $cpf
    *@param mixed $email
    *@param mixed $telefone
    *@return 'true — || false'
    */
    public function modelCadastrar( $nome, $cpf, $email, $telefone ) {
        /** Verifica se o CPF já não está cadastrado */
        $pdo = $this->conecta()->prepare( 'SELECT cpf FROM clientes WHERE cpf = ?' );
        $pdo->bindValue( 1, $cpf );
        $pdo->execute();
        $resultado = $pdo->fetchAll( PDO::FETCH_ASSOC );
        if($resultado == true){
            return 3;
        }else{
        $pdo = $this->conecta()->prepare( 'INSERT INTO clientes (nome,cpf,email,telefone)
        VALUE (?,?,?,?)' );
        $pdo->bindValue( 1, $nome );
        $pdo->bindValue( 2, $cpf );
        $pdo->bindValue( 3, $email );
        $pdo->bindValue( 4, $telefone );
        $pdo->execute();
        if ( $pdo == true ) {
            /** Chama a classe logs */
            $log = new logs();
            $log->cadastrarLog( 0, $nome );
            if ( $log == true ) {
                return 1;
            }
        } else {
            return 0;
        }
    }
    }
    /** modelListarCod
    *@return Array
    */
    public function modelListar($filtro) {
        try {
            if($filtro != ''){
            $pdo = $this->conecta()->prepare( 'SELECT cod_cliente,nome,cpf,email,telefone FROM clientes WHERE nome LIKE :filtro' );
            $pdo->bindValue( ':filtro', '%'.$filtro.'%');
            $pdo->execute();
            $resultado = $pdo->fetchAll( PDO::FETCH_ASSOC );
            return $resultado;
        }else{
            $pdo = $this->conecta()->prepare( 'SELECT cod_cliente,nome,cpf,email,telefone FROM clientes' );
            $pdo->execute();
            $resultado = $pdo->fetchAll( PDO::FETCH_ASSOC );
            return $resultado;
        }
        } catch ( Exception $e ) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
    /** modelListarCod
    *@param mixed $cod
    *@return Array
    */
    public function modelListarCod( $cod ) {
        try {
            $pdo = $this->conecta()->prepare( 'SELECT cod_cliente,nome,cpf,email,telefone FROM clientes WHERE cod_cliente = ?' );
            $pdo->bindValue( 1, $cod );
            $pdo->execute();
            $resultado = $pdo->fetch( PDO::FETCH_ASSOC );
            return $resultado;
        } catch ( Exception $e ) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
    /** modelAtualizar
    *@param mixed $nome
    *@param mixed $cpf
    *@param mixed $email
    *@param mixed $telefone
    *@return 'true — || false'
    */
    public function modelAtualizar( $nome, $cpf, $email, $telefone, $cod ) {
        $pdo = $this->conecta()->prepare( 'UPDATE clientes SET nome=?, cpf=?, email=?, telefone=? WHERE cod_cliente =?' );
        $pdo->bindValue( 1, $nome );
        $pdo->bindValue( 2, $cpf );
        $pdo->bindValue( 3, $email );
        $pdo->bindValue( 4, $telefone );
        $pdo->bindValue( 5, $cod );
        $pdo->execute();
        if ( $pdo == true ) {
            $log = new logs();
            $log->cadastrarLog( 1, $nome );
            if ( $log == true ) {
                return true;
            }
        } else {
            return false;
        }
    }
    /** modelRemover
    * @return 'true || false'
    */
    public function modelRemover( $nome, $cod ) {
        try {
            $pdo = $this->conecta()->prepare( 'DELETE FROM clientes  WHERE cod_cliente = ?' );
            $pdo->bindValue( 1, $cod );
            $pdo->execute();
            $count = $pdo->rowCount();
            if ( $count == 0 ) {
                return false;
            } else {
                $log = new logs();
                $log->cadastrarLog( 2, $nome );
                if ( $log == true ) {
                    return true;
                }
            }
        } catch ( Exception $e ) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
}