<?php
    //s'inician la session
    session_start();
    //include("../bbdd/conexio.php");

    /*
        s'obre una connexio al servidor MySQL, es pasan les dades de localhost,
        l'usuari, la contrasenya(si en te) i el nom de la bbdd.
    */
    $conn = mysqli_connect("localhost", "emporium", "GLjDh4G6", "db_emporium");

    //variable on es guardara l'informació del producte de la bbdd.
    $producte = [];

    //Es comprova que la conexio a la bbdd es correcte.
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        /*
            Es comprova si existeix la session rol, per identificar si l'usuari esta registrat
            si aquest esta variable existeix, no esta plena i es client es dura a terme la creacio
            de la session cistella.
        */
        if(isset($_SESSION["rol"]))
        {
            if(!empty($_SESSION["rol"] && $_SESSION["rol"] == "Client"))
            { 
                //es comprova si existeix cistella si no es crea la session.
                if(isset($_SESSION["cistella"]))
                {
                    //es comprovan que las dades pasades en metode post existeixen i estan plenas.
                    if(isset($_POST["id"], $_POST["quantitat"]) && !empty($_POST["id"]) && !empty($_POST["quantitat"]))
                    {
                        //pas a variables els POST arribats.
                        $id = $_POST["id"];
                        $quantitat = $_POST["quantitat"];

                        //consulta per obtenir dades del producte.
                        $sql = "SELECT nom_producte, imatge_visita, preu, places FROM `productes_botiga` WHERE id_producte=" . $id . ";";

                        //es realitza la consulta a la bbdd.
                        $result = mysqli_query($conn, $sql);

                        //tota l'informació obtinguda es va pasant a la varible producte a traves del while.
                        while($row = $result->fetch_assoc())
                        {
                            $producte = $row;
                        }

                        $nom = $producte["nom_producte"];
                        $imatge = $producte["imatge_visita"];
                        $preu = $producte["preu"];
                        $places_restants = $producte["places"];

                        //es comprova la longitud de l'array $_SESSION["cistella"].
                        $longitud = count($_SESSION["cistella"]);

                        //variable per comprovar si s'ha trobat el nou producte que es vol introduir al for.
                        $validar = false;

                        /*
                            for per buscar si el producte que es vol introduir existeix i actualitzar la quantitat i el total_preu d'aquest
                        */
                        for($i=0; $i < $longitud; $i++)
                        {
                            //es mira si coincideix l'id actual del array amb l'id passat per POST.
                            if($_SESSION["cistella"][$i]["id"] == $id)
                            {
                                /*
                                    si es troba es suma la quantitat pasada amb POST amb la quantitat que hi ha 
                                    al array cistella. I es comprova amb al valor obtingut de la base de dades
                                    de places ofertades. Si places_restants es mes gran a la quantitat que es vol
                                    afegir. S'introduiex la nova quantitat i el nou total_producte.
                                */
                                $quantitat_total = $quantitat + $_SESSION["cistella"][$i]["quantitat"];
                                if($places_restants >= $quantitat_total)
                                {
                                    $_SESSION["cistella"][$i]["quantitat"] = $_SESSION["cistella"][$i]["quantitat"] + $quantitat;
                                    $total = $_SESSION["cistella"][$i]["quantitat"] * $_SESSION["cistella"][$i]["preu"];
                                    $_SESSION["cistella"][$i]["total_producte"] = $total;
                                    header("Location:../cistella_compra.php");
                                }
                                else
                                {
                                    header("Location:../info_visita.php?id=". $id ."&quantitat=error");
                                }
                                //en cas de trobar el producte a l'array es pasa el seu valor a true.
                                $validar = true;
                            }
                        }

                        /*
                            si no s'ha trobat a l'array vol dir que es un producte nou que
                            es vol afegir a la cistella. Es comparan les places de la bbdd
                            amb la quantitat que es vol afegir del producte. Si aquesta quantitat
                            es menor a places ofertades es guardara la informacio d'aquest
                            producte a la session cistella.

                        */
                        if($validar == false)
                        {
                            if($places_restants >= $quantitat)
                            {
                                $total = $quantitat * $preu;
                                $visita = array("id" => $id, "nom" => $nom, "imatge" => $imatge, "quantitat" => $quantitat, "preu" => $preu, "total_producte" => $total);
                                $_SESSION["cistella"][] = $visita;
                                var_dump($_SESSION["cistella"]);
                                header("Location:../cistella_compra.php");
                            }
                            else
                            {
                                //var_dump($_SESSION["cistella"]);
                                header("Location:../info_visita.php?id=". $id ."&quantitat=error");
                            }
                        }
                    }
                    elseif(isset($_GET["add"], $_GET["id"]) && !empty($_GET["add"]) && !empty($_GET["id"]))
                    { 
                        //si es vol afegir un element a l'array, es comprova si ha arribat add i id.

                        $id = $_GET["id"];

                        //consulta per obtenir dades del producte.
                        $sql = "SELECT places FROM `productes_botiga` WHERE id_producte=" . $id . ";";

                            //es realitza la consulta a la bbdd.
                            $result = mysqli_query($conn, $sql);

                            //tota l'informació obtinguda es va pasant a la varible producte a traves del while.
                            while($row = $result->fetch_assoc())
                            {
                                $producte = $row;
                            }
                            
                            $places_restants = $producte["places"];

                        //es comprova el nombre d'elements de l'array.
                        $longitud = count($_SESSION["cistella"]);
                        
                        /*
                            es realitza aquest for per buscar el producte per afegir-li una unitat.
                        */
                        for($i=0; $i < $longitud; $i++)
                        {
                            if($_SESSION["cistella"][$i]["id"] == $id)
                            {
                                /*
                                    si es troba es suma una unitat a la quantitat que hi ha 
                                    al array cistella. I es comprova amb al valor obtingut de la base de dades
                                    de places ofertades. Si places_restants es mes gran a la quantitat que es vol
                                    afegir. S'introduiex la nova quantitat i el nou total_producte.
                                */
                                $quantitat_total = $_SESSION["cistella"][$i]["quantitat"] + 1;
                                if($places_restants >= $quantitat_total)
                                {
                                    $_SESSION["cistella"][$i]["quantitat"]++;
                                    $total = $_SESSION["cistella"][$i]["quantitat"] * $_SESSION["cistella"][$i]["preu"];
                                    $_SESSION["cistella"][$i]["total_producte"] = $total;

                                    header("Location:../cistella_compra.php");
                                }
                                else
                                {

                                    header("Location:../cistella_compra.php?quantitat=erro");
                                }
                                
                            }
                        }
                        
                        header("Location: ../cistella_compra.php");
                    }
                    elseif(isset($_GET["substract"], $_GET["id"]) && !empty($_GET["substract"]) && !empty($_GET["id"]))
                    {
                         //si es vol treure un element a l'array, es comprova si ha arribat add i id.

                        $id = $_GET["id"];

                        //consulta per obtenir el valor de places del producte.
                        $sql = "SELECT places FROM `productes_botiga` WHERE id_producte=" . $id . ";";

                            //consulta a la bbdd
                            $result = mysqli_query($conn, $sql);

                            //tota l'informació obtinguda es va pasant a la varible producte a traves del while.
                            while($row = $result->fetch_assoc())
                            {
                                $producte = $row;
                            }
                            //var_dump($producte);
                            $places_restants = $producte["places"];

                        //es comprova el nombre d'elements de l'array.
                        $longitud = count($_SESSION["cistella"]);

                        /*
                            es realitza aquest for per buscar el producte per afegir-li una unitat.
                        */
                        for($i=0; $i < $longitud; $i++)
                        {
                            /*
                                si es troba es resta una unitat a la quantitat que hi ha 
                                al array cistella. I es comprova que la quantitat que es vol introduir 
                                es mes gran a 0. Si aquest es major es resta un element, en cas contrari
                                s'elimina el producte de l'array.
                            */
                            if($_SESSION["cistella"][$i]["id"] == $id)
                            {
                                $quantitat_total = $_SESSION["cistella"][$i]["quantitat"] - 1;
                                if($places_restants >= $quantitat_total)
                                {
                                    if($quantitat_total > 0)
                                    {
                                        $_SESSION["cistella"][$i]["quantitat"]--;
                                        $total = $_SESSION["cistella"][$i]["quantitat"] * $_SESSION["cistella"][$i]["preu"];
                                        $_SESSION["cistella"][$i]["total_producte"] = $total;
                                        var_dump($_SESSION["cistella"]);
                                        header("Location:../cistella_compra.php");
                                    }
                                    else
                                    {
                                        array_splice($_SESSION["cistella"], $i, 1);
                                        header("Location:../cistella_compra.php");
                                    }
                                }
                                else
                                {
                                    var_dump($_SESSION["cistella"]);
                                    header("Location:../cistella_compra.php?quantitat=erro");
                                }
                                
                            }
                        }
                        
                        header("Location: ../cistella_compra.php");
                    }
                    else if(isset($_GET["item"]) && !empty($_GET["item"]))
                    {
                        //es comprova que l'item que arriba per metode GET existeixi i no estigui buit.
                        $producte_eliminar = $_GET["item"];

                        //es comprova el nombre d'elements de l'array.
                        $longitud = count($_SESSION["cistella"]);

                        //es busca l'element al array per el seu id. Si es troba s'elimina de la cistella.
                        for($i=0; $i < $longitud; $i++)
                        {
                            if($_SESSION["cistella"][$i]["id"] == $_GET["item"])
                            {
                                array_splice($_SESSION["cistella"], $i, 1);
                            }
                        }

                        header("Location: ../cistella_compra.php");
                    }
                    elseif(isset($_GET["all_items"]) && !empty($_GET["all_items"]))
                    {
                        /*
                        es comprova que all_items arriba per metode GET i es mira si esta ple.
                        Un cop comprovat es dur a terme l'eliminació de tots els elements de l'array.
                        */
                        unset($_SESSION["cistella"]);
                        header("Location: ../cistella_compra.php");
                    }
                    else
                    {
                        header("Location: ../index.php");
                    }
                    

                }
                else
                {
                    //es comprova que ha arribat tant l'id com la quantitat del producte que es vol afegir al array.
                    if(isset($_POST["id"], $_POST["quantitat"]) && !empty($_POST["id"]) && !empty($_POST["quantitat"]))
                    {
                        $id = $_POST["id"];
                        $quantitat = $_POST["quantitat"];

                        //select on es buscara l'informació del producte a la bbdd.
                        $sql = "SELECT nom_producte, imatge_visita, preu, places FROM `productes_botiga` WHERE id_producte=" . $id . ";";

                        //consulta a la bbdd
                        $result = mysqli_query($conn, $sql);

                        //es pasen les dades que s'han obtingut a la variable producte
                        while($row = $result->fetch_assoc())
                        {
                            $producte = $row;
                        }

                        $nom = $producte["nom_producte"];
                        $imatge = $producte["imatge_visita"];
                        $preu = $producte["preu"];
                        $places_restants = $producte["places"];

                        /*
                        es comprova la quantitat que es vol afegir del producte amb al nombre de places.
                        Si es major el nombre de places que hi ha a la bbdd es crea l'array cistella amb tots 
                        elements informatius del producte.
                        */
                        if($places_restants >= $quantitat)
                        {
                            $total = $quantitat * $preu;
                            $visita = array("id" => $id, "nom" => $nom, "imatge" => $imatge, "quantitat" => $quantitat, "preu" => $preu, "total_producte" => $total);
                            $_SESSION["cistella"][] = $visita;

                            header("Location:../cistella_compra.php");
                        }
                        else
                        {
                            header("Location:../info_visita.php?id=". $id ."&quantitat=error");
                        }

                    }
                    else
                    {
                        header("Location:../info_visita.php");
                    }
                }
            }
            else
            {
                header("Location: ../index.php");
            }
        }
        else
        {
            header("Location: ../log.php");
        }
    }


?>