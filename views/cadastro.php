<?php
/** viewCadastro
 *  @author Rodrigo Cardoso
 *  @version 1.0
 *  @copyright SIC © 2020
 *  @access public
 *  @example Classe viewCadastro.
 **/
/** Chama o controlleCliente */
require_once ('../controllers/controllerCliente.class.php');
?>
<form method="post" action="">
    <label for="nome"> Nome
    </label>
    <input id="nome" name="nome" type="text" required>
    <label for="cpf"> CPF
    </label>
    <input id="cpf" name="cpf" type="text" required>
    <label for="email"> E-mail
    </label>
    <input id="email" name="email" type="text" required>
    <label for="telefone"> Telefone
    </label>
    <input id="telefone" name="telefone" type="text" required>
    <input type="submit" name="cadastro" value="Cadastrar">
</form>
<?php
//** Recebe as variavés do formulário */

if(isset($_REQUEST['cadastro'])){

$nome = $_REQUEST['nome'];
$cpf = $_REQUEST['cpf'];
$email = $_REQUEST['email'];
$telefone = $_REQUEST['telefone'];

$controllerCliente = new controllerCliente();

/** modelCadastrar
*@param mixed $nome
*@param mixed $cpf
*@param mixed $email
*@param mixed $telefone
*@param mixed $cod
*@return 'true — || false'
 */
$cadastrar = $controllerCliente->modelCadastrar($nome,$cpf,$email,$telefone);

if($cadastrar == true){
    echo "Cliente cadastrado com sucesso!";
}else{
    echo "Não foi possíver cadastrar!";

}
}
?>