<?php

/** viewEditar
 *  @author Rodrigo Cardoso
 *  @version 1.0
 *  @copyright SIC © 2020
 *  @access public
 *  @example Classe viewEditar.
 **/


require_once ('../controllers/controllerCliente.class.php');

$cod = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_STRING);

$clientes = new controllerCliente();

$listarCod = $clientes->controllerListarCod($cod);

?>

<form method="post" action="">
    <label for="nome"> Nome
    </label>
    <input id="nome" name="nome" type="text" value="<?=$listarCod['nome']; ?>" required>

    <label for="cpf"> CPF
    </label>
    <input id="cpf" name="cpf" type="text" value="<?=$listarCod['cpf']; ?>" required>

    <label for="email"> E-mail
    </label>
    <input id="email" name="email" type="text" value="<?=$listarCod['email'];?>" required>
    <label for="telefone"> Telefone
    </label>
    <input id="telefone" name="telefone" type="text" value="<?=$listarCod['telefone'];?>">
    <input type="submit" name="atualizar" value="Atualizar">
</form>


<?php
//** Recebe as variavés do formulário */

if(isset($_REQUEST['atualizar'])){

$nome = $_REQUEST['nome'];
$cpf = $_REQUEST['cpf'];
$email = $_REQUEST['email'];
$telefone = $_REQUEST['telefone'];


$controllerCliente = new controllerCliente();

/** modelAtualizar
*@param mixed $nome
*@param mixed $cpf
*@param mixed $email
*@param mixed $telefone
*@param mixed $cod
*@return 'true — || false'
 */
$cadastrar = $controllerCliente->modelAtualizar($nome,$cpf,$email,$telefone,$cod);

if($cadastrar == true){
    echo "Cliente atualizado com sucesso!";
}else{
    echo "Não foi possíver cadastrar!";

}
}
?>