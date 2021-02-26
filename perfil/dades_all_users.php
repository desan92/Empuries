<?php

include("../bbdd/conexio.php");

$conn = mysqli_connect("localhost", "root", "", "empuries");
$users = [];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {

        if(isset($_GET["all"]))
        {
            $select = "SELECT * 
                    FROM `informacio_usuari`;";

            $result = mysqli_query($conn, $select);
            while($row = $result->fetch_assoc())
            {
                $users[] = $row;
            }
            echo json_encode($users);
        }
        else
        {

        }
    }
    

?>