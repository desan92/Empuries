<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="stylesheet" href="css/styles.css">
    <link href="fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.css">
    <title>EMPURIES</title>
    <style>
        #imatge-personal{
            height: 150px;
            width: 150px;
            border: 5px solid navy;
            text-align: center;
        }

        .recuadre_personal{
            height: 600px;
            padding: 25px;
            background-color: #ffffffc4;
            margin-top:4%;
            margin-bottom:4%;
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
                    <?php
                        if(!isset($_SESSION["user"]))
                        {
                            echo "<a href='log.php' class='navbar-toggler' type='button' style='visibility: visible;;'>
                            <span class='text-ligh'><svg width='1.3em' height='1.3em' viewBox='0 0 16 16' class='bi bi-person- text-light' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path d='M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z'/>
                                <path fill-rule='evenodd' d='M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
                                <path fill-rule='evenodd' d='M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z'/>
                            </svg></span>
                            </a>";
                        }
                        else
                        {
                            echo "<a href='log.php' class='navbar-toggler' type='button'  style='visibility: hidden;'>
                            <span class='text-ligh'><svg width='1.3em' height='1.3em' viewBox='0 0 16 16' class='bi bi-person- text-light' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path d='M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z'/>
                                <path fill-rule='evenodd' d='M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
                                <path fill-rule='evenodd' d='M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z'/>
                            </svg></span>
                            </a>";
                        }

                        ?>
                </nav>
              </div>
           </div>
       </div>
       <div class="container mt-5">
       <div class="row">
                <div class="col-md-5 col-sm-12 m-auto recuadre_personal">
                    <img src="images/perfil/perfil.jpg" id="imatge-personal" class="rounded d-block m-auto">
                    <p class="mt-3"><b>Nom:</b> Jordi</p>
                    <p><b>Cognom:</b> de San Antonio Planas</p>
                    <p><b>Estudis:</b> Graduat en Historia (UAB).</p>
                    <p><b>Especialitat:</b> Master en Arqueologia Clasica (UAB) i
                    Master en Historia de l'Art (UAB).</p>
                    <p><b>Funcio:</b> </p>
                </div>
                <div class="col-md-2 col-sm-12"></div>
                <div class="col-md-5 col-sm-12 recuadre_personal">
                    <img src="images/perfil/perfil.jpg" id="imatge-personal" class="rounded d-block m-auto">
                    <p class="mt-3"><b>Nom:</b> Glòria</p>
                    <p><b>Cognom:</b> Vergés Marés</p>
                    <p><b>Estudis:</b> Graduada en Historia (UAB).</p>
                    <p><b>Especialitat:</b> Master de Mediterrani Antic (UAB).</p>
                    <p><b>Funcio:</b> </p>
                </div>
            </div>
       </div>

   </div>

    <script>
        
    </script>
       
        <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
