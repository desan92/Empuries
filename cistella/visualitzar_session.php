<?php

session_start();

/*
    es comprova que existeix la Session cistella i que no esta buida. i es pasa l'informació
    a cistella_compra on es visualitzara, en cas contrari es fa un array buit perque no dongui
    error al sumar el total a front-end.
*/
if(isset($_SESSION["cistella"]) && !empty($_SESSION["cistella"]))
{
    echo json_encode($_SESSION["cistella"]);
}
else
{
    $array = array();
    echo json_encode($array);
}


?>