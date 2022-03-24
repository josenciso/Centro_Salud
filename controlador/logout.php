
<?php
session_start();
//ENTRE QUIEN INTENTE ENTRAR A INICIO
if (!empty($_SESSION['administrativo'])) {
    session_destroy();
    header("Location: ..");
}

if(!empty($_SESSION['administrativo'])){
    session_destroy();
    header("Location: ..");
}
if(!empty($_SESSION['medico'])){
    session_destroy();
    header("Location: ..");
}



if (empty($_SESSION['medico'])) {
    session_destroy();
    header("Location: ..");
}


