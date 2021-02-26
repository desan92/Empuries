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
        
        #visites{
            display: flex;
            flex-wrap: wrap;
        }

        #desc_visita {
            font-size: 14px;
        }
        
    </style>
</head>

<body>
<div id="app">
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
            <div class="col-md-6 col-sm-12 thumb float-left mb-2" id="visites" v-if="carregat" v-for="visita in info_visita">
                <div id="block_info" id="visites">
                <a class="thumbnail" :href="'info_visita.php?id=' + visita.id_producte">
                    <div>
                        <img id="img_info_destacats" :src="'images/img_visites/' + visita.imatge_visita">
                    </div>
                    <div class="mt-2" id="info_destacats">
                    <div>
                        <span class="text-muted" style="font-size: 12px;">Visites destacades</span>
                    </div>
                        <div>
                            <h4 class="text-center" id="title_destacats">{{ visita.nom_producte }}</h4>
                            <p class="text-justify" id="desc_visita">{{ visita.intro_descripcio }}</p>
                            <p class="text-left text-danger" id="desc_visita">Preu: {{ visita.preu }}</p>
                        </div>
                    </div>
                    </a>
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
            <div class="col-md-6 col-sm-12 thumb float-left" v-if="carregat" v-for="turisme in info_turistica">
            <div id="block_info">
            <a class="thumbnail" :href="'info_lloc_turistic.php?id=' + turisme.id_turisme">
                <div>
                    <img id="img_info_destacats" :src="'images/img_info_turistica/' + turisme.imatge">
                </div>
                <div class="mt-2" id="info_destacats">
                    <div>
                        <h4 class="text-center" id="title_destacats">{{ turisme.nom_turisme }}</h4>
                    </div>
                </div>
            </a>
            </div>
        </div>
       </div>
       <div class="div-spacer"></div>
        <div class="row ml-4 mr-4 mb-3" id="btn_intro">
            <div class="col-md-1"></div>
            <div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a id="a" href="#"><i id="icon_1" class="fas fa-landmark stretched-link"></i><br>Historia</a></div>
            <div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a href="monuments.php"><i id="icon_1" class="fas fa-archway stretched-link"></i><br>Monuments</a></div>
            <div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a href="visites.php"><i id="icon_1" class="fas fa-bus stretched-link"></i><br>Visites</a></div>
            <div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a href="allotjaments.php"><i id="icon_1" class="fas fa-hotel stretched-link"></i><br>Allotjaments</a></div>
            <!--<div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a href="#"><i id="icon_1" class="fas fa-camera-retro stretched-link"></i><br>Galeria Visites</a></div>-->
            <div class="col-md-2 col-sm-6 col-xs-12" id="col_btn_intro"><a href="about_us.php"><i id="icon_1" class="fas fa-male stretched-link"></i><br>About us</a></div>
            <div class="col-md-1"></div>
       </div>
    </div>
    <?php include('header_footer/footer.php'); ?>
</div>

<script>

        var vm = new Vue ({
                el: "#app",
                data:{
                    info_turistica: null,
                    info_visita: null,
                    carregat: false
                },
                methods:{
                    dadesTurisme(){
                        axios.get("json_info_turistica/dades_info_turistica.php?destacat=1")
                        .then(res=>{
                        this.info_turistica = res.data
                        this.carregat = true
                        
                        })
                    },
                    dadesVisita(){
                        axios.get("json_visites/dades_visites.php?destacat=1")
                        .then(res=>{
                        this.info_visita = res.data
                        this.carregat = true
                        
                        })
                    }
                },
                mounted(){
                    this.dadesTurisme(),
                    this.dadesVisita()
                }
                
            });
        
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

    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    
</body>
</html>

