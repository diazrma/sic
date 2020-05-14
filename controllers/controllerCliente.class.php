<?php
/** controllerCliente
 *  @author Rodrigo Cardoso
 *  @version 1.0
 *  @copyright SIC © 2020
 *  @access public
 *  @example Classe controllerCliente.
 **/
require_once '../models/modelCliente.class.php';
class controllerCliente extends modelCliente
{
    /**
     * controllerCadastrar
     * @param mixed $nome
     *@param mixed $cpf
     *@param mixed $email
     *@param mixed $telefone
     *@return 'true — || false'
     */
    public function controllerCadastrar($nome,$cpf,$email,$telefone)
    {
        $listar = $this->modelCadastrar($nome,$cpf,$email,$telefone);
        return $listar;
    }
    /**
     * controllerListar
     * @return 'Array — de clientes'
     */
    public function controllerListar()
    {
        $listar = $this->modelListar();
        return $listar;
    }
    /**
     * controllerListarCod
     * @param mixed $cod
     * @return 'true — || false'
     */
    public function controllerListarCod($cod)
    {
        $listarCod = $this->modelListarCod($cod);
        return $listarCod;
    }
    /** controllerAtualizar
     *@param mixed $nome
     *@param mixed $cpf
     *@param mixed $email
     *@param mixed $telefone
     *@param mixed $cod
     *@return 'true — || false'
     */
    public function controllerAtualizar($nome,$cpf,$email,$telefone,$cod)
    {
        $atualizar = $this->modelAtualizar($nome,$cpf,$email,$telefone,$cod);
        return $atualizar;
    }
    /** controllerRemover
     * @param mixed $cod
     * @return 'true — || false'
     */
    public function controllerRemover($cod)
    {
        $remover = $this->modelRemover($cod);
        return $remover;
    }
}
/** Recebe variáveis via post
 */
$cod = filter_input(INPUT_POST, "cod", FILTER_SANITIZE_STRING);
$acao = filter_input(INPUT_POST, "acao", FILTER_SANITIZE_STRING);
$controllerCliente = new controllerCliente();
if ( isset( $acao ) && !empty( $acao ) && $acao == 'remover' ) {
     /**
     * controllerRemover
     * @param mixed $cod
     * @return 'true — || false'
     */
    $remover = $controllerCliente->controllerRemover($cod);
    echo $remover;
}