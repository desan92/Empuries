<?php

include("../bbdd/conexio.php");

$conn = mysqli_connect("localhost", "root", "", "empuries");

//echo $_GET["city"];

$turisme = [];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {

        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];

            $sql = "SELECT * FROM `info_turistica` WHERE id_turisme=" . $id . ";";

            $resultSelectLllocs = mysqli_query($conn, $sql);
            while($row = $resultSelectLllocs->fetch_assoc())
            {
                $turisme = $row;
            }
            echo json_encode($turisme);
        }
        else
        {
            $sql = "SELECT `id_turisme`, `nom_turisme`, `imatge` FROM `info_turistica`;";

            $resultSelectMonuments = mysqli_query($conn, $sql);
            while($row = $resultSelectMonuments->fetch_assoc())
            {
                $turisme[] = $row;
            }
            echo json_encode($turisme);
        }
        
    }

?>