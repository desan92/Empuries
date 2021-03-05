<?php
    //s'inicia la session
    session_start();
    //include("../bbdd/conexio.php");

    /*
        s'obre una connexio al servidor MySQL, es pasan les dades de localhost,
        l'usuari, la contrasenya(si en te) i el nom de la bbdd.
    */
    $conn = mysqli_connect("localhost", "root", "", "empuries");

    //variable on es guardara l'inforamció de la comanda.
    $comanda = [];

    //es comprova si la connexio es correcte.
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        //es comprova que existeix un usuari registrat i que pertany a client.
        if(isset($_SESSION["rol"], $_SESSION["id"]))
        {
            if(!empty($_SESSION["rol"] && $_SESSION["rol"] == "Client" && !empty($_SESSION["id"])))
            { 
                $id = $_SESSION["id"];

                //es comprova la variable pagament si existeix, esta plena i conte accept.
                if(isset($_GET["payment"]) && !empty($_GET["payment"]) && $_GET["payment"] == "accept")
                {
                    //es comrpo que existeix cistella i es calcula el total de compra.
                    if(isset($_SESSION["cistella"]))
                    {
                        foreach($_SESSION["cistella"] as $index => $array)
                        {
                            $total_compra += $array["quantitat"] * $array["preu"];
                        }
                    }
                    else
                    {
                        header("Location: ../cistella_compra.php");
                    }

                    //es crea un insert de comanda
                    $insert_comanda = "INSERT INTO `comanda` (`status_comanda`, `preu_final`, `id_usuari`) 
                    VALUES ('COMPLETED', \"" . $total_compra .  "\", \"" . $id .  "\");";

                    //es realitza l'insert a la bbdd a la taula comanda.                    
                    if(mysqli_query($conn, $insert_comanda))
                    {   
                        // es busca a la taula comanda l'id_comanda que s'acaba de realitzar.
                        $sql = "SELECT id_comanda FROM comanda WHERE id_usuari =" . $id . " AND `data_comanda` = (SELECT MAX(`data_comanda`) from comanda);";
                        
                        $result = mysqli_query($conn, $sql);
                        while($row = $result->fetch_assoc())
                        {
                            $comanda = $row;
                        }

                        var_dump($comanda);
                        echo $comanda["id_comanda"];

                        $longitud = count($_SESSION["cistella"]);

                        /*
                            es pasan en el for les dades que s'insertaran a la taula detalls_comanda
                            a la variable $variable_insert 
                        */
                        for($i=0; $i < $longitud; $i++)
                        {
                            $nom_producte = $_SESSION["cistella"][$i]["nom"];
                            $preu_producte = $_SESSION["cistella"][$i]["preu"];
                            $preu_total_producte = $_SESSION["cistella"][$i]["total_producte"];
                            $quantitat_producte = $_SESSION["cistella"][$i]["quantitat"];
                            $id_producte = $_SESSION["cistella"][$i]["id"];
                            $id_comanda = $comanda["id_comanda"];

                            $variable_insert = $variable_insert . "(\"$nom_producte\", $preu_producte, $preu_total_producte,
                                                            $quantitat_producte, $id_producte, $id_comanda),";
        
                            
                        }
                        //es treu la coma restant.
                        $variable_insert = substr($variable_insert, 0, -1);
                        echo $variable_insert;

                        //es crea l'insert de detalls_comanda.
                        $insert = "INSERT INTO `detalls_comanda`(`nom_producte`, `preu_producte`, `preu_total_producte`, 
                                    `quantitat_producte`, `id_producte`, `id_comanda`) VALUES" . $variable_insert;
                        
                        //es comprova que s'hagui realitzat l'insert correctament, es borra la session cistella i s'envia al perfil.
                        if (mysqli_query($conn, $insert)) 
                        {
                            unset($_SESSION["cistella"]);
                            header("Location: ../profile_client.php");

                            //apartir del trigger que hi ha a info.sql s'actulitza la taula productes_botiga columna places.(si sha fet l'insert a detalls_comanda)
                        } 
                        else 
                        {
                            header("Location: ../profile_edit_visites.php?insert=errorcomanda");
                        }
                    }
                    else
                    {  
                        header("Location: ../profile_edit_visites.php?insert=errorcomanda");
                    }

                    
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
        }
        else
        {
            header("Location: ../index.php");
        }
    }

?>