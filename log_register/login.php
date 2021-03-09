<?php

include("../bbdd/conexio.php");
include("functions_register.php");

//es comprova que les dades del login s'han enviat i no estan buides.
if(isset($_POST["username"], $_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"]))
{
    $user = $_POST["username"];
    $pass = $_POST["password"];

    //es crea una connexio a la bbdd.
    $conexio = new Connexio();
    $conn = $conexio->Conect_bbdd();

    //funcio on es comprova si l'usuari amb la contrasenya pasada esta a la bbdd.
    $count = SelectLog($pass, $user, $conn);

    if($count != 0)
    {
        //es recullen les dades del l'usuari aquesta funcio.
        $rows = SelectLogInfo($pass, $user, $conn);
        var_dump($rows);

        //un cop confirmat que l'usuari existeix es crearan les sessions
        session_start();
        $_SESSION['id'] = $rows[0]['id_usuari'];
        $_SESSION['nom'] = $rows[0]['nom_usuari'];
        $_SESSION['cognom'] = $rows[0]['cognom_usuari'];
        $_SESSION['mail'] = $rows[0]['mail'];
        $_SESSION["user"] = $rows[0]['username'];

        //en cas que l'usuari sigui de tipus 1 sera admin si es 2 sera client.
        if($rows[0]['id_rol'] == 1)
        {
            $_SESSION["rol"] = "Administrador"; 
        }
        elseif($rows[0]['id_rol'] == 2)
        {
            $_SESSION["rol"] = "Client";
        }

        header("Location: ../index.php");
    }
    else
    {
        //en cas contrari s'enviara un error de que no s'ha trobat l'usuari amb la contrasenya especifica.
        header("Location: ../log.php?login=notrobat");
    }
}
else
{
    header("Location: ../log.php?login=error");
}


?>