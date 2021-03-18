<?php
//conexio a la bbdd
include("conexio.php");

//es pasa tota l'informació que conte el fitxer JSON 
$dades = json_decode(file_get_contents("../JSON/json_allotjament/allotjament.json"));

$dades = json_decode(json_encode($dades), true);

/*
variable on es guardaran las dades pasades del fitxer allotjaments 
i on posteriorment es posaran els valors a l'insert per pasar l'informació a la bbdd.
*/
$variable_insert = "";

//Es crear un objecte per crear la connexio a la bbdd
$conexio = new Connexio();
$conn = $conexio->Conect_bbdd();

//si la connexio es correcte es dura a terme l'insercio.
if($conn)
{
    echo json_encode("Conectat a la bbdd") . "<br>";

    /*
    for on es pasara el contingut del archiu allotjaments i es pasara fila per fila
    les seves varibles si en te o tractades a $variable_insert on posteriorment es pasara
    al values del insert.
    */
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
    //es treu la ultima coma que sobra a $variable_insert.
    $variable_insert = substr($variable_insert, 0, -1);

//part comentada per si s'entra un altre vegada que no es fasi un altre insert a la bbdd.

    $insert = "INSERT INTO `info_allotjament`(`nom_allotjament`, `direccio`, `poblacio`, `telefon`, `web`, `email`, `imatge`) 
               VALUES" . $variable_insert;


//si la query es correcte s'insertara a la bbdd si no es mostrara l'error.
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