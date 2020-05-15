<?php
/** viewListar
 *  @author Rodrigo Cardoso
 *  @version 1.0
 *  @copyright SIC © 2020
 *  @access public
 *  @example Classe viewListar.
 **/
/**  Inclui arquivos */
require_once ('head.php');
require_once('../controllers/controllerLogs.class.php');
$logs = new controllerLogs();
/** controllerListar
 * @return 'Array — de logs'
 */
$filtro = filter_input(INPUT_POST, "filtro", FILTER_SANITIZE_STRING);

$lista = $logs->controllerListar($filtro);
?>
<div class="container">
    <form method="post" action="#">

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="filtro">Pesquisar</label>
                    <div class="input-group">
                        <input id="filtro" name="filtro" type="search" class="form-control" placeholder="Ação">
                        <div class="input-group-prepend">
                            <input type="submit" name="pesquisa" class="btn btn-success" value="Pesquisar">
                        </div>
                    </div>
                </div>
                <a href="../index.php" class="btn btn-info text-light  ml-10"> Início</a>
                <a href="#" onclick="limparLogs()" class="btn btn-danger ml-10"> Limpar logs</a>

            </div>

        </div>
    </form>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CÓDIGO</th>
                <th scope="col">AÇÃO</th>
                <th scope="col">DATA</th>
                <th scope="col">HORA</th>
            </tr>
        </thead>
        <?php if (count($lista) == 0) {
            echo '<tr><td>Nenhum registro encontrado!</td></tr>';
        } else {
            foreach ($lista as $valor) { ?>
        <tr>
            <td scope="row"><?= $valor['cod_log']; ?></td>
            <td scope="row"><?= $valor['acao']; ?></td>
            <td scope="row"><?= date("d/m/Y", strtotime($valor['data'])); ?></td>
            <td scope="row"><?= $valor['time']; ?></td>
        </tr>
        <?php }
    }?>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js'></script>
<script src="../js/scripts.js"></script>
