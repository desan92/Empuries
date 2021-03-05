<?php
//S'inician les sessions.
session_start();

/*
s'obre una connexio al servidor MySQL, es pasan les dades de localhost,
l'usuari, la contrasenya(si en te) i el nom de la bbdd.
*/
$conn = mysqli_connect("localhost", "root", "", "empuries");

//variable que enmagatzemara l'informació rebuda de la consulta a la bbdd.
$allotjament = [];

    //Es compraova que la conexio a la bbdd es correcte.
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        //Es comprova que la variable pasada per url en metode GET ha arribat i no esta buida.
        if(isset($_GET["city"]) && !empty($_GET["city"]))
        {
            //es pasa la variable GET a la variable city.
            $city = $_GET["city"];

            //array que conte totes les ciutats que hi ha a la bbdd amb allotjaments.
            $poblacio = array("Portbou", "Figueres", "La Jonquera", "Cantallops", "Darnius", "Terrades", "Pont de molins",
            "Garriguella", "Peralada", "Avinyonet de Puigventos", "Palau Saverdera", "Castello d'Empuries",
            "Empuriabrava", "Santa Margarita", "Roses", "Cadaques", "Llança", "Sant Pere Pescador", "Albons",
            "L'Escala", "L'Estartit", "Torroella de Montgri", "Casavells", "Gualta", "Fonteta", "Peratallada",
            "Pals", "Begur", "Tamariu", "Llafranc", "Palafrugell", "Palamos", "Sant Antoni de Calonge", "Calonge",
            "Platja d'Aro", "Sant Feliu de Guixols");

            //si esta la variable pasada per GET a l'array es fa la consulta, sino s'envia un error.
            if(in_array($city, $poblacio))
            {
                //consulta a la bbdd sobre els allotjaments per una ciutat.
                $sql = "SELECT * FROM `info_allotjament` WHERE poblacio = \"" . $city . "\";";

                //es realitzar la consulta a la bbdd i es guarda a la variable result.
                $result = mysqli_query($conn, $sql);

                //tota l'informació obtinguda es va pasant a la varible allotjaments a traves del while.
                while($row = $result->fetch_assoc())
                {
                    $allotjament[] = $row;
                }
                //es pasa a json la varibale allotjament.
                echo json_encode($allotjament);
            }
            else
            {
                header("Location: ../allotjaments.php");
            }

        }
        else
        {
            header("Location: ../allotjaments.php");
        }
    }

?>