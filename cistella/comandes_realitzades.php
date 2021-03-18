<?php
//s'inicia la session
session_start();


    /*
        s'obre una connexio al servidor MySQL, es pasan les dades de localhost,
        l'usuari, la contrasenya(si en te) i el nom de la bbdd.
    */
    $conn = mysqli_connect("localhost", "emporium", "GLjDh4G6", "db_emporium");

//variables on es guardaran les dades obtingudes de la bbdd.
    $comandes = [];
    $item_comandes = [];
    $comandes_producte = [];

    //Es comprova que la conexio a la bbdd es correcte.
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        //es comprova que existeix rol e id del usuari registrat.
        if(isset($_SESSION["rol"], $_SESSION["id"]) && $_SESSION["rol"] && $_SESSION["id"])
        {
            $id_usuari = $_SESSION["id"];

            //es comprova que arriba la variable comandes per get.
            if(isset($_GET["comandes"]) && !empty($_GET["comandes"]))
            {
                //consulta per obtenir les dades de les comandes realitzades per usuari.
                $select_comandes_realitzades = "SELECT * FROM comanda WHERE id_usuari = " . $id_usuari . ";";

                //consulta a la bbdd
                $result = mysqli_query($conn, $select_comandes_realitzades);

                //tota l'informació obtinguda es va pasant a la varible comandes a traves del while.
                while($row = $result->fetch_assoc())
                {
                    $comandes[] = $row;
                }
                echo json_encode($comandes);
            }
            elseif(isset($_GET["items_comandes"]) && !empty($_GET["items_comandes"]))
            {
                //es comprova que existeix i no estaa buida la varible items_comandes.

                //consulta per obtenir tots els detalls de comanda relacionats amb un usuari
                $select_comandes_realitzades = "SELECT `p1`.imatge_visita, `c1`.*, `u1`.`username`, `d1`.*
                FROM `comanda` c1
                LEFT JOIN `informacio_usuari` u1 ON `c1`.`id_usuari` = `u1`.`id_usuari`
                LEFT JOIN `detalls_comanda` d1 ON `c1`.`id_comanda` = `d1`.`id_comanda`
                LEFT JOIN `productes_botiga` p1 ON `d1`.`id_producte` = `p1`.`id_producte`
                WHERE c1.id_usuari = " . $id_usuari . ";";

                //consulta a la bbdd
                $result = mysqli_query($conn, $select_comandes_realitzades);

                //tota l'informació obtinguda es va pasant a la varible item_comandes a traves del while.
                while($row = $result->fetch_assoc())
                {
                    $item_comandes[] = $row;
                }
                echo json_encode($item_comandes);
            }
            elseif(isset($_GET["comandes_visita"]) && !empty($_GET["comandes_visita"]))
            {
                //es comprova que existeis i no est buida la variable comandes_visita

                $id_producte = $_GET["comandes_visita"];

                //es comprova que l'usari sigui administrador.
                if($_SESSION["rol"] == "Administrador")
                {
                    //select per obtenir totes les comandes realitzades per producte
                    $select_comandes_realitzades = "SELECT dc1.*, c1.*, u1.mail, u1.nom_usuari, u1.cognom_usuari
                    FROM detalls_comanda dc1
                    LEFT JOIN productes_botiga p1 ON dc1.id_producte = p1.id_producte
                    LEFT JOIN comanda c1 ON dc1.id_comanda = c1.id_comanda
                    LEFT JOIN informacio_usuari u1 ON c1.id_usuari = u1.id_usuari
                    WHERE dc1.id_producte = " . $id_producte . ";";

                    //consulta a la bbdd
                    $result = mysqli_query($conn, $select_comandes_realitzades);

                    //tota l'informació obtinguda es va pasant a la varible item_comandes a traves del while.
                    while($row = $result->fetch_assoc())
                    {
                        $comandes_producte[] = $row;
                    }
                    echo json_encode($comandes_producte);
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