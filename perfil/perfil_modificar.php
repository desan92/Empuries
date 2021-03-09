<?php

include("../bbdd/conexio.php");
include("function_perfil.php");
session_start();

//es comprova que les sessions existeixen 
if(isset($_SESSION['id'], $_SESSION['nom'], $_SESSION['cognom'], $_SESSION['mail'], $_SESSION['user']))
{
    $user_session = $_SESSION["user"];
    $mail_session = $_SESSION["mail"];
    $id = $_SESSION['id'];
    
    //es comprova els elementes del formulari passats. Si existeixen i no estan buits.
    if(isset($_POST["nom"], $_POST["cognom"], $_POST["email"], $_POST["user"]))
    {
        if(!empty($_POST["nom"]) && !empty($_POST["cognom"]) && !empty($_POST["email"]) && !empty($_POST["user"]))
        {
            //es crea una connexio a la bbdd.
            $conexio = new Connexio();
            $conn = $conexio->Conect_bbdd();    

            $nom = $_POST["nom"];
            $cognom = $_POST["cognom"];
            $mail = $_POST["email"];
            $user = $_POST["user"];
            
            /*si las variables pasades de mail i d'usuari son diferents este de comprovar que 
            l'usuari no posi un mail o usuari que tingui un altre user.
            */

            if($mail_session != $mail && $user_session != $user)
            {
                //es comprova que el mail i l'user no existeix si arriba 0 files  vol dir que no n'hi ha un altre igual.
                $count = SelectUserMail($mail, $user, $conn);
                if($count == 0)
                {
                    //es disposa actualitzar els elements que es volen canviar.
                    UpdatePerfil($id, $nom, $cognom, $mail, $user, $conn);

                    //es fa una consutta per obtenir els nous valors de la bbdd
                    $rows = SelectLogInfo($id, $conn);

                        //s'actualitzan les sessions.
                        $_SESSION['id'] = $rows[0]['id_usuari'];
                        $_SESSION['nom'] = $rows[0]['nom_usuari'];
                        $_SESSION['cognom'] = $rows[0]['cognom_usuari'];
                        $_SESSION['mail'] = $rows[0]['mail'];
                        $_SESSION["user"] = $rows[0]['username'];

                        //depenent de si el rol que arruba es 1 o dos s'envaira al perfil de l'admin o del client.
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
            //en cas que l'usuari nomes vulgui canviar el seu correu electronic,
            elseif($mail_session != $mail && $user_session == $user)
            {
                //es comprova si hi ha un correu electronic igual a la bbdd.
                $count = SelectMail($mail, $conn);
                //en cas negatiu surt 0
                if($count == 0)
                {
                    //es dur a terme l'actualització a la bbdd.
                    UpdatePerfil($id, $nom, $cognom, $mail, $user, $conn);

                    //es busca informacio de l'usuari a la bbdd.
                    $rows = SelectLogInfo($id, $conn);

                        //s'actualitzen les dades a la session.
                        $_SESSION['id'] = $rows[0]['id_usuari'];
                        $_SESSION['nom'] = $rows[0]['nom_usuari'];
                        $_SESSION['cognom'] = $rows[0]['cognom_usuari'];
                        $_SESSION['mail'] = $rows[0]['mail'];
                        $_SESSION["user"] = $rows[0]['username'];

                        //depenet del rol que tingui s'enviara a la pagina d'admin o a la de client.
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
            //comprovacio en cas que l'usuari vulfui canviar el seu nom d'usuari
            elseif($mail_session == $mail && $user_session != $user)
            {
                //es comrpova si l'usuari que es vol canviar existeix a la bbdd.
                $count = SelectUser($user, $conn);

                //si el nou username no existeix sera igual a 0.
                if($count == 0)
                {
                    //s'actualitzan las dades de l'usuari.
                    UpdatePerfil($id, $nom, $cognom, $mail, $user, $conn);
                    //es comprova l'informacio de l'usuari a la bbdd per actualitzar les sessions.
                    $rows = SelectLogInfo($id, $conn);

                        //actualitzacio sessions.
                        $_SESSION['id'] = $rows[0]['id_usuari'];
                        $_SESSION['nom'] = $rows[0]['nom_usuari'];
                        $_SESSION['cognom'] = $rows[0]['cognom_usuari'];
                        $_SESSION['mail'] = $rows[0]['mail'];
                        $_SESSION["user"] = $rows[0]['username'];

                        //depenent del rol s'enviara a la part d'admin o de client.
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
            //comprovacio en cas que es vulgui canviar un altre element que no sigui el mail o l'username,
            elseif($mail_session == $mail && $user_session == $user)
            {
                //es conten els usuaris que hi han a la bbdd que coincideixen amb el mail i l'username.
                $count = SelectUserMailIguals($mail, $user, $conn);
            
                //si aquest valor es igual a 1.
                if($count == 1)
                {
                    //s'actualitzaran les dades del usuari.
                    UpdatePerfil($id, $nom, $cognom, $mail, $user, $conn);

                    //es fara una consulta per obtenir l'informacio del usuari i aixi actualitzar les sessions.
                    $rows = SelectLogInfo($id, $conn);
                        //s'actualitzen les sessions.
                        $_SESSION['id'] = $rows[0]['id_usuari'];
                        $_SESSION['nom'] = $rows[0]['nom_usuari'];
                        $_SESSION['cognom'] = $rows[0]['cognom_usuari'];
                        $_SESSION['mail'] = $rows[0]['mail'];
                        $_SESSION["user"] = $rows[0]['username'];

                        //depenent del rol de l'usauri s'enviara a la part d'admin o a la de client.
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