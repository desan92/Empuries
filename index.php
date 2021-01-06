<?php session_start(); ?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="images/logo/logo.png"/>
    <link href="fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
     <title>Emporium</title>
    <style>
        
        body{
            background-color: #f5f5dc;
        }
        #photo{
            background: url(images/background/cadaques.jpg);
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            min-height: 500px;
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
        
        #photo #text_actiu {
            font-size: 45px;
            color: #0000f0;
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
        
        
        
    </style>
</head>

<body>
    <?php include('header_footer/header.php'); ?>
   <div class="container-fluid">
       <div class="row">
           <div class="col p-0">
              <div class="jumbotron jumbotron-fluid" id="photo">
                  <span class="prova animate__animated animate__fadeInLeftBig">A Emporium sabem<h3 class="" id="text_actiu"></h3></span>
              </div>
           </div>
       </div>
       <div class="div-spacer"></div>
       <div class="div-spacer"></div>
       <div class="row">
           <div class="col-12">
               <h2 class="titol_destacats text-center w-75"><span><b>Visites destacades</b></span></h2>
           </div>
       </div>
       <div class="div-spacer"></div>
       <div class="row">
        <div class="col-md-6 col-sm-12 thumb float-left" >
            <div id="block_info">
                <div>
                    <a href="#"><img id="img_info_destacats" src="https://diarioelcanal.com/wp-content/uploads/2020/12/Astilleros-de-Mallorca-min.jpg"></a>
                </div>
                <div class="mt-2" id="info_destacats">
                    <div>
                        <span class="text-muted" style="font-size: 12px;">Visites destacades</span>
                    <div>
                        <a id="title_destacats" href="#"><h4>Astilleros españoles de veleros</h4></a>
                        <p class="text-justify" style="font-size: 15px;">En España se han construido miles de veleros de los más variados modelos y
                        esloras dispares. En este artículo te contamos un poco sobre la histor... </p>
                        <div class="text-right">
                            <a class="btn btn-primary" href="#">Més informació</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
           </div>
           <div class="col-md-6 col-sm-12 thumb float-left" >
            <div id="block_info">
                <div>
                    <a href="#"><img id="img_info_destacats" src="https://diarioelcanal.com/wp-content/uploads/2020/12/Astilleros-de-Mallorca-min.jpg"></a>
                </div>
                <div class="mt-2" id="info_destacats">
                    <div>
                        <span class="text-muted" style="font-size: 12px;">Visites destacades</span>
                    <div>
                        <a id="title_destacats" href="#"><h4>Astilleros españoles de veleros</h4></a>
                        <p class="text-justify" style="font-size: 15px;">En España se han construido miles de veleros de los más variados modelos y
                        esloras dispares. En este artículo te contamos un poco sobre la histor...</p>
                        <div class="text-right">
                            <a class="btn btn-primary" href="#">Més informació</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
           </div>
       </div>
       <div class="div-spacer"></div>
       <div class="div-spacer"></div>
       <div class="row">
           <div class="col-12">
               <h2 class="titol_destacats text-center w-75"><span><b>Monuments destacats</b></span></h2>
           </div>
       </div>
       <div class="div-spacer"></div>
       <div class="row">
               <div class="col-md-6 col-sm-12 thumb float-left" >
            <div id="block_info">
                <div>
                    <a href="#"><img id="img_info_destacats" src="https://diarioelcanal.com/wp-content/uploads/2020/12/Astilleros-de-Mallorca-min.jpg"></a>
                </div>
                <div class="mt-2" id="info_destacats">
                    <div>
                        <span class="text-muted" style="font-size: 12px;">Monuments destacats</span>
                    <div>
                        <a id="title_destacats" href="#"><h4>Astilleros españoles de veleros</h4></a>
                        <p class="text-justify" style="font-size: 15px;">En España se han construido miles de veleros de los más variados modelos y
                        esloras dispares. En este artículo te contamos un poco sobre la histor...</p>
                        <div class="text-right">
                            <a class="btn btn-primary" href="#">Més informació</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 thumb float-left" >
            <div id="block_info">
                <div>
                    <a href="#"><img id="img_info_destacats" src="https://diarioelcanal.com/wp-content/uploads/2020/12/Astilleros-de-Mallorca-min.jpg"></a>
                </div>
                <div class="mt-2" id="info_destacats">
                    <div>
                        <span class="text-muted" style="font-size: 12px;">Monuments destacats</span>
                    <div>
                        <a id="title_destacats" href="#"><h4>Astilleros españoles de veleros</h4></a>
                        <p class="text-justify" style="font-size: 15px;">En España se han construido miles de veleros de los más variados modelos y
                        esloras dispares. En este artículo te contamos un poco sobre la histor...</p>
                        <div class="text-right">
                            <a class="btn btn-primary" href="#">Més informació</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
           </div>
       </div>
       <div class="div-spacer"></div>
        <div class="row ml-4 mr-4 mb-3" id="btn_intro">
            <div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a id="a" href="#"><i id="icon_1" class="fas fa-landmark stretched-link"></i><br>Historia</a></div>
            <div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a href="monuments.php"><i id="icon_1" class="fas fa-archway stretched-link"></i><br>Monuments</a></div>
            <div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a href="#"><i id="icon_1" class="fas fa-bus stretched-link"></i><br>Visites</a></div>
            <div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a href="allotjaments.php"><i id="icon_1" class="fas fa-hotel stretched-link"></i><br>Allotjaments</a></div>
            <div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a href="#"><i id="icon_1" class="fas fa-camera-retro stretched-link"></i><br>Galeria Visites</a></div>
            <div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a href="about_us.php"><i id="icon_1" class="fas fa-male stretched-link"></i><br>About us</a></div>
       </div>
    </div>
    <?php include('header_footer/footer.php'); ?>
    
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script>
        
        var x = 0;
        function recorregut()
        {
            var imatge = ["Turisme", "Historia", "Gastronomia"];
    
            if(x >= imatge.length-1)
            {
                x = 0;
            }
            else
            {
                x++;
            }
            
            return imatge[x];
        }

        onload=function(){
            document.getElementById('text_actiu').innerHTML=recorregut();
            setInterval(function(){document.getElementById('text_actiu').innerHTML=recorregut();},1000)
        }
        
        
    </script>
</body>
</html>

