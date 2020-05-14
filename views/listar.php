<?php
/** viewListar
*  @author Rodrigo Cardoso
*  @version 1.0
*  @copyright SIC © 2020
*  @access public
*  @example Classe viewListar.
**/
require_once ('../controllers/controllerCliente.class.php');
$clientes = new controllerCliente();

/** controllerListar
 * @return 'Array — de clientes'
*/

$lista = $clientes->controllerListar();
?>
<table border="1">
    <tr>
        <th>CÓDIGO</th>
        <th>NOME</th>
        <th>CPF</th>
        <th>E-MAIL</th>
        <th>TELEFONE</th>
        <th>AÇÕES</th>
    </tr>
    <tr>
        <?php foreach ($lista as $valor){?>
        <td><?=$valor['cod_cliente']; ?></td>
        <td><?=$valor['nome']; ?></td>
        <td><?=$valor['cpf']; ?></td>
        <td><?=$valor['email']; ?></td>
        <td><?=$valor['telefone']; ?></td>
        <td><a href="editar.php?cod=<?= $valor['cod_cliente']; ?>">EDITAR</a>
            <a href="#" onclick="remover('<?=$valor['cod_cliente']?>')">REMOVER</a></td>
        <?php } ?>
    </tr>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
const remover = (cod) => {
    var confirm = window.confirm("Deseja realmente remover este cliente ?");
    if (confirm == true) {
        $.ajax({
            type: "post",
            url: "../controllers/controllerCliente.class.php",
            data: "acao=remover&cod=" + cod,
            success: function(response) {
                if (response == true) {
                    window.location.href = 'listar.php';
                } else {
                    alert('Não foi possível remover este cliente!');
                }
            }
        });
    }
}
</script>