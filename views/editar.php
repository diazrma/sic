<?php
/** viewEditar
 *  @author Rodrigo Cardoso
 *  @version 1.0
 *  @copyright SIC © 2020
 *  @access public
 *  @example Classe viewEditar.
 **/
/**  Inclui arquivos */
require_once ('head.php');
require_once ('../controllers/controllerCliente.class.php');
$cod = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_STRING);
$clientes = new controllerCliente();
$listarCod = $clientes->controllerListarCod($cod);
?>
<form method="post" action="">
    <div class="container">
        <div class="col-6">
            <h1>Editar</h1>
        </div>
        <div class="form-group">
            <div class="col-6">
                <label for="nome"> Nome
                </label>
                <input id="nome" class="form-control" name="nome" type="text" placeholder="Digite nome do cliente"
                    value="<?=$listarCod['nome']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-6">
                <label for="cpf"> CPF
                </label>
                <input id="cpf" class="form-control" name="cpf" type="text" placeholder="Digite CPF do cliente"
                    value="<?=$listarCod['cpf']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-6">
                <label for="email"> E-mail
                </label>
                <input id="email" class="form-control" name="email" type="text" placeholder="Digite o Email do cliente"
                    value="<?=$listarCod['email'];?>" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-6">
                <label for="telefone"> Telefone
                </label>
                <input id="telefone" class="form-control" name="telefone" placeholder="Digite o telefone do cliente"
                    type="text" value="<?=$listarCod['telefone'];?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-6">
                <input type="submit" name="atualizar" class="btn btn-success float-right" value="Atualizar">
                <a href="../index.php" class="btn btn-info text-light  ml-10"> Início</a>
                <a href="cadastro.php" class="btn btn-primary ml-10"> Novo Cliente</a>
                <a href="listar.php" class="btn btn-secondary  ml-10"> Listar Clientes</a>
            </div>
        </div>
    </div>
</form>
<br />
<br />
<div class="container">
    <div class="col-6">
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
    }?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
<script src="../js/scripts.js"></script>