<?php
session_start();
include("../bbdd/conexio.php");

$conn = mysqli_connect("localhost", "root", "", "empuries");

//echo $_GET["city"];

$visita = [];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {

        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];

            $sql = "SELECT * FROM `productes_botiga` WHERE id_producte=" . $id . ";";

            $result = mysqli_query($conn, $sql);
            while($row = $result->fetch_assoc())
            {
                $visita = $row;
            }
            echo json_encode($visita);
        }
        elseif (isset($_GET['destacat'])){
			$i=0;
			
			$link = "SELECT `id_producte`, `nom_producte`, `intro_descripcio`, `imatge_visita`, `preu` FROM `productes_botiga` ORDER BY RAND()
            LIMIT 2";
			$result = mysqli_query($conn, $link);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result) AND $i < 2) {
					$i++;
				 $visita[] = $row;
				}
				echo json_encode($visita);
			}
        }
        elseif (isset($_GET["eliminarid"])){
            
            $id = $_GET["eliminarid"];
            if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "Administrador")
            {
                $sql = "DELETE FROM productes_botiga WHERE id_producte =" . $id;
                if(mysqli_query($conn, $sql))
                {
                    header("Location: ../profile_visites_admin.php");
                }
                else
                {
                    header("Location: ../profile_visites_admin.php?borrar=error");
                }
            }
            else
            {
                header("Location: ../index.php");//ERROR 404 PAGE
            }			
		}
        elseif(isset($_GET["add"]))
        {
            if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "Administrador")
            {
                
                if(isset($_POST["nom_visita"], $_POST["preu"], $_POST["idioma"], $_POST["places_totals"], $_POST["durada"], $_POST["punt_trobada"], $_POST["latitud"], $_POST["longitud"], $_POST["dia_visita"], $_POST["intro"], $_POST["desc"]))
                {
                    if(!empty($_POST["nom_visita"]) || !empty($_POST["preu"]) || !empty($_POST["idioma"]) || !empty($_POST["places_totals"]) || !empty($_POST["durada"]) || !empty($_POST["punt_trobada"]) || !empty($_POST["latitud"]) || !empty($_POST["longitud"]) || !empty($_POST["dia_visita"]) || !empty($_POST["intro"]) || !empty($_POST["desc"]))
                    {
                        $conexio = new Connexio();
                        $conn = $conexio->Conect_bbdd();

                        $nom_visita = $_POST["nom_visita"];

                        if($_POST["preu"] == 0)
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
                                $filename = $_FILES['fitxer']['name'];
                                if (file_exists("../images/img_visites/" . $filename))
                                {
                                    header("Location:../profile_add_visites.php?fitxer=existeix");
                                } 
                                else
                                {
                                    move_uploaded_file($_FILES["fitxer"]["tmp_name"], "../images/img_visites/" . $filename);
                                    
                                    $insert = "INSERT INTO `productes_botiga` (`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`, `id_usuari`) 
                                    VALUES (\""  . $nom_visita . "\", \"" . $intro  . "\", \"" . $desc . "\", \"" . $filename . "\", \"" . $preu . "\", 0, $places_totals ,\"" . $places_totals .  "\" , \"" . $dia_visita .  "\", \"" . $idioma .  "\", \"" . $durada .  "\", \"" . $punt_trobada .  "\", \"" . $latitud .  "\", \"" . $longitud .  "\", 1);";

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

                                $insert = "INSERT INTO `productes_botiga` (`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`, `id_usuari`) 
                                VALUES (\""  . $nom_visita . "\", \"" . $intro  . "\", \"" . $desc . "\", \"" . $filename . "\", \"" . $preu . "\", 0, $places_totals ,\"" . $places_totals .  "\" , \"" . $dia_visita .  "\", \"" . $idioma .  "\", \"" . $durada .  "\", \"" . $punt_trobada .  "\", \"" . $latitud .  "\", \"" . $longitud .  "\", 1);";

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
        }
        elseif(isset($_GET["edit"]))
        {

            if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "Administrador")
            {

                if(isset($_POST["id_visita"], $_POST["nom_visita"], $_POST["preu"], $_POST["idioma"], $_POST["places_ocupades"], $_POST["places_totals"], $_POST["durada"], $_POST["punt_trobada"], $_POST["latitud"], $_POST["longitud"], $_POST["dia_visita"], $_POST["intro"], $_POST["desc"]))
                {
                    if(!empty($_POST["id_visita"]) || !empty($_POST["nom_visita"]) || !empty($_POST["preu"]) || !empty($_POST["idioma"]) || !empty($_POST["places_ocupades"]) || !empty($_POST["places_totals"]) || !empty($_POST["durada"]) || !empty($_POST["punt_trobada"]) || !empty($_POST["latitud"]) || !empty($_POST["longitud"]) || !empty($_POST["dia_visita"]) || !empty($_POST["intro"]) || !empty($_POST["desc"]))
                    {
                        $conexio = new Connexio();
                        $conn = $conexio->Conect_bbdd();

                        $id_visita = $_POST["id_visita"]; 
                        $nom_visita = $_POST["nom_visita"];

                        if($_POST["preu"] == 0)
                        {
                            $preu = "Gratuït";
                        }
                        else
                        {
                            $preu = $_POST["preu"]; 
                        }

                        $idioma = $_POST["idioma"];
                        $places_ocupades = $_POST["places_ocupades"];
                        $places_totals = $_POST["places_totals"];
                        $places_restants = $places_totals - $places_ocupades;
                        $durada = $_POST["durada"];
                        $punt_trobada = $_POST["punt_trobada"];
                        $latitud = $_POST["latitud"];
                        $longitud = $_POST["longitud"];
                        $dia_visita = $_POST["dia_visita"];
                        $intro = $_POST["intro"];
                        $desc = $_POST["desc"];

                        $nom_visita = mysqli_real_escape_string($conn, $nom_visita);
                        $preu = mysqli_real_escape_string($conn, $preu);
                        $idioma = mysqli_real_escape_string($conn, $idioma);
                        $places_ocupades = mysqli_real_escape_string($conn, $places_ocupades);
                        $places_totals = mysqli_real_escape_string($conn, $places_totals);
                        $places_restants = mysqli_real_escape_string($conn, $places_restants);
                        $durada = mysqli_real_escape_string($conn, $durada);
                        $punt_trobada = mysqli_real_escape_string($conn, $punt_trobada);
                        $latitud = mysqli_real_escape_string($conn, $latitud);
                        $longitud = mysqli_real_escape_string($conn, $longitud);
                        $dia_visita = mysqli_real_escape_string($conn, $dia_visita);
                        $intro = mysqli_real_escape_string($conn, $intro);
                        $desc = mysqli_real_escape_string($conn, $desc);

                        if(isset($_FILES['fitxer']))
                        {

                            if(!empty($_FILES['fitxer']['name']))
                            {
                                $filename = $_FILES['fitxer']['name'];
                                if (file_exists("../images/img_visites/" . $filename))
                                {
                                    header("Location:../profile_edit_visites.php?fitxer=existeix");
                                } 
                                else
                                {
                                    move_uploaded_file($_FILES["fitxer"]["tmp_name"], "../images/img_visites/" . $filename);
                                    
                                    $update = "UPDATE productes_botiga SET nom_producte = '" . $nom_visita . "', intro_descripcio = '" . $intro . "', descripcio = '" . $desc . "', imatge_visita = '" . $filename . "',preu = '" . $preu . "', places_ocupades = '" . $places_ocupades . "', places_totals = '" . $places_totals . "', places_restants = '" . $places_restants . "', dia_visita = '" . $dia_visita . "', idioma = '" . $idioma . "', durada = '" . $durada . "', punt_trobada = '" . $punt_trobada . "', latitud = '" . $latitud . "', longitud = '" . $longitud . "' WHERE  id_producte = " . $id_visita .  ";"; 


                                    if(mysqli_query($conn, $update))
                                    {
                                        header("Location: ../profile_visites_admin.php");
                                    }
                                    else
                                    {
                                        header("Location: ../profile_edit_visites.php?id=" . $id_visita . "&insert=error");
                                    }
                                }

                            }
                            else
                            {
                                
                                $update = "UPDATE productes_botiga SET nom_producte = '" . $nom_visita . "', intro_descripcio = '" . $intro . "', descripcio = '" . $desc . "', preu = '" . $preu . "', places_ocupades = '" . $places_ocupades . "', places_totals = '" . $places_totals . "', places_restants = '" . $places_restants . "', dia_visita = '" . $dia_visita . "', idioma = '" . $idioma . "', durada = '" . $durada . "', punt_trobada = '" . $punt_trobada . "', latitud = '" . $latitud . "', longitud = '" . $longitud . "' WHERE  id_producte = " . $id_visita .  ";"; 

                                if(mysqli_query($conn, $update))
                                {
                                    header("Location: ../profile_visites_admin.php");
                                }
                                else
                                {
                                    header("Location: ../profile_edit_visites.php?id=" . $id_visita . "&insert=error");
                                }
                            }
                        }

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
        }
        else
        {

            $sql = "SELECT `id_producte`, `nom_producte`, `intro_descripcio`, `imatge_visita`, `preu` FROM `productes_botiga`;";

            $result = mysqli_query($conn, $sql);
            while($row = $result->fetch_assoc())
            {
                $visita[] = $row;
            }
            echo json_encode($visita);
            
        }
        
    }

?>