<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "empuries");

$comandes = [];
$item_comandes = [];
$comandes_producte = [];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {

        if(isset($_SESSION["rol"], $_SESSION["id"]) && $_SESSION["rol"] && $_SESSION["id"])
        {
            $id_usuari = $_SESSION["id"];

            if(isset($_GET["comandes"]) && !empty($_GET["comandes"]))
            {

                $select_comandes_realitzades = "SELECT * FROM comanda WHERE id_usuari = " . $id_usuari . ";";

                $result = mysqli_query($conn, $select_comandes_realitzades);
                while($row = $result->fetch_assoc())
                {
                    $comandes[] = $row;
                }
                echo json_encode($comandes);
            }
            elseif(isset($_GET["items_comandes"]) && !empty($_GET["items_comandes"]))
            {
                $select_comandes_realitzades = "SELECT `p1`.imatge_visita, `c1`.*, `u1`.`username`, `d1`.*
                FROM `comanda` c1
                LEFT JOIN `informacio_usuari` u1 ON `c1`.`id_usuari` = `u1`.`id_usuari`
                LEFT JOIN `detalls_comanda` d1 ON `c1`.`id_comanda` = `d1`.`id_comanda`
                LEFT JOIN `productes_botiga` p1 ON `d1`.`id_producte` = `p1`.`id_producte`
                WHERE c1.id_usuari = " . $id_usuari . ";";

                $result = mysqli_query($conn, $select_comandes_realitzades);
                while($row = $result->fetch_assoc())
                {
                    $comandes[] = $row;
                }
                echo json_encode($comandes);
            }
            elseif(isset($_GET["comandes_visita"]) && !empty($_GET["comandes_visita"]))
            {
                $id_producte = $_GET["comandes_visita"];

                if($_SESSION["rol"] == "Administrador")
                {
                    $select_comandes_realitzades = "SELECT dc1.*, c1.*, u1.mail, u1.nom_usuari, u1.cognom_usuari
                    FROM detalls_comanda dc1
                    LEFT JOIN productes_botiga p1 ON dc1.id_producte = p1.id_producte
                    LEFT JOIN comanda c1 ON dc1.id_comanda = c1.id_comanda
                    LEFT JOIN informacio_usuari u1 ON c1.id_usuari = u1.id_usuari
                    WHERE dc1.id_producte = " . $id_producte . ";";

                    $result = mysqli_query($conn, $select_comandes_realitzades);
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