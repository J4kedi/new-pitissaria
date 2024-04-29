<?php 
    if (isset($_COOKIE['sessao'])) {
        // O cookie 'sessao' existe, o usuário está logado
        echo "Olá, $_COOKIE[sessao]! <a href='perfil.php' class='nav-item'>Perfil</a>";
    } else {
        // O cookie não existe, o usuário não está logado
        echo "<div class='logar'>
                <a href='login.php' class='nav-item'>login</a> 
                <span id='barra'>/</span> 
                <a href='cadastro.php' class='nav-item'>cadastro</a>
            </div>
        ";
    }  
?>