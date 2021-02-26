<?php 
session_start();
//echo $_SESSION["user"] . $_SESSION["pass"];
if(isset($_SESSION["rol"]))
{
    $rol = $_SESSION["rol"];
    //$rol = str_replace("<br>", '', $rol);;
    if(!empty($rol) && $rol != "Administrador")
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
    <script src="js/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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

        #table_monuments{
            padding: 2%;
            border-radius: 3px;
            background-color: #ffffffc4;
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
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: navy;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span><svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-list text-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav list-inline text-center mx-auto justify-content-center">
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="index.php">Inici</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="profile_admin.php">Perfil</a>
                    </li>
                    <!--<li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="profile_allotjaments_admin.php">Allotjaments</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="profile_monuments_admin.php">Monuments</a>
                    </li>-->
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="#">Comandes</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="profile_visites_admin.php">Visites</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="log_register/session_exit.php">Sortir</a>
                    </li>
                    </ul>
                </div>
            </nav>
            </div>
       </div>
       <div class="div-spacer"></div>
       <div class="div-spacer"></div>
       <div class="row">
           <div class="col-12">
               <h2 class="titol_destacats text-center w-75"><span><b>Afegir Visites</b></span></h2>
           </div>
       </div>
        <div class="div-spacer"></div>
        <div class="div-spacer"></div>
        <div class="div-spacer"></div>
       <div class="row">
           <div class="col">
           <form action="json_visites/dades_visites.php?add=true" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <input type="text" name="nom_visita" class="form-control mb-2" placeholder="Nom visita">
                    </div>
                    <div class="col-md-5">
                        <input type="number" name="preu" class="form-control mb-2" placeholder="Preu">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <input type="text" name="idioma" class="form-control mb-2" placeholder="Idioma">
                    </div>
                    <div class="col-md-5">
                    <input type="number" name="places_totals" class="form-control mb-2" placeholder="Places">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <input type="text" name="durada" class="form-control mb-2" placeholder="Durada">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="punt_trobada" class="form-control mb-2" placeholder="Lloc de trobada">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <input type="text" name="latitud" class="form-control mb-2" placeholder="Latitud">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="longitud" class="form-control mb-2" placeholder="Longitud">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <input type="file" id="fitxer" name="fitxer" class="form-control-file mb-2" style="font-size: 14px;">
                    </div>
                    <div class="col-md-5">
                        <input type="date" name="dia_visita" class="form-control mb-2" placeholder="Dia visita">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-10">
                        <label for="exampleFormControlTextarea1">Introducció</label>
                        <textarea class="form-control mb-2" name="intro" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-10">
                    <label for="exampleFormControlTextarea2">Descripció</label>
                    <textarea class="form-control mb-2" name="desc" id="exampleFormControlTextarea2" rows="3" required></textarea>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <?php 
                    if(isset($_GET["fitxer"]) && !empty($_GET["fitxer"] == "existeix"))
                    {
                        echo "<p class='buit_registre'>Error, el fitxer ja existeix.</p>";
                    }
                ?>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-10 text-right">
                        <button type="submit" class="btn btn-primary">Afegir</button>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </form>
           </div>
       </div> 
    </div>
    <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <?php include('header_footer/footer.php'); ?>
    
    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</body>
</html>