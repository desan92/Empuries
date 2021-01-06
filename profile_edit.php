<?php session_start();
if(isset($_SESSION["rol"]) && !empty($_SESSION["rol"]))
{
    if(isset($_SESSION["user"], $_SESSION["nom"], $_SESSION['cognom'], $_SESSION['mail'], $_SESSION["id"]))
    {
        $user = $_SESSION["user"];
        $nom = $_SESSION["nom"];
        $cognom = $_SESSION['cognom'];
        $mail = $_SESSION['mail'];
        $id = $_SESSION["id"];
    }
    else
    {
        header("Location: index.php");
    }
    
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
       <div class="row mt-3 mb-3">
            <div class="col-md-3"></div>
            <div class="col-md-6 form_contacte">
            <form action="perfil/perfil_modificar.php?id='<?php echo $id; ?>'" method="POST">
                <div class="form-group">
                    <label for="exampleInputNom">Nom</label>
                    <input type="text" name="nom" value="<?php echo $nom; ?>" class="form-control" id="exampleInputNom" aria-describedby="nomHelp" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputCognom">Cognom</label>
                    <input type="text" name="cognom" value="<?php echo $cognom; ?>" class="form-control" id="exampleInputCognom" aria-describedby="nomHelp" placeholder="Cognom" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="<?php echo $mail; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"
                    pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputUser">Usuari</label>
                    <input type="text" name="user" value="<?php echo $user; ?>" class="form-control" id="exampleInputUser" aria-describedby="subjectHelp" placeholder="Usuari" required>
                </div>
                <button type="submit" class="btn btn-primary float-right">Enviar</button>
            </form>
            <?php 
                if(isset($_GET["modificar"]) && !empty($_GET["modificar"] == "repetit"))
                {
                    echo "<p class='buit_registre'>Error, l'usuari o el mail ja existeixen.</p>";
                }
                elseif(isset($_GET["modificar"]) && !empty($_GET["modificar"] == "error"))
                {
                    echo "<p class='buit_registre'>Error, dades incorrectes.</p>";
                }
            ?>
            </div>
            <div class="col-md-3"></div>
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
