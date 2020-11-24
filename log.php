<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link href="fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .buit_registre{
            color: red;
            font-size: 12px;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
    <div class="row">
           <div class="col">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                  <div class="p-4" style="background-color: navy;">
                    <div class="row">
                    <div class="col-4" id="col1collapse">
                        <div class="div_img"><img src="images/sidebar_foto/1.jpg"></div>
                        <?php
                        session_start();
                        if(isset($_SESSION["user"]) && !empty($_SESSION["user"]))
                        {
                            echo "<div class='user'><a href='#'>&nbsp &nbsp" . $_SESSION["user"] . "</a></div>";
                            echo "<div class='user'><a href='log_register/session_log.php'> &times; &nbsp Sortir</a></div>";
                            //echo "<p>" .$_SESSION['rol'] . "</p>";
                        }
                        ?>
                    </div>
                    <div class="col-8">
                        <div class="llista">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#">Historia</a></li>
                                <li><a href="monuments.php">Llocs turistics</a></li>
                                <li><a href="#">Visitas guiades</a></li>
                                <li><a href="allotjaments.php">Allotjaments</a></li>
                                <li><a href="about_us.php">About us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                  </div>
                </div>
                <nav class="navbar" style="background-color: navy;">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-list text-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg></span>
                  </button>
                  <a class="navbar-brand text-light" href="index.php">
                    <span class="ml-4" id="title-header">EMPURIES</span></a> 
                    <a href="log.php" class=" navbar-toggler" type="button">
                        <span class="text-ligh"><svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-person- text-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                        </svg></span>
                    </a>
                </nav>
              </div>
           </div>
       </div>
       <div class = "container recuadre">
      <div class = "row">
      <span class="col-12" id="titollog">EMPURIES</span>
      <p class="col-12" id="subtitollog">Per iniciar sessió, introduiex les teves dades.</p>
        <form id="form_registre" action="log_register/login.php" method="POST">
            <div class= "row">
                <div class="form-group justify-content-center m-auto">
                    <div class="col">
                        <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="username" name="username" placeholder="Nom d'usuari">
                    </div>
                    </div>
                </div>
            </div>
            <div class = "row">
            <div class="form-group row justify-content-center m-auto">
                <div class="col">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control"  id="password" name="password" placeholder="Contrasenya">
                    </div>
                </div>
            </div>
            </div>
            <!--<p>error</p>-->
            <?php 
                        if(isset($_GET["login"]) && !empty($_GET["login"] == "notrobat"))
                        {
                            echo "<p class='buit_registre'>Error, usuari no trobat</p>";
                        }
                        elseif(isset($_GET["login"]) && !empty($_GET["login"] == "error"))
                        {
                            echo "<p class='buit_registre'>Error, l'usuari o la contraseña estan buides</p>";
                        }
                         ?>
                         <div class="row">
                        <div class="form-grouprow justify-content-center m-auto">
                            <div>
                                <input type="submit" value="Login" class="btn btn_log">
                            </div>
                        </div>
                        </div><br>
                        <span style="color:black"> No tens conta? </span> <a href="registre.php"> Registra't (clic aquí) </a>
            </form>
            
        </div>
    </div>
    
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
