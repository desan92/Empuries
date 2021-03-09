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

    </style>
</head>

<body>
<div id="app">
    <!--header de la pagina-->
    <?php include('header_footer/header.php'); ?>
    <div class="container-fluid">
       <div class="row">
           <div class="col p-0">
              <div class="jumbotron jumbotron-fluid" id="photo">
                  <span class="prova animate__animated animate__fadeInLeftBig">Visites guiades<h3 class="" id="text_actiu"></h3></span>
              </div>
           </div>
       </div>
       <div class="row">
           <!--on es mostraran totes les visites turistiques per separat.-->
           <div class="col-lg-4 col-sm-6 thumb float-left mb-2" id="visites" v-if="carregat" v-for="visita in info_visita">
                <div id="block_info" id="visites">
                <a class="thumbnail" :href="'info_visita.php?id=' + visita.id_producte">
                    <div>
                        <img id="img_info_destacats" :src="'images/img_visites/' + visita.imatge_visita">
                    </div>
                    <div class="mt-2" id="info_destacats">
                        <div>
                            <h4 class="text-center" id="title_destacats">{{ visita.nom_producte }}</h4>
                            <p class="text-justify" style="font-size: 15px;">{{ visita.intro_descripcio }}</p>
                            <p v-if="visita.preu > 0" class="text-left text-danger">Preu: {{ visita.preu }}€</p>
                            <p v-else="visita.preu == 0" class="text-left text-danger">Preu: Gratuït</p>
                        </div>
                    </div>
                </a>
                </div>
           </div>
       </div>
    </div>
    
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <?php include('header_footer/footer.php'); ?>
</div>

    <script>
        var vm = new Vue ({
        el: "#app",
        data:{
            info_visita: null,
            carregat: false
        },
        methods:{
            /*Metode que carrega l'informacio de la bbdd de les visites que hi han actualment alla les pasa a info_visita i apartir
            d'aqui es pasa al lloc correspoent de la pagina.*/
            dadesVisita(){
                axios.get("JSON/json_visites/dades_visites.php")
                .then(res=>{
                   this.info_visita = res.data
				   this.carregat = true
                   
                })
            }
        },
        mounted(){
            //es crida al metode dadesvisita.
            this.dadesVisita()
        }
        
    });
    </script>

    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</body>
</html>
