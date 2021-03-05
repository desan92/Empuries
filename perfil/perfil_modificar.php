<?php

include("../bbdd/conexio.php");
include("function_perfil.php");
session_start();
if(isset($_SESSION['id'], $_SESSION['nom'], $_SESSION['cognom'], $_SESSION['mail'], $_SESSION['user']))
{
    $user_session = $_SESSION["user"];
    $mail_session = $_SESSION["mail"];
    $id = $_SESSION['id'];
    
    
    if(isset($_POST["nom"], $_POST["cognom"], $_POST["email"], $_POST["user"]))
    {
        if(!empty($_POST["nom"]) && !empty($_POST["cognom"]) && !empty($_POST["email"]) && !empty($_POST["user"]))
        {
            $conexio = new Connexio();
            $conn = $conexio->Conect_bbdd();    

            $nom = $_POST["nom"];
            $cognom = $_POST["cognom"];
            $mail = $_POST["email"];
            $user = $_POST["user"];
            //echo $user . " " . $mail . "<br>";
            
            if($mail_session != $mail && $user_session != $user)
            {
                $count = SelectUserMail($mail, $user, $conn);
                //echo $count . "userMailDiff";
                if($count == 0)
                {
                    UpdatePerfil($id, $nom, $cognom, $mail, $user, $conn);

                    $rows = SelectLogInfo($id, $conn);

                        $_SESSION['id'] = $rows[0]['id_usuari'];
                        $_SESSION['nom'] = $rows[0]['nom_usuari'];
                        $_SESSION['cognom'] = $rows[0]['cognom_usuari'];
                        $_SESSION['mail'] = $rows[0]['mail'];
                        $_SESSION["user"] = $rows[0]['username'];

                        if($rows[0]['id_rol'] == 1)
                        {
                            header("Location: ../profile_admin.php");
                        }
                        elseif($rows[0]['id_rol'] == 2)
                        {
                            header("Location: ../profile_client.php");
                        }

                }
                else
                {
                    header("Location: ../profile_edit.php?modificar=repetit");
                }
            }
            elseif($mail_session != $mail && $user_session == $user)
            {
                $count = SelectMail($mail, $conn);
                echo $count . "MailDiff";
                if($count == 0)
                {
                    UpdatePerfil($id, $nom, $cognom, $mail, $user, $conn);

                    $rows = SelectLogInfo($id, $conn);

                        $_SESSION['id'] = $rows[0]['id_usuari'];
                        $_SESSION['nom'] = $rows[0]['nom_usuari'];
                        $_SESSION['cognom'] = $rows[0]['cognom_usuari'];
                        $_SESSION['mail'] = $rows[0]['mail'];
                        $_SESSION["user"] = $rows[0]['username'];

                        if($rows[0]['id_rol'] == 1)
                        {
                            header("Location: ../profile_admin.php");
                        }
                        elseif($rows[0]['id_rol'] == 2)
                        {
                            header("Location: ../profile_client.php");
                        }
                    
                }
                else
                {
                    header("Location: ../profile_edit.php?modificar=repetit");
                }
            }
            elseif($mail_session == $mail && $user_session != $user)
            {
                $count = SelectUser($user, $conn);
                echo $count . "UserDiff";
                if($count == 0)
                {
                    UpdatePerfil($id, $nom, $cognom, $mail, $user, $conn);

                    $rows = SelectLogInfo($id, $conn);
                    //var_dump($rows);
                        $_SESSION['id'] = $rows[0]['id_usuari'];
                        $_SESSION['nom'] = $rows[0]['nom_usuari'];
                        $_SESSION['cognom'] = $rows[0]['cognom_usuari'];
                        $_SESSION['mail'] = $rows[0]['mail'];
                        $_SESSION["user"] = $rows[0]['username'];

                        if($rows[0]['id_rol'] == 1)
                        {
                            header("Location: ../profile_admin.php");
                        }
                        elseif($rows[0]['id_rol'] == 2)
                        {
                            header("Location: ../profile_client.php");
                        }
                    
                }
                else
                {
                    header("Location: ../profile_edit.php?modificar=repetit");
                }
            }
            elseif($mail_session == $mail && $user_session == $user)
            {
                $count = SelectUserMailIguals($mail, $user, $conn);
                echo $count . "UserMailIguals";
                if($count == 1)
                {
                    UpdatePerfil($id, $nom, $cognom, $mail, $user, $conn);

                    $rows = SelectLogInfo($id, $conn);
                    //var_dump($rows);
                        $_SESSION['id'] = $rows[0]['id_usuari'];
                        $_SESSION['nom'] = $rows[0]['nom_usuari'];
                        $_SESSION['cognom'] = $rows[0]['cognom_usuari'];
                        $_SESSION['mail'] = $rows[0]['mail'];
                        $_SESSION["user"] = $rows[0]['username'];

                        if($rows[0]['id_rol'] == 1)
                        {
                            header("Location: ../profile_admin.php");
                        }
                        elseif($rows[0]['id_rol'] == 2)
                        {
                            header("Location: ../profile_client.php");
                        }
                    
                }
                else
                {
                    header("Location: ../profile_edit.php?modificar=repetit");
                }
            }
            else
            {
                header("Location: ../profile_edit.php?modificar=repetit");
            }
        
        }
        else
        {
            header("Location: ../profile_edit.php?modificar=error");
        }
    }
    else
    {
        header("Location: ../profile_edit.php?modificar=error");
    }
}
else
{
    header("Location: ../index.php");
}





?>