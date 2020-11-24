<?php

include("conexio.php");

$dades = json_decode(file_get_contents("../json_allotjament/allotjament.json"));

$dades = json_decode(json_encode($dades), true);
//print_r($dades);

$variable_insert = "";

$conexio = new Connexio();
$conn = $conexio->Conect_bbdd();

if($conn)
{
    echo json_encode("Conectat a la bbdd") . "<br>";

    for($i = 0; $i<sizeof($dades); $i++)
    {
        $nom = $dades[$i]["Nom"];
        $direccio = $dades[$i]["Direccio"];
        $poblacio = $dades[$i]["Poblacio"];
        $telefon = $dades[$i]["Telefon"];
        $web = $dades[$i]["web"];
        $mail = $dades[$i]["mail"];
        $imatge = $dades[$i]["imatge"];

        if($nom == ""){ $nom = "No em trobat informacio del nom.";}
        if($direccio == ""){ $direccio = "No em trobat informacio de la direccio.";}
        if($poblacio == ""){ $poblacio = "No em trobat informacio de la poblacio.";}
        if($telefon == ""){ $telefon = "No em trobat informacio del telefon.";}
        if($mail == ""){ $mail = "No em trobat informacio de l'email.";}
        if($imatge == ""){ $imatge = "not-found.png";}

        $variable_insert = $variable_insert . "(\"$nom\", \"$direccio\", \"$poblacio\", $telefon, \"$web\",
                                                \"$mail\", \"$imatge\"),";
    }
    $variable_insert = substr($variable_insert, 0, -1);
/*
    $insert = "INSERT INTO `info_allotjament`(`nom_allotjament`, `direccio`, `poblacio`, `telefon`, `web`, `email`, `imatge`) 
               VALUES" . $variable_insert;
*/

    if (mysqli_query($conn, $insert)) 
    {
        echo "Ok, Insert  is in bbdd";
    } 
    else 
    {
        echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }
}
else
{
    die(json_encode("Connection failed: " . mysqli_connect_error()));
}




?>