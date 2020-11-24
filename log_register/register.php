<?php

include("../bbdd/conexio.php");
include("functions_register.php");

    if(isset($_POST["nom"], $_POST["cognom"], $_POST["mail"], $_POST["username"], $_POST["password"], $_POST["comfirm_pass"]))
    {
        if(empty($_POST["nom"]) || empty($_POST["cognom"]) || empty($_POST["mail"]) || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["comfirm_pass"]))
        {
            header("Location: ../registre.php?registre=buit");
        }
        else
        {
            $nom = $_POST["nom"];
            $cognom = $_POST["cognom"];
            $mail = $_POST["mail"];
            $user = $_POST["username"];
            $pass = $_POST["password"];
            $comfirm_pass = $_POST["comfirm_pass"];

            if($pass != $comfirm_pass)
            {
                header("Location: ../registre.php?registre=pass");
            }
            else
            {
                $conexio = new Connexio();
                $conn = $conexio->Conect_bbdd();

                $count = SelectUserMail($mail, $user, $conn);

                if($count == 0)
                {
                    Inserbbdd($nom, $cognom, $mail, $user, $pass, $conn);
                }
                else
                {
                    header("Location: ../registre.php?registre=repetit");
                }
            }
            
        }
    }
    else
    {
        header("Location: ../registre.php?registre=error");
    }

?>