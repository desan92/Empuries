<?php

include("conexio.php");

$dades = json_decode(file_get_contents("../json_info_turistica/informacio_turistica.json"));

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
        $nom = $dades[$i]["nom"];
        $descripcio = $dades[$i]["descripcio"];
        $direccio = $dades[$i]["direccio"];
        $poblacio = $dades[$i]["poblacio"];
        $telefon = $dades[$i]["telefon"];
        $latitud = $dades[$i]["lat"];
        $longitud = $dades[$i]["lng"];
        $horari = $dades[$i]["horari"];
        $preu = $dades[$i]["preu"];
        $web = $dades[$i]["web"];
        $email = $dades[$i]["email"];
        $imatge = $dades[$i]["imatge"];


        if($nom == ""){ $nom = "No em trobat informacio del nom.";}
        if($descripcio == ""){ $descripcio = "No em trobat informacio de la descripcio del lloc.";}
        if($direccio == ""){ $direccio = "No em trobat informacio de la direccio.";}
        if($poblacio == ""){ $poblacio = "No em trobat informacio de la poblacio.";}
        if($telefon == ""){ $telefon = "No em trobat informacio del telefon.";}
        if($horari == ""){ $horari = "No em trobat informacio de l'horari.";}
        if($preu == ""){ $preu = "No em trobat informacio del preu.";}
        if($email == ""){ $email = "No em trobat informacio de l'email.";}
        if($imatge == ""){ $imatge = "not-found.png";}

        $variable_insert = $variable_insert . "(\"$nom\", \"$descripcio\", \"$direccio\", \"$poblacio\", $telefon, \"$latitud\", 
                                                \"$longitud\", \"$horari\", \"$preu\", \"$web\", \"$email\", \"$imatge\"),";
    }
    $variable_insert = substr($variable_insert, 0, -1);
/*
    $insert = "INSERT INTO `info_turistica`(`nom_turisme`, `descripcio`, `direccio`, `poblacio`, `telefon`, `latitud`, `longitud`, `horari`, `preu`, `pagina_web`, `email`, `imatge`) 
               VALUES" . $variable_insert;*/

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