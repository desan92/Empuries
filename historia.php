<?php session_start(); ?>
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
        #visites{
            display: flex;
            flex-wrap: wrap;
        }

        .container_info_historia{
            background-color: #ffffffc4;
            border-radius: 5px;
            line-height: 26px;
        }
        .historia{
            column-count: 2;
        }

        .titol_historia{
            color: navy;
            text-align: center;
        }

        #subtitol_historia
        {
            color: navy;
        }

        .carousel-item img{
            background-size: 100% 100%;
            height: 492px;
            width: 100%;
        }

        /*Media querie per canviar a una columna tota l'historia de l'Emporda. Apartir de 768 cal avall*/
        @media all and (max-width: 768px){
            .historia{
                column-count: 1;
            }
        }

    </style>
</head>

<body>
    <!--Header de la pagina web-->
    <?php include('header_footer/header.php'); ?>
    <div class="container-fluid">
       <div class="row">
           <div class="col p-0">
              <div class="jumbotron jumbotron-fluid" id="photo">
                  <span class="prova animate__animated animate__fadeInLeftBig">Historia<h3 class="" id="text_actiu"></h3></span>
              </div>
           </div>
       </div>
       <div class="row p-3 mt-2">
            <div class="col-12 p-5 container_info_historia">
                  <!--corousel de boostrap on sortiran tres imatges i canviaran en un determinat temps-->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="images/img_historia/Sant_Pere_de_Rodes_-_Alt_Empordà_-_Girona.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="images/img_historia/quirze_colera_2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="images/img_historia/empuries.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div><br>
            <h1 class="titol_historia"><b>Historia de l'Empordà</b></h1><br>
                <div class="historia">
                
                <h4 id="subtitol_historia" class="text-center"><b>Prehistòria</b></h4>
                <p class="text-justify">La seva situació fronterera i mediterrània,
                    són probablement algunes de les raons que expliquen l’immensa empremta cultural
                    que hi ha aquesta comarca. Alguns exemples poder ser el poblat ibèric d’Ullastret o
                    també els centenars de dòlmens que es poden trobar a la serra de l’Albera.
                </p>
                <h4 id="subtitol_historia" class="text-center"><b>Edat antiga</b></h4>
                <p class="text-justify">Altres, com les ruïnes greco-romanes d’Empúries, 
                    són fruit de l’expansió comercial i militar per la Mediterrània 
                    d’aquestes cultures durant l’edat antiga. Aquestes ruïnes es troben 
                    en el propi terme municipal de l’Escala i són un dels conjunts 
                    arqueològics més importants de la península.
                </p>
                <h4 id="subtitol_historia" class="text-center"><b>Edat mitjana</b></h4>
                <p class="text-justify">A l’edat mitjana, Castelló d’Empúries va ser la 
                    capital del Comptat d’Empúries. D’aquella època són a destacar el nucli medieval 
                    de St. Martí d’Empúries, els casc antic de Castelló d’Empúries o el 
                    monestir de Sant Pere de Rodes. També són a destacar d’aquesta època les 
                    innumerables esglésies, ermites romàniques, monestirs i abadies.<br>
                    Pel seu estat de conservació i arquitectura, encara avui hi ha alguns
                    pobles que es poden gaudir com si estiguéssim a l’Edat mitjana. 
                    Com a exemples podem esmentar Peralada, Pals, Sant llorenç de la Muga o 
                    Peratallada entre d’altres.
                </p>
                <h4 id="subtitol_historia" class="text-center"><b>Edat moderna</b></h4>
                <p class="text-justify">A l’edat moderna i com a conseqüència dels 
                    conflictes bèl·lics a que s’ha vist sotmesa aquesta terra, ens queden
                    les restes del Castell de Sant Ferran de Figueres. També nombrosos
                    edificis civils i religiosos, així com retaules de diversos estils 
                    que van del gòtic al barroc i fins al modernisme de l’edat 
                    contemporània.
                </p>
                <h4 id="subtitol_historia" class="text-center"><b>Edat contemporània</b></h4>
                <p class="text-justify">El moviment artístic, intel·lectual i cultural més
                    important a l’Empordà durant l’edat contemporània, es sens cap mena 
                    de dubte el surrealisme. Això ha estat degut al genial pintor
                    figuerenc Salvador Dalí. De la mateixa manera que no es pot 
                    descobrir l’Empordà sense conèixer Dalí, és diu que no es pot 
                    entendre Dalí sense descobrir l’Empordà.
                </p>

                </div>
            </div>
       </div>
    </div>
    
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <!--footer de la pagina.-->
   <?php include('header_footer/footer.php'); ?>


    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</body>
</html>