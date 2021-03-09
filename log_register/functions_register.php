<?php
//funcio amb la qual es comrpova que no existeixi cap mail o usuari iguals a l'usuari nou que es vol registrar.
function SelectUserMail($mail, $user, $conn)
{
    //sentencia sql
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE username='" . $user . "' OR mail='" . $mail . "';";
    
    //consulta sql.
    $resultSelect = mysqli_query($conn, $select);
    //es contan les files que hi ha de coincidencia a la bbdd.
    $count = mysqli_num_rows($resultSelect);

    return $count;
}

//funcio que insertara el nou usuaria a la bbdd.
function Inserbbdd($nom, $cognom, $mail, $user, $pass, $conn)
{
    //sentencia sql.
    $insert = "INSERT INTO `informacio_usuari`(`nom_usuari`, `cognom_usuari`, `username`, `contrasenya`, `mail`, `creat`, `id_rol`) 
               VALUES (\""  . $nom . "\", \"" . $cognom  . "\", \"" . $user . "\", md5(\"" . $pass  . "\"), \"" . $mail . "\", CURRENT_TIMESTAMP, 2);";
    
    //si s'ha insertat correctament s'enviara a index.php
    if(mysqli_query($conn, $insert))
    {
        header("Location: ../index.php");
    }
    else
    {
        //en cas de no insertar-se correctament error.
        header("Location: ../log.php?registre=error");
    }
}
//funcio que serveix per comprovar si existeix un usuari que coincideixi amb l'username i la contrasenya.
function SelectLog($pass, $user, $conn)
{
    //sentencia sql
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE username='" . $user . "' AND contrasenya=md5('" . $pass . "');";

    //es realitza la consulta la bbdd.
    $resultSelect = mysqli_query($conn, $select);
    //es contant les files que s'han obtingut.
    $count = mysqli_num_rows($resultSelect);

    return $count;
}

//amb aquesta funcio es preten agafar totes les dades de l'usuari que s'esta logejant en aquell moment 
function SelectLogInfo($pass, $user, $conn)
{
    //sentencia sql
    $select = "SELECT * 
               FROM `informacio_usuari` 
               WHERE username='" . $user . "' AND contrasenya=md5('" . $pass . "');";

    //es fara la consulta a la bbdd
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

?>