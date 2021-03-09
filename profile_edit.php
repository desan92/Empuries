<?php session_start();
//es comprova que la session rol existeix i no esta buida.
if(isset($_SESSION["rol"]) && !empty($_SESSION["rol"]))
{
    //es pasen les variables session relacionades amb l'usuari a una variable.
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
        //si no ecisteix no esta logejat i va a index
        header("Location: index.php");
    }
    
}
else
{
    //si no ecisteix no esta logejat i va a index
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

        #container_perfil_edit{
            background-color: #ffffffc4;
            border-radius: 5px;
        }

        #label_modicar_perfil{
            color: navy;
            font-weight: 600;
        }

        @media all and (max-width: 768px){
            #desc_user{
                margin-top: 25px;
            }
        }
    </style>
</head>

<body>
    <!--header de la pagina-->
    <?php include('header_footer/header.php'); ?>
    <div class="container-fluid">
       <div class="row">
           <div class="col p-0">
              <div class="jumbotron jumbotron-fluid" id="photo">
                  <span class="prova animate__animated animate__fadeInLeftBig">Perfil<h3 class="" id="text_actiu"></h3></span>
              </div>
           </div>
       </div>
       <?php 
       /**
        * navbar que canvia al ser admin o client i depenent de la session es crea un o l'altre.
        */
       if($_SESSION["rol"] == "Administrador")
       {
           echo "<div class='row'>
           <div class='col p-0'>
           <nav class='navbar navbar-expand-lg navbar-light' style='background-color: navy;'>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo01' aria-controls='navbarTogglerDemo01' aria-expanded='false' aria-label='Toggle navigation'>
                <span><svg width='1.3em' height='1.3em' viewBox='0 0 16 16' class='bi bi-list text-light' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' d='M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z'/>
                        </svg></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
                    <ul class='navbar-nav list-inline text-center mx-auto justify-content-center'>
                    <li class='nav-item list-inline-item'>
                        <a class='nav-link text-light' href='index.php'>Inici</a>
                    </li>
                    <li class='nav-item list-inline-item'>
                        <a class='nav-link text-light' href='profile_admin.php'>Perfil</a>
                    </li>
                    <li class='nav-item list-inline-item'>
                        <a class='nav-link text-light' href='comandes_admin.php'>Comandes</a>
                    </li>
                    <li class='nav-item list-inline-item'>
                        <a class='nav-link text-light' href='profile_visites_admin.php'>Visites</a>
                    </li>
                    <li class='nav-item list-inline-item'>
                        <a class='nav-link text-light' href='log_register/session_exit.php'>Sortir</a>
                    </li>
                    </ul>
                </div>
            </nav>
            </div>
        </div>";
       }
       else
       {
        echo "<div class='row'>
           <div class='col p-0'>
           <nav class='navbar navbar-expand-lg navbar-light' style='background-color: navy;'>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo01' aria-controls='navbarTogglerDemo01' aria-expanded='false' aria-label='Toggle navigation'>
                <span><svg width='1.3em' height='1.3em' viewBox='0 0 16 16' class='bi bi-list text-light' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' d='M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z'/>
                        </svg></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
                    <ul class='navbar-nav list-inline text-center mx-auto justify-content-center'>
                    <li class='nav-item list-inline-item'>
                        <a class='nav-link text-light' href='index.php'>Inici</a>
                    </li>
                    <li class='nav-item list-inline-item'>
                        <a class='nav-link text-light' href='profile_client.php'>Perfil</a>
                    </li>
                    <li class='nav-item list-inline-item'>
                        <a class='nav-link text-light' href='comandes_client.php'>Comandes</a>
                    </li>
                    <li class='nav-item list-inline-item'>
                        <a class='nav-link text-light' href='cistella_compra.php'>Cistella</a>
                    </li>
                    <li class='nav-item list-inline-item'>
                        <a class='nav-link text-light' href='log_register/session_exit.php'>Sortir</a>
                    </li>
                    </ul>
                </div>
            </nav>
            </div>
        </div>";
       }
       
       ?>
       <div class="container">
           <div id="container_perfil_edit">
           <div class="row mt-3">
           <div class="col-12">
               <h2 class="text-center m-auto pt-5" style="color: navy;"><span><b>Modificar Perfil</b></span></h2>
           </div>
       </div>
       <div class="row mt-3 mb-3">
            <div class="col-md-3"></div>
            <div class="col-md-6 form_contacte">
            <form action="perfil/perfil_modificar.php" method="POST">
                <div class="form-group">
                    <label id="label_modicar_perfil" for="exampleInputNom">Nom</label>
                    <input type="text" name="nom" value="<?php echo $nom; ?>" class="form-control" id="exampleInputNom" aria-describedby="nomHelp" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <label id="label_modicar_perfil" for="exampleInputCognom">Cognom</label>
                    <input type="text" name="cognom" value="<?php echo $cognom; ?>" class="form-control" id="exampleInputCognom" aria-describedby="nomHelp" placeholder="Cognom" required>
                </div>
                <div class="form-group">
                    <label id="label_modicar_perfil" for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="<?php echo $mail; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"
                    pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                </div>
                <div class="form-group">
                    <label id="label_modicar_perfil" for="exampleInputUser">Usuari</label>
                    <input type="text" name="user" value="<?php echo $user; ?>" class="form-control" id="exampleInputUser" aria-describedby="subjectHelp" placeholder="Usuari" required>
                </div>
                <button type="submit" class="btn btn-primary float-right mb-3">Enviar</button>
            </form>
            <?php 
            /**
             * en cas que es vulgui canviar l'usuari o el mail es comprova que no estigui 
             * repetit si ho es error.
             * tambe es torna error si les dades son incorrectes.
             */
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
       </div>
    </div>
    <!--footer de la pagina-->
   <?php include('header_footer/footer.php'); ?>

   <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</body>
</html>
