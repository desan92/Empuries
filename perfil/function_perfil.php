<?php

session_start();

//funcio on es comprovara que el mail i l'usuari no son presents a la bbdd.
function SelectUserMail($mail, $user, $conn)
{
    //sentencia sql
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE username='" . $user . "' OR mail='" . $mail . "';";
    //consulta a la bbdd
    $resultSelect = mysqli_query($conn, $select);
    //es conta el nombre de files seleccionades a la consulta
    $count = mysqli_num_rows($resultSelect);

    return $count;
}

//funcio que comprova que no hi ha cap mail igula a la bbdd.
function SelectMail($mail, $conn)
{
    //sequencia sql
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE mail='" . $mail . "';";
    //consulta a la bbdd.
    $resultSelect = mysqli_query($conn, $select);
    //es contan les files obtingudes de la consutla.
    $count = mysqli_num_rows($resultSelect);

    return $count;
}

//funcio que es realitza per comprovar si hi ha algun usuari que coincideixi amb al nou usuari que es vol posar.
function SelectUser($user, $conn)
{
    //sentencia sql
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE username='" . $user . "';";

    //consulta a la bbdd.
    $resultSelect = mysqli_query($conn, $select);
    //es contaran les files obtingudes de la consulta a la bbdd.
    $count = mysqli_num_rows($resultSelect);

    return $count;
}

//es comprova que hi ha un usuari amb aquest mail i aquesta contrasenya.
function SelectUserMailIguals($mail, $user, $conn)
{
    //sentencia sql
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE username='" . $user . "' AND mail='" . $mail . "';";
    
    //consulta a la bbdd
    $resultSelect = mysqli_query($conn, $select);
    //contaran les files obtingudes a la consulta.
    $count = mysqli_num_rows($resultSelect);

    return $count;
}

//actualitzacio de les dades de l'usuari.
function UpdatePerfil($id, $nom, $cognom, $mail, $user, $conn)
{
    //sentencia sql
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

//funcio on es recullen totes les dades del usuari
function SelectLogInfo($id, $conn)
{
    //sentencia sql
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE id_usuari=" . $id . ";";

    //consulta a la bbdd.
    $resultSelect = mysqli_query($conn, $select);

    //es van posant els elements agafats de la bbdd a la variable data.
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

//funcio per eliminar l'usuari de la bbdd 
function Borrar($id, $conn)
{
    //sentencia sql
    $sql = "DELETE FROM informacio_usuari WHERE id_usuari =" . $id;

    //un cop la consulta sigui correcte s'envia a tancar sessions i a index.
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