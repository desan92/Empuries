<?php

function SelectUserMail($mail, $user, $conn)
{
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE username='" . $user . "' OR mail='" . $mail . "';";
    $resultSelect = mysqli_query($conn, $select);
    $count = mysqli_num_rows($resultSelect);

    return $count;
}

function Inserbbdd($nom, $cognom, $mail, $user, $pass, $conn)
{
    $insert = "INSERT INTO `informacio_usuari`(`nom_usuari`, `cognom_usuari`, `username`, `contrasenya`, `mail`, `creat`, `id_rol`) 
               VALUES (\""  . $nom . "\", \"" . $cognom  . "\", \"" . $user . "\", md5(\"" . $pass  . "\"), \"" . $mail . "\", CURRENT_TIMESTAMP, 2);";
    
    if(mysqli_query($conn, $insert))
    {
        header("Location: ../index.php");
    }
    else
    {
        header("Location: ../log.php?registre=error");
    }
}

function SelectLog($pass, $user, $conn)
{
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE username='" . $user . "' AND contrasenya=md5('" . $pass . "');";

    $resultSelect = mysqli_query($conn, $select);
    $count = mysqli_num_rows($resultSelect);

    return $count;
}

function SelectLogInfo($pass, $user, $conn)
{
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE username='" . $user . "' AND contrasenya=md5('" . $pass . "');";

    $resultSelect = mysqli_query($conn, $select);

    if($row = mysqli_fetch_array($resultSelect, MYSQLI_BOTH))
    {
        do{
            $data[] = $row;
        }
        while($row = mysqli_fetch_array($resultSelect, MYSQLI_BOTH));
    }
    else
    {
        $data = null;
    }

    mysqli_free_result($resultSelect);
    return ($data);
}

/*function Selectrol($user, $conn)
{
    $select= "SELECT informacio_usuari.id_rol, rols_usuari.tipus_rol AS tipus_rol
    FROM `informacio_usuari`, `rols_usuari` 
    WHERE informacio_usuari.username = '" . $user . "' AND informacio_usuari.id_rol = rols_usuari.id_rol";
    
    $resultSelect = mysqli_query($conn, $select);
    while($row = $resultSelect->fetch_assoc())
    {
        $tipus_rol = $row['tipus_rol']; 
    }
    //echo $tipus_rol;
    return $tipus_rol;
}*/

?>