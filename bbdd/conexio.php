<?php

Class Connexio{
       
    private $localhost = "localhost";
    private $user = "root";
    private $pass = "";
    private $bbdd = "empuries";
    
    public function Conect_bbdd(){
        $conn=mysqli_connect($this->localhost, $this->user, $this->pass, $this->bbdd);
    
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