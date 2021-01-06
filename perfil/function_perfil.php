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

function SelectMail($mail, $conn)
{
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE mail='" . $mail . "';";
    $resultSelect = mysqli_query($conn, $select);
    $count = mysqli_num_rows($resultSelect);

    return $count;
}

function SelectUser($user, $conn)
{
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE username='" . $user . "';";
    $resultSelect = mysqli_query($conn, $select);
    $count = mysqli_num_rows($resultSelect);

    return $count;
}

function SelectUserMailIguals($mail, $user, $conn)
{
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE username='" . $user . "' AND mail='" . $mail . "';";
    $resultSelect = mysqli_query($conn, $select);
    $count = mysqli_num_rows($resultSelect);

    return $count;
}

function UpdatePerfil($id, $nom, $cognom, $mail, $user, $conn)
{
    $sql = "UPDATE informacio_usuari 
    SET nom_usuari = '" . $nom . "', cognom_usuari = '" . $cognom . "', username = '" . $user . "' , mail = '" . $mail . "'
    WHERE id_usuari = " . $id;

    if(mysqli_query($conn, $sql))
    {
        //header("Location: ../index.php");
    }
    else
    {
        header("Location: ../log.php?registre=error");
    }
}

function SelectLogInfo($id, $conn)
{
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE id_usuari=" . $id . ";";

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

function Borrar($id, $conn)
{
    $sql = "DELETE FROM informacio_usuari WHERE id_usuari =" . $id;

    if(mysqli_query($conn, $sql))
    {
        header("Location: ../log_register/session_exit.php");
    }
    else
    {
        header("Location: ../profile_client.php?borrar=error");
    }
}

?>