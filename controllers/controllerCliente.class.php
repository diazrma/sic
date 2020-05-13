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
     * @return 'true || false'
     */
    public function controllerCadastrar($nome,$cpf,$email,$telefone)
    {
        $listar = $this->modelCadastrar($nome,$cpf,$email,$telefone);
        return $listar;
    }

    /**
     * controllerListar
     * @return 'Array de clientes'
     */
    public function controllerListar()
    {
        $listar = $this->modelListar();
        return $listar;
    }
    /**
     * controllerListarCod
     * @return 'true || false'
     */
    public function controllerListarCod($cod)
    {
        $listarCod = $this->modelListarCod($cod);
        return $listarCod;
    }
    /**
     * controllerListarCod
     * @return 'true || false'
     */
    public function controllerAtualizar($nome,$cpf,$email,$telefone,$cod)
    {
        $atualizar = $this->modelAtualizar($nome,$cpf,$email,$telefone,$cod);
        return $atualizar;
    }
    /**
     * controllerListarCod
     * @return 'true || false'
     */
    public function controllerRemover($cod)
    {
        $remover = $this->modelRemover($cod);
        return $remover;
    }
}
