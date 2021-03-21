<?php session_start(); 

if(isset($_SESSION["rol"]) && !empty($_SESSION["rol"]))
{
    header("Location: index.php");
}

?>
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
    <!--header de la pagina-->
    <?php include('header_footer/header.php'); ?>
<div class = "container container_log">
  <div class="recuadre">
    <div class = "row">
      <span class="col-12" id="titollog" style="color: navy;">EMPORIUM</span>
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
            <?php 
            /**
             * missatges d'errors si al buscar l'user introduit no s'ha trobat
             * si la contraseña es incorrecta.
             */
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
                </div><br><!--a href que enviara a registre-->
                <span style="color:black"> No tens conta? </span> <a href="registre.php"> Registra't (clic aquí) </a>
            </form>
            
        </div>
        </div>
        <div>
            
        </div>
    </div>
    <!--footer de la pagina-->
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
