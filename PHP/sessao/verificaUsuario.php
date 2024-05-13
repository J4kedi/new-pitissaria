<?php
    function verificaUsuario() {
        $usuarios = array("cliente", "pizzaiolo", "gerente");

        if(isset($_SESSION['sessao'])) {
            foreach ($usuarios as $usuario) {
                if ($usuario == 'cliente') {
                    echo "";
                }
            }
        } else {
            header('location: ../paginas/index.php');
        }
    }
?>