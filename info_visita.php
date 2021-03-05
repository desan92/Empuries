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
            width: 300px;
            align-items: center;
            margin: auto;
            text-align: center;
        }

        .desc_visita{
            line-height: 26px;
            font-weight: 700;
        }

        #imatge_map{
            border: 5px solid navy;
            height: 250px;
            width: 300px;
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

        @media all and (min-width: 1100px){
        #imatge_visita{
            width: 450px;
            align-items: center;
            margin: auto;
            text-align: center;
        }
    }

        @media all and (max-width: 1100px) and (min-width: 759px){

            #imatge_visita{
            width: 300px;
            align-items: center;
            margin: auto;
            text-align: center;
            }
            #imatge{
                width: 300px;
                text-align: center;
            }
        }

        @media all and (max-width: 758px) and (min-width: 461px){
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
            width: 280px;
            align-items: center;
            margin: auto;
            text-align: center;
        }

        #imatge_map{
            width: 280px;
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
            <h2 class="text-center text-align-center m-auto" id="titol_monument" v_if="carregat" style="color: navy;"><b>{{ info_visita.nom_producte }}</b></h2>
        </div>
        <div class="row mt-5 m-auto" v-if="carregat">
                <div class="col-md-5 col-sm-12 text-align-center justify-content-center m-auto" id="imatge">
                    <img :src="'images/img_visites/' + info_visita.imatge_visita" class="justify-content-center m-auto" id="imatge_visita">
                </div>
                <div class="col-md-1 col-sm-12"></div><br>
                <div class="col-md-6 col-sm-12 m-auto justify-content-center">
                    <p class='text-justify' class="desc_visita" v-html="info_visita.descripcio"></p>
                </div>
        </div>
       </div>

       <div class="container recuadre_allotjament" v-if="carregat">
       <div class="row">
            <div class="col-md-5 col-sm-12 m-auto" id="imatge">
                <div v-if="carregat" class="d-block" id="imatge_map"></div>  
            </div>
            <div class="col-md-1 col-sm-12"></div>
            <div class="col-md-6 col-sm-12 align-middle m-auto" id="desc_visita" v-if="carregat">
                <p class="text-center align-middle mt-2"><b>Punt de Trobada:</b> {{ info_visita.punt_trobada }} </p>
                <p class="text-center align-middle"><b>Dia Visita:</b> {{ info_visita.dia_visita }}</p>
                <p v-if="info_visita.places > 0" class="text-center align-middle"><b>Places restants:</b> {{ info_visita.places }}</p>
                <p v-else="info_visita.places == 0" class="text-center align-middle"><b>Places restants: <span style="color: red;">Producte Esgotat</span></b></p>
                <p class="text-center align-middle"><b>Durada:</b> {{ info_visita.durada }}</p>
                <p class="text-center align-middle"><b>Idioma:</b> {{ info_visita.idioma }}</p>
                <p v-if="info_visita.preu > 0" class="text-center align-middle"><b>Preu:</b> {{ info_visita.preu }}€</p>
                <p v-else="info_visita.preu == 0" class="text-center align-middle"><b>Preu:</b> Gratuït</p>
                <!-- Button trigger modal -->
                <?php 
                
                    if(!isset($_SESSION["user"], $_SESSION["rol"]))
                    {
                        echo "<a href='log.php' type='button' class='btn btn-primary float-right'>
                                    Afegir al cistell
                                </a>";

                    }
                    elseif(isset($_SESSION["user"], $_SESSION["rol"]) && !empty($_SESSION["rol"]) && $_SESSION["rol"] == "Client")
                    {
                        echo  "<button type='button' class='btn btn-primary float-right' data-toggle='modal' data-target='#exampleModalCenter'>
                                Afegir al cistell
                            </button>";
                        
                    }
                    elseif(isset($_SESSION["user"], $_SESSION["rol"]) && !empty($_SESSION["rol"]) && $_SESSION["rol"] == "Administrador")
                    {
                        
                    }

                ?>

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
                    <span>Nom: {{ info_visita.nom_producte }}</span><span v-if="info_visita.preu > 0" class="float-right">Preu: {{ info_visita.preu }}€</span><span v-else="info_visita.preu == 0" class="float-right">Preu: Gratuït</span>
                            
                </div>
                
                <div v-if="info_visita.places > 0" class="modal-footer">
                    <form action="cistella/items_cistella.php" method="POST">
                        <input type="hidden" name="id" :value="info_visita.id_producte"> 
                        <div class = "row">
                        <div class="form-group justify-content-center m-auto">
                            <div class="col">
                                <div class="input-group form-group">
                                    <select id="inputState" name="quantitat" class="form-control">
                                        <option v-for ="options in options_visita">{{ options }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group justify-content-center m-auto">
                            <div class="col">
                                <div class="input-group form-group">
                            <input type="submit" value="Afegir a la cistella" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
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
            options_visita: [],
            carregat: false,
            id: ''
        },
        methods:{
            dadesVisita(){
                axios.get("JSON/json_visites/dades_visites.php?id=" + this.id)
                .then(res=>{
                   this.info_visita = res.data
				   this.carregat = true
                   console.log(this.info_visita.places);

                   for(i = 1; i <= this.info_visita.places; i++)
                   {
                       this.options_visita.push(i);
                   }
                   
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAs6i1mssHmgMuKSeGkjqZa-N3nYYSnrY&callback=initMap" type="text/javascript"></script>

    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</body>
</html>