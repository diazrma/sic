<?php
/** viewCadastro
*  @author Rodrigo Cardoso
*  @version 1.0
*  @copyright SIC © 2020
*  @access public
*  @example Classe viewCadastro.
**/
/**  Inclui arquivos */
require_once ('head.php');
require_once ('../controllers/controllerCliente.class.php');

?>

<form method='post' action=''>
    <div class="container">
        <div class="col-6">
            <h1>Cadastro</h1>
        </div>
        <div class="form-group">
            <div class="col-6">
                <label for='nome'> Nome
                </label>
                <input id='nome' name='nome' type='text' placeholder="Digite nome do cliente" class="form-control"
                    required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-6">
                <label for='cpf'> CPF
                </label>
                <input id='cpf' name='cpf' type='text' placeholder="Digite CPF do cliente" class="form-control"
                    required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-6">
                <label for='email'> E-mail
                </label>
                <input id='email' name='email' type='email' placeholder="Digite o Email do cliente" class="form-control"
                    required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-6">
                <label for='telefone'> Telefone </label>
                <input id='telefone' name='telefone' placeholder="Digite o telefone do cliente" class="form-control"
                    type='text'>
            </div>
        </div>
        <div class="form-group">
            <div class="col-6">
                <a href="../index.php" class="btn btn-info text-light  ml-10">Página Inicial</a>
                <a href="listar.php" class="btn btn-primary "> Listar Clientes </a>
                <input type='submit' name='cadastro' class="btn btn-success float-right" value='Cadastrar'>
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
if ( isset( $_REQUEST['cadastro'] ) ) {
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
    $cadastrar = $controllerCliente->modelCadastrar( $nome, $cpf, $email, $telefone );
    if ( $cadastrar == 1 ) {
        echo 'Cliente cadastrado com sucesso!';
    } else if ( $cadastrar == 0 ) {
        echo 'Não foi possíver cadastrar!';
    } else if ( $cadastrar == 3 ) {
        echo 'Cliente já cadastrado!';
    }
}
?>
    </div>
</div>
<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js'></script>
<script src='../js/scripts.js'></script>