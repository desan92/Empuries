<?php
session_start();
include("../bbdd/conexio.php");

if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "Administrador")
{
    
    if(isset($_POST["nom_visita"], $_POST["preu"], $_POST["idioma"], $_POST["places_totals"], $_POST["durada"], $_POST["punt_trobada"], $_POST["latitud"], $_POST["longitud"], $_POST["dia_visita"], $_POST["intro"], $_POST["desc"]))
    {
        if(!empty($_POST["nom_visita"]) || !empty($_POST["preu"]) || !empty($_POST["idioma"]) || !empty($_POST["places_totals"]) || !empty($_POST["durada"]) || !empty($_POST["punt_trobada"]) || !empty($_POST["latitud"]) || !empty($_POST["longitud"]) || !empty($_POST["dia_visita"]) || !empty($_POST["intro"]) || !empty($_POST["desc"]))
        {
            $conexio = new Connexio();
            $conn = $conexio->Conect_bbdd();

            $nom_visita = $_POST["nom_visita"];

            $preu = preg_replace('([^A-Za-z0-9])', '', $texto);
            echo $preu;
            /*if($_POST["preu"] == 0)
            {
                $preu = "Gratuït";
            }
            else
            {
                $preu = $_POST["preu"] . "€"; 
            }

            $idioma = $_POST["idioma"];
            $places_totals = $_POST["places_totals"];
            $durada = $_POST["durada"];
            $punt_trobada = $_POST["punt_trobada"];
            $latitud = $_POST["latitud"];
            $longitud = $_POST["longitud"];
            $dia_visita = $_POST["dia_visita"];
            $intro = $_POST["intro"];
            $desc = $_POST["desc"];

            if(isset($_FILES['fitxer']))
            {

                if(!empty($_FILES['fitxer']['name']))
                {
                    
                    if (file_exists("../images/img_visites/" . $filename))
                    {
                        header("Location:../profile_edit_visites.php?fitxer=existeix");
                    } 
                    else
                    {
                        $filename = $_FILES['fitxer']['name'];
                        move_uploaded_file($_FILES["fitxer"]["tmp_name"], "../images/img_visites/" . $filename);
                        
                        $insert = "INSERT INTO `productes_botiga` (`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`, `id_botiga`) 
                        VALUES (\""  . $nom_visita . "\", \"" . $intro  . "\", \"" . $desc . "\", \"" . $filename . "\", \"" . $preu . "\", 5, $places_totals ,9 , \"" . $dia_visita .  "\", \"" . $idioma .  "\", \"" . $durada .  "\", \"" . $punt_trobada .  "\", \"" . $latitud .  "\", \"" . $longitud .  "\", 1);";

                        if(mysqli_query($conn, $insert))
                        {
                            header("Location: ../profile_visites_admin.php");
                        }
                        else
                        {
                            header("Location: ../profile_edit_visites.php?insert=error");
                        }
                    }

                }
                else
                {
                    $filename = "not-found.jpg";

                    $insert = "INSERT INTO `productes_botiga` (`nom_producte`, `intro_descripcio`, `descripcio`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`, `id_botiga`) 
                    VALUES (\""  . $nom_visita . "\", \"" . $intro  . "\", \"" . $desc . "\", \"" . $preu . "\", 5, $places_totals ,9 , \"" . $dia_visita .  "\", \"" . $idioma .  "\", \"" . $durada .  "\", \"" . $punt_trobada .  "\", \"" . $latitud .  "\", \"" . $longitud .  "\", 1);";

                    if(mysqli_query($conn, $insert))
                    {
                        header("Location: ../profile_visites_admin.php");
                    }
                    else
                    {
                        header("Location: ../profile_edit_visites.php?insert=error");
                    }
                }
            }*/

        }
        else
        {
            header("Location:../profile_edit_visites.php?error=buit");
        }
    }
    else
    {
        header("Location:../profile_edit_visites.php?error=error");
    }
}
else
{
    header("Location:../index.php");
}

?>