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
    <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <link rel="stylesheet" href="css/styles.css">
    <style>
    
    body{
        background-image: url(images/background/cadaques.jpg);
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
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

    .container_register{
        padding-left: 5%;
        padding-right: 5%;
    }

    </style>
</head>

<body>
    <!--header de la pagina-->
<?php include('header_footer/header.php'); ?>
<div class = "container_register">
    <div class="recuadre">
      <div class = "row">
      <span class="col-12" id="titolregistre">REGISTRE</span>
        <form id="form_registre" name="registre" action="log_register/register.php" method="POST" onsubmit="return validacioRegistre()">
            <div class = "row">
                <div class="form-group justify-content-center m-auto">
                    <div class="col">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control"  id="nom" name="nom" placeholder="Nom" require>
                        </div>
                    </div>
                </div>
                <div class="form-group justify-content-center m-auto">
                    <div class="col">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control"  id="cognom" name="cognom" placeholder="Cognom" require>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "row">
                <div class="form-group justify-content-center m-auto">
                    <div class="col">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control"  id="username" name="username" placeholder="Nom d'usuari" require>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center m-auto">
                    <div class="col">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="mail" class="form-control" id="mail" name="mail" placeholder="email"
                            pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                            <p id="a"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "row">
                <div class="form-group justify-content-center m-auto">
                    <div class="col">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control"  id="password" name="password" placeholder="Contrasenya" require>
                        </div>
                    </div>
                </div>
                <div class="form-group justify-content-center m-auto">
                    <div class="col">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control"  id="comfirm_pass" name="comfirm_pass" placeholder="Comfirma la contrasenya" require>
                        </div>
                    </div>
                </div>
            </div>
            <!--error-->
            <p id="passcomfirm"></p>
            <?php 
            /**
             * error en cas de enviar variables buides
             * error si l'usuari o el mail ja existeixen
             * error si les contrasenyas no son iguals
             */
                if(isset($_GET["registre"]) && !empty($_GET["registre"] == "buit"))
                {
                    echo "<p class='buit_registre'>Error, algun camp esta buit</p>";
                }
                elseif(isset($_GET["registre"]) && !empty($_GET["registre"] == "repetit"))
                {
                    echo "<p class='buit_registre'>Error, l'usuari o el mail ja existeixent</p>";
                }
                elseif(isset($_GET["registre"]) && !empty($_GET["registre"] == "pass"))
                {
                    echo "<p class='buit_registre'>Error, las contrasenyas no coincideixen</p>";
                }
            ?>
            <div class="form-grouprow justify-content-center">
                <div>
                    <input type="submit" value="Registre" class="btn btn_log">
                </div>
            </div>
            <br/> <br/>
			<span> Ja estàs registrat? </span> <a href="log.php"> Torna (clic aquí) </a>
       </form>       
   </div>
   </div>
    </div>
 </div>
 <!--footer de la pagina.-->
 <?php include('header_footer/footer.php'); ?>
    <script>
    //funcio que valida si el mail es correcta, apartir del regex passat es comprovara si el valor introduit seguix aquet patro.
        function validacioRegistre()
        {
            var mail = document.forms["registre"]["mail"].value;
            var regex_mail = /[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}/;
            
            if (mail == "" || !regex_mail.test(mail)) {
                alert("Correu Electronic Incorrecte");
                return false;
            }

            return(true)

        }
    </script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script>
    </script>
</body>
</html>
