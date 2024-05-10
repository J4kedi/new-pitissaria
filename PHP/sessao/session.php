<?php 
    session_start();

    if (isset($_SESSION['sessao'])) {
        echo "<div class='logar'>
                <a href='perfil.php' class='nav-item'>perfil: Olá, $_SESSION[primeiroNome]!</a>
                <a href='../PHP/logout.php' class='nav-item'>logout</a>
            </div>
        ";
    } else {
        echo "<div class='logar'>
                <a href='login.php' class='nav-item'>login</a> 
                <span id='barra'>/</span> 
                <a href='cadastro.php' class='nav-item'>cadastro</a>
            </div>
        ";
    }  
?>