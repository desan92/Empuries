<?php
session_start();
include("../bbdd/conexio.php");
include("function_perfil.php");

if(isset($_GET["id"]) && !empty($_GET["id"]))
{
    $id = $_GET["id"];
    $id = str_replace("'", '', $id);

    $conexio = new Connexio();
    $conn = $conexio->Conect_bbdd();   
    
    if($_SESSION["id"] && $_SESSION["id"] == $id)
    {
        Borrar($id, $conn);
    }
    else
    {
        header("Location: ../index.php");//misstage error.
    }
    
    
}
else
{
    header("Location: ../index.php");
}

?>