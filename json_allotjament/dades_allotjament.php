<?php
session_start();
include("../bbdd/conexio.php");

$conn = mysqli_connect("localhost", "root", "", "empuries");

//echo $_GET["city"];

$allotjament = [];

if(isset($_GET["city"]) && !empty($_GET["city"]))
{
    //ARRAY CITY
    $city = $_GET["city"];

    $poblacio = array("Portbou", "Figueres", "La Jonquera", "Cantallops", "Darnius", "Terrades", "Pont de molins",
    "Garriguella", "Peralada", "Avinyonet de Puigventos", "Palau Saverdera", "Castello d'Empuries",
    "Empuriabrava", "Santa Margarita", "Roses", "Cadaques", "Llança", "Sant Pere Pescador", "Albons",
    "L'Escala", "L'Estartit", "Torroella de Montgri", "Casavells", "Gualta", "Fonteta", "Peratallada",
    "Pals", "Begur", "Tamariu", "Llafranc", "Palafrugell", "Palamos", "Sant Antoni de Calonge", "Calonge",
    "Platja d'Aro", "Sant Feliu de Guixols");

    if(in_array($city, $poblacio))
    {
        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {

            $sql = "SELECT * FROM `info_allotjament` WHERE poblacio = \"" . $city . "\";";

            $resultInsert = mysqli_query($conn, $sql);
            while($row = $resultInsert->fetch_assoc())
            {
                $allotjament[] = $row;
            }
            echo json_encode($allotjament);
        }
    }
    else
    {
        
    }

}
/*elseif (isset($_GET["eliminarid"])){
            
    $id = $_GET["eliminarid"];
    if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "Administrador")
    {
        $sql = "DELETE FROM info_allotjament WHERE id_allotjament =" . $id;
        if(mysqli_query($conn, $sql))
        {
            header("Location: ../profile_allotjaments_admin.php");
        }
        else
        {
            header("Location: ../profile_allotjaments_admin.php?borrar=error");
        }
    }
    else
    {
        header("Location: ../index.php");//ERROR 404 PAGE
    }			
}
else
{
    $sql = "SELECT * FROM `info_allotjament`;";

    $resultSelectLllocs = mysqli_query($conn, $sql);
    while($row = $resultSelectLllocs->fetch_assoc())
    {
        $allotjament[] = $row;
    }
    echo json_encode($allotjament);
}*/


?>