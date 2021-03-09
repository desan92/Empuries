<?php
session_start();
include("../bbdd/conexio.php");
include("function_perfil.php");

//es pasaa per get l'id de l'usuari a eliminar.
if(isset($_GET["id"]) && !empty($_GET["id"]))
{
    $id = $_GET["id"];
    $id = str_replace("'", '', $id);

    //es crea una connexio a la bbdd.
    $conexio = new Connexio();
    $conn = $conexio->Conect_bbdd();   
    
    //es comprova que la session id de l'usuari logejat es igaul a la id pasada. Si es aixi es borra si no torna a index,
    if(isset($_SESSION["id"]) && $_SESSION["id"] == $id)
    {
        Borrar($id, $conn);
    }
    else
    {
        header("Location: ../index.php");
    }
    
    
}
else
{
    header("Location: ../index.php");
}

?>