<?php
//S'inician les sessions.
session_start();

/*
s'obre una connexio al servidor MySQL, es pasan les dades de localhost,
l'usuari, la contrasenya(si en te) i el nom de la bbdd.
*/

$conn = mysqli_connect("localhost", "emporium", "GLjDh4G6", "db_emporium");

//variable on s'emagatzemara tota l'informacio rebuda de la consulta de la bbdd.
$turisme = [];

    //es comprova que la connexio esta be.
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        //es comprova que arriba la variable get id i que no esta buida. (informacio de un monument especific).
        if(isset($_GET["id"]) && !empty($_GET["id"]))
        {
            $id = $_GET["id"];

            //sentencia sql que es ralitzara a la consulta.
            $sql = "SELECT * FROM `info_turistica` WHERE id_turisme=" . $id . ";";

            //es realitzar la consulta a la bbdd i es guarda a la variable resultSelectLllocs.
            $resultSelectLllocs = mysqli_query($conn, $sql);

            //amb al while s'introdueixen els valors obtinguts de la consulta a la variable turisme.
            while($row = $resultSelectLllocs->fetch_assoc())
            {
                $turisme = $row;
            }
            echo json_encode($turisme);
        }
        elseif (isset($_GET['destacat']) && !empty($_GET['destacat']))
        {
            //es comprova que que la varible destacat existeix i no esta buida.
			$i=0;
			
            //sentencia sql que buscara dos elements aleatoris a la taula info_turistica.
			$link = "SELECT `id_turisme`, `nom_turisme`, `imatge` FROM `info_turistica` ORDER BY RAND()
            LIMIT 2;";

            //es realitzar la consulta a la bbdd i es guarda a la variable result.
			$result = mysqli_query($conn, $link);

            //s'introdueixen les dues files trobades aleatoriament de la bbdd a la variable turisme
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result) AND $i < 2) {
					$i++;
				 $turisme[] = $row;
				}
				echo json_encode($turisme);
			}
        }
        else
        {
            //sentencia sql que buscara id, el nom i l'imatge de tots els elements de la taula info_turistica.
            $sql = "SELECT `id_turisme`, `nom_turisme`, `imatge` FROM `info_turistica`;";

            //es realitzar la consulta a la bbdd i es guarda a la variable result.
            $resultSelectMonuments = mysqli_query($conn, $sql);

            //amb al while s'introdueixen els valors obtinguts de la consulta a la variable turisme.
            while($row = $resultSelectMonuments->fetch_assoc())
            {
                $turisme[] = $row;
            }
            echo json_encode($turisme);
        }
        
    }

?>