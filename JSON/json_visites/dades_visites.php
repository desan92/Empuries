<?php
//S'inician les sessions.
session_start();

/*
s'obre una connexio al servidor MySQL, es pasan les dades de localhost,
l'usuari, la contrasenya(si en te) i el nom de la bbdd.
*/

$conn = mysqli_connect("localhost", "root", "", "empuries");

//variable on  es guardara tota l'informacio rebuda de la consulta de la bbdd.
$visita = [];

//es comprova la connexio a la base de dades.
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        //es comproba que la variable id pasada per metode get existeix i no esta buidaa.
        if(isset($_GET["id"]) && !empty($_GET['id']))
        {
            $id = $_GET["id"];

            //sentencia sql on s'obtindra l'informacio especifica de una visita.
            $sql = "SELECT * FROM `productes_botiga` WHERE id_producte=" . $id . ";";

            //es realitzar la consulta a la bbdd i es guarda a la variable result.
            $result = mysqli_query($conn, $sql);

            //s'introdueix l'informacio obtinguda a la consulta a la variable visita.
            while($row = $result->fetch_assoc())
            {
                $visita = $row;
            }
            echo json_encode($visita);
        }
        elseif (isset($_GET['destacat']) && !empty($_GET['destacat']))
        {
            //es comprova que que la varible destacat existeix i no esta buida.

			$i=0;
			
            //sentencia sql que buscara dos elements aleatoris a la taula productes botiga.
			$link = "SELECT `id_producte`, `nom_producte`, `intro_descripcio`, `imatge_visita`, `preu` FROM `productes_botiga` ORDER BY RAND()
            LIMIT 2";

            //es realitzar la consulta a la bbdd i es guarda a la variable result.
			$result = mysqli_query($conn, $link);

            //s'introdueixen les dues files trobades aleatoriament de la bbdd a la variable visita
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result) AND $i < 2) {
					$i++;
				 $visita[] = $row;
				}
				echo json_encode($visita);
			}
        }
        elseif(isset($_GET["eliminarid"]) && !empty($_GET["eliminarid"]))
        {
            //es comprova que la variable eliminarid existeix i no esta buida.
            
            $id = $_GET["eliminarid"];

            //es comprova quin es el rol del que fa l'accio, si es administrador.
            if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "Administrador")
            {
                //sentencia sql que buscara l'informacio a la taula productes botiga.
                $sql = "SELECT imatge_visita FROM `productes_botiga` WHERE id_producte=" . $id . ";";

                //es realitzar la consulta a la bbdd i es guarda a la variable result.
                $result = mysqli_query($conn, $sql);

                //s'introdueix l'informacio obtinguda a la consulta a la variable imatge.
                while($row = $result->fetch_assoc())
                {
                    $imatge[] = $row;
                }
                $img_visita = $imatge[0]["imatge_visita"];

                //es comprova que l'imatge esta present al fitxer.
                if(file_exists("../../images/img_visites/" . $img_visita))
                {
                    //si esta present, pero es not-found.jpg, nomes es borrara l'informacio de la taula de la bbdd.
                    if($img_visita == "not-found.jpg")
                    {
                        $delete = "DELETE FROM productes_botiga WHERE id_producte =" . $id;
                        if(mysqli_query($conn, $delete))
                        {
                            header("Location: ../../profile_visites_admin.php");
                        }
                        else
                        {
                            header("Location: ../../profile_visites_admin.php?borrar=error");
                        }
                    }
                    else
                    {
                        //en cas de que no sigui not-found.jpg es borrara al fitxer de l'imatge i la fila corresponent a la bbdd.

                        $delete = "DELETE FROM productes_botiga WHERE id_producte =" . $id;
                        if(mysqli_query($conn, $delete))
                        {
                            $success = unlink("../../images/img_visites/" . $img_visita);
                            header("Location: ../../profile_visites_admin.php");
                        }
                        else
                        {
                            header("Location: ../../profile_visites_admin.php?borrar=error");
                        }
                    }
                }
                else
                {
                    //es cas de no trobarse el fitxer pero esta l'informacio a la bbdd es borra l'informacio de la bbdd.
                    $delete = "DELETE FROM productes_botiga WHERE id_producte =" . $id;
                        if(mysqli_query($conn, $delete))
                        {
                            header("Location: ../../profile_visites_admin.php");
                        }
                        else
                        {
                            header("Location: ../../profile_visites_admin.php?borrar=error");
                        }
                }

            }
            else
            {
                header("Location: ../../index.php");
            }			
		}
        elseif(isset($_GET["add"]) && !empty($_GET["add"]))
        {
            //es comprova que la variable add existeix i no esta buida.
            //es comprova que l'usuari que fara l'accio existeix i es l'administrador.
            if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "Administrador")
            {
                //es comprova totes les dades del formulari arribades via post aquest fitxer si existeixen i estan plenas.
                if(isset($_POST["nom_visita"], $_POST["preu"], $_POST["idioma"], $_POST["places_totals"], $_POST["durada"], $_POST["punt_trobada"], $_POST["latitud"], $_POST["longitud"], $_POST["dia_visita"], $_POST["intro"], $_POST["desc"]))
                {
                    if(!empty($_POST["nom_visita"]) || !empty($_POST["preu"]) || !empty($_POST["idioma"]) || !empty($_POST["places_totals"]) || !empty($_POST["durada"]) || !empty($_POST["punt_trobada"]) || !empty($_POST["latitud"]) || !empty($_POST["longitud"]) || !empty($_POST["dia_visita"]) || !empty($_POST["intro"]) || !empty($_POST["desc"]))
                    {
                        //es pasen les dades del post a una varible.
                        $nom_visita = $_POST["nom_visita"];
                        $preu = $_POST["preu"];
                        $idioma = $_POST["idioma"];
                        $places_totals = $_POST["places_totals"];
                        $durada = $_POST["durada"];
                        $punt_trobada = $_POST["punt_trobada"];
                        $latitud = $_POST["latitud"];
                        $longitud = $_POST["longitud"];
                        $dia_visita = $_POST["dia_visita"];
                        $intro = $_POST["intro"];
                        $desc = $_POST["desc"];

                        //es comprova si el fitxer existex
                        if(isset($_FILES['fitxer']))
                        {
                            //si existeiz es mira si esta buit.
                            if(!empty($_FILES['fitxer']['name']))
                            {
                                $filename = $_FILES['fitxer']['name'];
                                //si aquest fitxer ja es present a l'arxiu, img_visites mostra error.
                                if (file_exists("../../images/img_visites/" . $filename))
                                {
                                    header("Location: ../../profile_add_visites.php?fitxer=existeix");
                                } 
                                else
                                {
                                    //si no existeix es trasllada l'imatge al fitxer img_visites.
                                    move_uploaded_file($_FILES["fitxer"]["tmp_name"], "../../images/img_visites/" . $filename);
                                    
                                    //i s'inserta a la bbdd l'informacio a la nova visita proposada.
                                    $insert = "INSERT INTO `productes_botiga` (`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`) 
                                    VALUES (\""  . $nom_visita . "\", \"" . $intro  . "\", \"" . $desc . "\", \"" . $filename . "\", \"" . $preu . "\", \"" . $places_totals .  "\" , \"" . $dia_visita .  "\", \"" . $idioma .  "\", \"" . $durada .  "\", \"" . $punt_trobada .  "\", \"" . $latitud .  "\", \"" . $longitud .  "\");";

                                    //si l'informacio no s'inserta be es mostra un error.
                                    if(mysqli_query($conn, $insert))
                                    {
                                        header("Location: ../../profile_visites_admin.php");
                                    }
                                    else
                                    {
                                        header("Location: ../../profile_add_visites.php?insert=error");
                                    }
                                }

                            }
                            else
                            {
                                //en cas de no posar fitxer al formulari,  s'inserta la informacio a la bbdd i es posa predefinidament not-found.jpg.
                                $filename = "not-found.jpg";

                                $insert = "INSERT INTO `productes_botiga` (`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`) 
                                VALUES (\""  . $nom_visita . "\", \"" . $intro  . "\", \"" . $desc . "\", \"" . $filename . "\", \"" . $preu . "\", \"" . $places_totals .  "\" , \"" . $dia_visita .  "\", \"" . $idioma .  "\", \"" . $durada .  "\", \"" . $punt_trobada .  "\", \"" . $latitud .  "\", \"" . $longitud .  "\");";

                                if(mysqli_query($conn, $insert))
                                {
                                    header("Location: ../../profile_visites_admin.php");
                                }
                                else
                                {
                                    header("Location: ../../profile_edit_visites.php?insert=error");
                                }
                            }
                        }
                        
                        

                    }
                    else
                    {
                        header("Location: ../../profile_edit_visites.php?error=buit");
                    }
                }
                else
                {
                    header("Location: ../../profile_edit_visites.php?error=error");
                }
            }
            else
            {
                header("Location: ../../index.php");
            }
        }
        elseif(isset($_GET["edit"]) && !empty($_GET["edit"]))
        {
            //es comprova que la variable edit existeix i no esta buida.
            //es comprova que esta registrat i que pertany al rol administrador.
            if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "Administrador")
            {
                //es comprovan totes les dades del formulari si existeixen i si contenen informacio o no
                if(isset($_POST["id_visita"], $_POST["nom_visita"], $_POST["preu"], $_POST["idioma"], $_POST["places_totals"], $_POST["durada"], $_POST["punt_trobada"], $_POST["latitud"], $_POST["longitud"], $_POST["dia_visita"], $_POST["intro"], $_POST["desc"]))
                {
                    if(!empty($_POST["id_visita"]) || !empty($_POST["nom_visita"]) || !empty($_POST["preu"]) || !empty($_POST["idioma"]) || !empty($_POST["places_totals"]) || !empty($_POST["durada"]) || !empty($_POST["punt_trobada"]) || !empty($_POST["latitud"]) || !empty($_POST["longitud"]) || !empty($_POST["dia_visita"]) || !empty($_POST["intro"]) || !empty($_POST["desc"]))
                    {
                        //es pasen l'informacio del formulari a varibles. 
                        $id_visita = $_POST["id_visita"]; 
                        $nom_visita = $_POST["nom_visita"];
                        $preu = $_POST["preu"];
                        $idioma = $_POST["idioma"];
                        $places_totals = $_POST["places_totals"];
                        $durada = $_POST["durada"];
                        $punt_trobada = $_POST["punt_trobada"];
                        $latitud = $_POST["latitud"];
                        $longitud = $_POST["longitud"];
                        $dia_visita = $_POST["dia_visita"];
                        $intro = $_POST["intro"];
                        $desc = $_POST["desc"];

                        //amb mysqli_real_escape_string s'escapa dels caracters especials que i poden a ver a las variables i que poden afectar a la consulta.
                        $nom_visita = mysqli_real_escape_string($conn, $nom_visita);
                        $preu = mysqli_real_escape_string($conn, $preu);
                        $idioma = mysqli_real_escape_string($conn, $idioma);
                        $places_totals = mysqli_real_escape_string($conn, $places_totals);
                        $durada = mysqli_real_escape_string($conn, $durada);
                        $punt_trobada = mysqli_real_escape_string($conn, $punt_trobada);
                        $latitud = mysqli_real_escape_string($conn, $latitud);
                        $longitud = mysqli_real_escape_string($conn, $longitud);
                        $dia_visita = mysqli_real_escape_string($conn, $dia_visita);
                        $intro = mysqli_real_escape_string($conn, $intro);
                        $desc = mysqli_real_escape_string($conn, $desc);

                        //es comprova si el fitxer a afegir existeix
                        if(isset($_FILES['fitxer']))
                        {
                            //es  mira que no estigui buit.
                            if(!empty($_FILES['fitxer']['name']))
                            {
                                //si existeix es llença un missatge d'error
                                $filename = $_FILES['fitxer']['name'];
                                if (file_exists("../../images/img_visites/" . $filename))
                                {
                                    header("Location: ../../profile_edit_visites.php?fitxer=existeix");
                                } 
                                else
                                {
                                    //si no existeix es mou aquest fitxer a la carpeta img_visites.
                                    move_uploaded_file($_FILES["fitxer"]["tmp_name"], "../../images/img_visites/" . $filename);
                                    
                                    //s'actualitza l'informacio.
                                    $update = "UPDATE productes_botiga SET nom_producte = '" . $nom_visita . "', intro_descripcio = '" . $intro . "', descripcio = '" . $desc . "', imatge_visita = '" . $filename . "', preu = '" . $preu . "', places = '" . $places_totals . "', dia_visita = '" . $dia_visita . "', idioma = '" . $idioma . "', durada = '" . $durada . "', punt_trobada = '" . $punt_trobada . "', latitud = '" . $latitud . "', longitud = '" . $longitud . "' WHERE  id_producte = " . $id_visita .  ";"; 

                                    //es comprova que l'insert s'ha realitzar correctament.
                                    if(mysqli_query($conn, $update))
                                    {
                                        header("Location: ../../profile_visites_admin.php");
                                    }
                                    else
                                    {
                                        header("Location: ../../profile_edit_visites.php?id=" . $id_visita . "&insert=error");
                                    }
                                }

                            }
                            else
                            {
                                //si no existeix el fitxer nou es realitza l'insert sense la variable fitxer.
                                $update = "UPDATE productes_botiga SET nom_producte = '" . $nom_visita . "', intro_descripcio = '" . $intro . "', descripcio = '" . $desc . "', preu = '" . $preu . "', places = '" . $places_totals . "', dia_visita = '" . $dia_visita . "', idioma = '" . $idioma . "', durada = '" . $durada . "', punt_trobada = '" . $punt_trobada . "', latitud = '" . $latitud . "', longitud = '" . $longitud . "' WHERE  id_producte = " . $id_visita .  ";"; 

                                if(mysqli_query($conn, $update))
                                {
                                    header("Location: ../../profile_visites_admin.php");
                                }
                                else
                                {
                                    header("Location: ../../profile_edit_visites.php?id=" . $id_visita . "&insert=error");
                                }
                            }
                        }

                    }
                    else
                    {
                        header("Location: ../../profile_edit_visites.php?error=buit");
                    }
                }
                else
                {
                    header("Location: ../../profile_edit_visites.php?error=error");
                }
            }
            else
            {
                header("Location: ../../index.php");
            }
        }
        else
        {
            //sentencia sql on s'obtindra informacio de la taula producte_botiga
            $sql = "SELECT `id_producte`, `nom_producte`, `intro_descripcio`, `imatge_visita`, `preu` FROM `productes_botiga`;";

            //es realitzar la consulta a la bbdd i es guarda a la variable result.
            $result = mysqli_query($conn, $sql);

            //s'introdueix l'informacio obtinguda a la consulta a la variable visita.
            while($row = $result->fetch_assoc())
            {
                $visita[] = $row;
            }
            echo json_encode($visita);
            
        }
        
    }

?>