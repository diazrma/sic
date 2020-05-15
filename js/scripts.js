//Mascara CPF e Telefone
$('#cpf').mask('999.999.999-99');
$('#telefone').mask('(99) 99999-9999');

/** Remover cliente */
const remover = (nome, cod) => {
    var confirm = window.confirm("Deseja realmente remover este cliente ?");
    if (confirm == true) {
        $.ajax({
            type: "post",
            url: "../controllers/controllerCliente.class.php",
            data: "acao=remover&nome=" + nome + "&cod=" + cod,
            success: function (response) {
                console.log(response);
                if (response == true) {
                    window.location.href = 'listar.php';
                } else {
                    alert('Não foi possível remover este cliente!');
                }
            }
        });
    }
}


//** Limpar logs do sistema */

const limparLogs = () => {
    var confirm = window.confirm("Deseja realmente limpar todos os logs ?");
    if (confirm == true) {
        $.ajax({
            type: "post",
            url: "../controllers/controllerLogs.class.php",
            data: "acao=limparLogs",
            success: function (response) {
                console.log(response);
                if (response == true) {
                    window.location.href = 'logs.php';
                } else {
                    alert('Não foi possível limpar!');
                }
            }
        });
    }
}
