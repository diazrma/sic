<?php

/** viewListar
 *  @author Rodrigo Cardoso
 *  @version 1.0
 *  @copyright SIC © 2020
 *  @access public
 *  @example Classe viewListar.
 **/
/**  Inclui arquivos */
require_once('head.php');
require_once('../controllers/controllerCliente.class.php');
$clientes = new controllerCliente();
/** controllerListar
 * @return 'Array — de clientes'
 */
$filtro = filter_input(INPUT_POST, "filtro", FILTER_SANITIZE_STRING);

$lista = $clientes->controllerListar($filtro);
?>
<div class="container">
    <form method="post" action="#">

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="filtro">Pesquisar</label>
                    <div class="input-group">
                        <input id="filtro" name="filtro" type="search" class="form-control" placeholder="Nome">
                        <div class="input-group-prepend">
                            <input type="submit" name="pesquisa" class="btn btn-success" value="Pesquisar">
                        </div>
                    </div>
                </div>
                <a href="../index.php" class="btn btn-info text-light  ml-10">Página Inicial</a>
                <a href="cadastro.php" class="btn btn-primary "> Novo </a>
            </div>

        </div>
    </form>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CÓDIGO</th>
                <th scope="col">NOME</th>
                <th scope="col">CPF</th>
                <th scope="col">E-MAIL</th>
                <th scope="col">TELEFONE</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>

        <?php if (count($lista) == 0) {
            echo '<tr><td>Nenhum registro encontrado!</td></tr>';
        } else {
            foreach ($lista as $valor) { ?>
                <tr>
                    <td scope="row"><?= $valor['cod_cliente']; ?></td>
                    <td scope="row"><?= $valor['nome']; ?></td>
                    <td scope="row"><?= $valor['cpf']; ?></td>
                    <td scope="row"><?= $valor['email']; ?></td>
                    <td scope="row"><?= $valor['telefone']; ?></td>
                    <td scope="row"><a href="editar.php?cod=<?= $valor['cod_cliente']; ?>">EDITAR</a>
                        <a href="#" onclick="remover('<?= $valor['nome'] ?>','<?= $valor['cod_cliente'] ?>')">REMOVER</a></td>
                </tr>
        <?php }
        } ?>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js'></script>
<script src="../js/scripts.js"></script>