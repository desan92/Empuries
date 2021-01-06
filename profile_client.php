<?php session_start();
if(isset($_SESSION["rol"]))
{
    $rol = $_SESSION["rol"];
    $rol = str_replace("<br>", '', $rol);;
    if(!empty($rol) && $rol != "Client")
    {
        header("Location: index.php");
    }
    else
    {
        if(isset($_SESSION["user"], $_SESSION["nom"], $_SESSION['cognom'], $_SESSION['mail'], $_SESSION["id"]))
        {
            $user = $_SESSION["user"];
            $nom = $_SESSION["nom"];
            $cognom = $_SESSION['cognom'];
            $mail = $_SESSION['mail'];
            $id = $_SESSION["id"];
            //echo $id;
        }
        else
        {
            header("Location: index.php");
        }
    }
    //header("Location: index.php");
}
else
{
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="shortcut icon" type="image/png" href="images/logo/logo.png"/>
    <link href="fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link href="fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <title>Emporium</title>
    <style>

        body{
            background-color: #f5f5dc;
        } 

        #photo{
            background: url(images/background/cadaques.jpg);
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 350px;
            width: 100%;
	        text-align: center;
        }
        #photo:before {
            content:'';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0,0,0,0.4);
        }
        
        #photo span {
            font-size: 45px;
            color: #fff;
            position: relative;
            font-family: roboto;
            font-weight: bold;
            text-align: center;
            text-shadow: black 0.1em 0.1em 0.2em;
        }
        
        .jumbotron{
            margin-bottom: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        #perfil_info{
            margin-top: 50px;
            margin-bottom: 50px;
        }

        #titol_info{
            font-size: 21px;
        }

        #imatge-personal{
            height: 150px;
            width: 150px;
            border: 5px solid navy;
            text-align: center;
        }

        .recuadre_personal{
            border-radius: 5px;
            height: 600px;
            padding: 25px;
            background-color: #ffffffc4;
            margin-top:4%;
            margin-bottom:4%;
        }

        @media all and (max-width: 768px){
            #desc_user{
                margin-top: 25px;
            }
        }
    </style>
</head>

<body>
    <?php include('header_footer/header.php'); ?>
    <div class="container-fluid">
       <div class="row">
           <div class="col p-0">
              <div class="jumbotron jumbotron-fluid" id="photo">
                  <span class="prova animate__animated animate__fadeInLeftBig">Perfil<h3 class="" id="text_actiu"></h3></span>
              </div>
           </div>
       </div>
       <div class="row">
            <div class="col p-0">
            <nav class="navbar navbar-expand-sm justify-content-center" style="background-color: navy;">
                  <ul class="navbar-nav">
                      <li class="nav-item"><a class="nav-link" href="profile_client.php">Perfil</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">link2</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">link3</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">link4</a></li>
                      <li class="nav-item"><a class="nav-link" href="log_register/session_exit.php">Sortir</a></li>
                  </ul>
              </nav>
            </div>
       </div>
       <div class="row" id="perfil_info">
            <div class="col-md-6">
              <p class="text-center" id="titol_info"><b>Foto de perfil</b></p>
              <img class="rounded d-block m-auto" src="images/perfil/perfil.jpg" id="imatge-personal">
           </div>
           <div class="col-md-6 text-center" id="desc_user">
              <p class="text-center" id="titol_info"><b>Descripció usuari:</b></p>
              <ul class="list-inline mx-auto justify-content-center">
                  <li class="">Nom: <?php echo $nom; ?></li>
                  <li class="">Cognom: <?php echo $cognom; ?></li>
                  <li class="">Username: <?php echo $user; ?></li>
                  <li class="">Email: <?php echo $mail; ?></li>
                  <li class="mt-3"><a href="profile_edit.php" class="btn btn-primary">Modificar</a> <a href="perfil/perfil_eliminar.php?id='<?php echo $id; ?>'" class="btn btn-primary">Eliminar</a></li>
              </ul>
           </div>
       </div>
    </div>
   <?php include('header_footer/footer.php'); ?>

    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</body>
</html>
