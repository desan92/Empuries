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
    
    if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "Administrador")
    {
        Borrar($id, $conn);
        
    }    
    else
    {
        if($_SESSION["id"] && $_SESSION["id"] == $id)
        {
            Borrar($id, $conn);
        }
        else
        {
            echo "ni adnim ni client";//ERROR 404 PAGE
        }
    }
    
    
}
else
{
    echo "error";//ERROR 404 PAGE
}

?>