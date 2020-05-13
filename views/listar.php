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

$lista = $clientes->controllerListar();




?>

<table border="1">
 <tr>
 <th>CÒDIGO</th>
 <th>NOME</th>
 <th>CPF</th>
 <th>E-MAIL</th>
 <th>TELEFONE</th>
 </tr>


 <tr>
 <?php foreach ($lista as $elementos){?>
 <td><?php echo $elementos; ?></td>
 <?php } ?>
 </tr>
 
 </table>