<?php session_start(); ?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emporium</title>
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="shortcut icon" type="image/png" href="images/logo/logo.png"/>
    <link href="fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <style>

        body{
            background-image: url(images/background/cadaques.jpg);
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
            background-repeat: no-repeat;
        } 
        
        div.row{
            margin-right: 0px;
            margin-left: 0px;
        }

        div.container-fluid{
            padding-right: 0px;
            padding-left: 0px;
        }
        .buit_registre{
            color: red;
            font-size: 12px;
            font-family: sans-serif;
        }

        .container_log{
            padding-left: 5%;
            padding-right: 5%;
        }

    </style>
</head>

<body>
<button class="btn animate__animated animate__fadeInRightBig" id="btnTop" onclick="topFunction()">
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/>
        <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/>
      </svg>
    </button>
    <a href="https://api.whatsapp.com/send?phone=+34666666666&text=Hola%21%20Voldria%20m%C3%A9s%20informaci%C3%B3%20sobre%20Emporium" class="whatsapp animate__animated animate__fadeInRightBig" id="whatsapp" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
    </a>
    <?php include('header_footer/header.php'); ?>
<div class = "container_log">
  <div class="recuadre">
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
        <div>
            
        </div>
    </div>
    <?php include('header_footer/footer.php'); ?>
    
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script>
    </script>
</body>
</html>
