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
                    <!--<a href="log.php" class=" navbar-toggler" type="button">
                    <span class="text-ligh"><svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-person- text-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg></span>
                    </a>-->
                </nav>
              </div>
           </div>
       </div>
       <div class="row">
           <div class="col l-3 r-3">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <!--INDICADORS-->
                <ul class="carousel-indicators">
                    <li data-target="demo" data-slide-to="0" class="active"></li>
                    <li data-target="demo" data-slide-to="1" class=""></li>
                    <li data-target="demo" data-slide-to="2" class=""></li>
                </ul>
                
                <!--IMATGES-->
                <!--imatge i descripcio-->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img id="photo_carousel" src="images/corousel/empuries.jpg" class="img-fluid" style=" width:100%; height: 250px !Important;">
                    </div>
                    <div class="carousel-item">
                        <img id="photo_carousel" src="images/corousel/ciutadella.jpg" class="img-fluid" style=" width:100%; height: 250px !Important;">
                    </div>
                    <div class="carousel-item">
                        <img id="photo_carousel" src="images/corousel/ullestret.jpg" class="img-fluid" style=" width:100%; height: 250px !Important;">
                    </div>
                </div>
                
                <!--CONTROLS-->
                <!--aixo son els controls laterals de les imatges.-->
                <a href="#demo" class="carousel-control-prev" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                <a href="#demo" class="carousel-control-next" data-slide="next"><span class="carousel-control-next-icon"></span></a>
                
            </div>
           </div>
       </div>
       <div class="row"><div class="col" id="separacio"></div></div>
       <div class="row" id="btn_intro">
            <div class="col-1"></div>
            <div class="col-2 icon_1"><a href="#"><i id="icon_1" class="fas fa-landmark stretched-link"></i><br>Historia</a></div>
            <div class="col-2 icon_2"><a href="monuments.php"><i id="icon_1" class="fas fa-archway stretched-link"></i><br>Monuments</a></div>
            <div class="col-2 icon_3"><a href="#"><i id="icon_1" class="fas fa-bus stretched-link"></i><br>Visites</a></div>
            <div class="col-2 icon_4"><a href="allotjaments.php"><i id="icon_1" class="fas fa-hotel stretched-link"></i><br>Allotjaments</a></div>
            <div class="col-2 icon_5"><a href="about_us.php"><i id="icon_1" class="fas fa-male stretched-link"></i><br>About us</a></div>
            <div class="col-1"></div>
       </div>

       <!--<div class="row">
           <div class="col">
               <div class="fixed-bottom">
                   <div>
                   <p class="copy">&copy; Copyright Emporium</p>
                        <a href="#" class="face"><img src="images/social_links/fb.png"></a>
                        </div>
                        <a href="#"><img src="images/social_links/ig.png"></a>
                        <a href="#"><img src="images/social_links/tw.png"></a>
                        <a href="#"><img src="images/social_links/pt.png"></a>

                </div>
           </div>
       </div>-->
   </div>

    <script>
        
    </script>
       
        <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
