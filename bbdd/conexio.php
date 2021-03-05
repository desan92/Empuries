<?php

Class Connexio{
       
    //variables on es pasen les dades a la bbdd.
    private $localhost = "localhost";
    private $user = "root";
    private $pass = "";
    private $bbdd = "empuries";
    
    public function Conect_bbdd(){
        //es pasen les variables anteriors a la variable conn per posteriorment connectarse a la bbdd.
        $conn=mysqli_connect($this->localhost, $this->user, $this->pass, $this->bbdd);
    
        //si la connexio es correcte mostrara Conectat a la bbdd sino error.
        if($conn)
        {
            echo json_encode("Conectat a la bbdd") . "<br>";
        }
        else
        {
            die(json_encode("Connection failed: " . mysqli_connect_error()));
        }

        return $conn;
    }
    
}

?>