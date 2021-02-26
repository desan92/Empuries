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

        #imatge_visita{
            border: 5px solid navy;
            height: 300px;
            width: 500px;
            align-items: center;
            margin: auto;
            text-align: center;
        }

        #imatge_map{
            border: 5px solid navy;
            height: 250px;
            width: 350px;
            align-items: center;
            margin: auto;
            display: block;
        }

        .container_visita{
            padding-left: 5%;
            padding-right: 5%;
        }

        #desc_visita {
            font-size: 14px;
        }

        .modal-header{
            background-image: url("images/sidebar_foto/emporda.jpg");
            background-size: 100% 100%;
            width: 100%;
            height: 120px;
        }

        .modal-title{
            justify-content: center;
            align-items: center;
            text-shadow: black 0.1em 0.1em 0.2em;
        }

        @media all and (max-width: 768px){
        #imatge_visita{
            width: 350px;
            align-items: center;
            margin: auto;
            text-align: center;
        }

        #imatge{
            text-align: center;
        }
    }

    @media all and (max-width: 460px){
        #imatge_visita{
            width: 250px;
            align-items: center;
            margin: auto;
            text-align: center;
        }

        #imatge_map{
            width: 250px;
        }
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
                  <span class="prova animate__animated animate__fadeInLeftBig">Visites guiada<h3 class="" id="text_actiu"></h3></span>
              </div>
           </div>
       </div>
    </div> 
    <div class="container_visita">
       <div class="container recuadre_allotjament" v-if="carregat">
        <div class="row mb-4">
            <h2 class="text-center text-align-center m-auto" id="titol_monument" v_if="carregat"><b>{{ info_visita.nom_producte }}</b></h2>
        </div>
        <div class="row mt-5 m-auto text-center" v-if="carregat">
            <div class="col-12 text-align-center justify-content-center m-auto" id="imatge">
                <img :src="'images/img_visites/' + info_visita.imatge_visita" class="justify-content-center m-auto" id="imatge_visita">
            </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 m-auto mt-3" id="desc_visita" v-if="carregat">
                    <p class='text-justify' v-html="info_visita.descripcio"></p>
                </div>
            </div>
       </div>
       <div class="container recuadre_allotjament" v-if="carregat">
       <div class="row">
            <div class="col-md-6 col-sm-12 m-auto" id="imatge">
                <div class="d-block" id="imatge_map"></div>  
            </div>
                   
                
            <!--<div class="col-md-1 col-sm-12"></div>-->
            <div class="col-md-6 col-sm-12 align-middle m-auto" id="desc_visita" v-if="carregat">
                <p class="text-center align-middle mt-2"><b>Punt de Trobada:</b> {{ info_visita.punt_trobada }} </p>
                <p class="text-center align-middle"><b>Dia Visita:</b> {{ info_visita.dia_visita }}</p>
                <p class="text-center align-middle"><b>Durada:</b> {{ info_visita.durada }}</p>
                <p class="text-center align-middle"><b>Idioma:</b> {{ info_visita.idioma }}</p>
                <p class="text-center align-middle"><b>Preu:</b> {{ info_visita.preu }}</p>
                <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
            Afegir al cistell
            </button>

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-auto text-center text-light" id="exampleModalLongTitle">Visites guiada: {{ info_visita.nom_producte }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Nom: {{ info_visita.nom_producte }}</span><span class="float-right">Preu: {{ info_visita.preu }}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
            </div>
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
            info_visita: [],
            carregat: false,
            id: ''
        },
        methods:{
            dadesVisita(){
                axios.get("json_visites/dades_visites.php?id=" + this.id)
                .then(res=>{
                   this.info_visita = res.data
				   this.carregat = true
                   
                   initMap()
                })
            }
        },
        created(){
            this.id = window.location.search.split('=')[1]; 
        },
        mounted(){
            this.dadesVisita()
        }
        
    });

    function initMap()
    {
        var coordenades = {lat: parseFloat(vm.info_visita.latitud), lng: parseFloat(vm.info_visita.longitud)};
        var opcions = {zoom: 15, center: coordenades}
        var map = new google.maps.Map(document.getElementById("imatge_map"), opcions);
        var marker = new google.maps.Marker({position: coordenades, map: map});
    }
    
    </script>

    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAs6i1mssHmgMuKSeGkjqZa-N3nYYSnrY&callback=initMap&libraries=&v=weekly" async defer></script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</body>
</html>
