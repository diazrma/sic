<?php
/** controllerLogs
 *  @author Rodrigo Cardoso
 *  @version 1.0
 *  @copyright SIC © 2020
 *  @access public
 *  @example Classe controllerLogs.
 **/
require_once '../models/modelLogs.class.php';
class controllerLogs extends modelLogs
{
    /**
     * controllerListar
     * @return 'Array — de logs'
     */
    public function controllerListar($filtro)
    {
        $listar = $this->modelListar($filtro);
        return $listar;
    }
       /**
     * controllerLimpar
     * @return 'Array — de logs'
     */
    public function controllerLimpar()
    {
        $listar = $this->modelLimpar();
        return $listar;
    }
}
/** Recebe variáveis via post
 *@var mixed - acao
 */
$acao = filter_input(INPUT_POST, "acao", FILTER_SANITIZE_STRING);
$controllerLogs = new controllerLogs();
if (isset($acao) && !empty($acao) && $acao == 'limparLogs') {
    /**
     * controllerLimpar
     * @param mixed $cod
     * @return 'true — || false'
     */
    $remover = $controllerLogs->controllerLimpar();
    echo $remover;
}