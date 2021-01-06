<?php

include("../bbdd/conexio.php");
include("functions_register.php");

if(isset($_POST["username"], $_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"]))
{
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $conexio = new Connexio();
    $conn = $conexio->Conect_bbdd();

    $count = SelectLog($pass, $user, $conn);

    if($count != 0)
    {
        $tipus_rol = Selectrol($user, $conn);
        $rows = SelectLogInfo($pass, $user, $conn);
        var_dump($rows);

        session_start();
        $_SESSION['id'] = $rows[0]['id_usuari'];
        $_SESSION['nom'] = $rows[0]['nom_usuari'];
        $_SESSION['cognom'] = $rows[0]['cognom_usuari'];
        $_SESSION['mail'] = $rows[0]['mail'];
        $_SESSION["user"] = $rows[0]['username'];
        //echo $_SESSION['id'] . " " . $rows[0]['nom_usuari'] . " " . $rows[0]['cognom_usuari'] . " " . $rows[0]['mail'] . " " . $rows[0]['username'];
        $_SESSION["rol"] = $tipus_rol;

        header("Location: ../index.php");
    }
    else
    {
        header("Location: ../log.php?login=notrobat");
    }
}
else
{
    header("Location: ../log.php?login=error");
}


?>