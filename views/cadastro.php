<?php

/** viewCadastro
 *  @author Rodrigo Cardoso
 *  @version 1.0
 *  @copyright SIC © 2020
 *  @access public
 *  @example Classe viewCadastro.
 **/


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

