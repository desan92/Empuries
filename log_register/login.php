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

        session_start();
        $_SESSION["user"] = $user;
        $_SESSION["pass"] = $pass;
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