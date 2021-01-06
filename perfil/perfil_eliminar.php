<?php

include("../bbdd/conexio.php");
include("function_perfil.php");

if(isset($_GET["id"]) && !empty($_GET["id"]))
{
    $id = $_GET["id"];

    $conexio = new Connexio();
    $conn = $conexio->Conect_bbdd();   
    
    Borrar($id, $conn);
}
else
{
    echo "error";//ERROR 404 PAGE
}

?>