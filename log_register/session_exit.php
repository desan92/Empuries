<?php
//pagina per destruir les sessions que s'han generat.
session_start();

session_unset();

session_destroy();

header("location: ../index.php");

?>