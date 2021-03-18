<?php session_start(); 

//es mira que existeixi l'id sino s'envia a la pagina monuments.
if(!isset($_GET["id"]) || empty($_GET["id"]))
{
    header("Location: monuments.php");
}

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <script src="js/vue.js"></script>
    <link rel="shortcut icon" type="image/png" href="images/logo/logo.png"/>
    <link href="fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
        #imatge_lloc_turistic{
            border: 5px solid navy;
            height: 200px;
            width: 300px;
            align-items: center;
            margin: auto;
            text-align: center;
        }
        #imatge_map{
            border: 5px solid navy;
            height: 250px;
            width: 300px;
            align-items: center;
            margin: auto;
            display: block;
        }

        .container_info_turistica{
            padding-left: 5%;
            padding-right: 5%;
        }

        #desc_allotjament{
            font-size: 14px;
        }

        #titol_monument{
            font-size: 25px;
            font-weight: bold;
        }

        @media all and (max-width: 768px){
        #imatge_lloc_turistic{
            align-items: center;
            margin: auto;
            text-align: center;
        }

        #imatge{
            text-align: center;
        }
    }

    @media all and (max-width: 460px){
        #imatge_lloc_turistic{
            width: 250px;
        }

        #imatge_map{
            width: 250px;
        }
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
                    <span class="prova animate__animated animate__fadeInLeftBig">Lloc emblemàtic<h3 class="" id="text_actiu"></h3></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container_info_turistica">
       <div class="container recuadre_allotjament" v-if="carregat">
        <div class="row mb-4">
            <p class="text-center text-align-center m-auto" id="titol_monument" v_if="carregat" style="color:navy;">{{ info_lloc_turistic.nom_turisme }}</p>
        </div>
        <div class="row mt-5 m-auto" v-if="carregat">
                <div class="col-md-5 col-sm-12 text-align-center justify-content-center m-auto" id="imatge">
                    <img :src="'images/img_info_turistica/' + info_lloc_turistic.imatge" class="justify-content-center m-auto" id="imatge_lloc_turistic">
                </div>
                <div class="col-md-1 col-sm-12"></div>
                <div class="col-md-6 col-sm-12 m-auto justify-content-center " id="imatge">

                    <p class="text-center mt-3 align-middle"><b>Horari:</b></p><p class="text-center align-middle" v-html="info_lloc_turistic.horari"></p>
                    <p class="text-center align-middle"><b>Preu:</b> {{ info_lloc_turistic.preu }}</p>
                </div>
        </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 m-auto mt-3" id="desc_allotjament" v-if="carregat">
                    <p class='text-justify' v-html="info_lloc_turistic.descripcio"></p>
                </div>
            </div>
       </div>
       <div class="container recuadre_allotjament">
       <div class="row">
            <div class="col-md-6 col-sm-12 m-auto" id="imatge">
                <!--lloc on s'insertara googlemaps.-->
                <div class="d-block" id="imatge_map"></div>  
            </div>
                   
                
            <!--<div class="col-md-1 col-sm-12"></div>-->
            <div class="col-md-6 col-sm-12 align-middle m-auto" id="desc_allotjament" v-if="carregat">
                <p class="text-center align-middle mt-3"><b>Web:</b> <a :href="'//' + info_lloc_turistic.pagina_web" target="_blank">{{ info_lloc_turistic.pagina_web }} </a></p>
                <p class="text-center align-middle"><b>Email:</b> {{ info_lloc_turistic.email }}</p>
                <p class="text-center align-middle"><b>Telefon:</b> {{ info_lloc_turistic.telefon }}</p>
                <p class="text-center align-middle"><b>Poblacio:</b> {{ info_lloc_turistic.poblacio }}</p>
                <p class="text-center align-middle"><b>Direccio:</b> {{ info_lloc_turistic.direccio }}</p>
            </div>
            </div>
       </div>
   </div>
</div>
</div>
<!--footer de la pagina-->
<?php include('header_footer/footer.php'); ?>
<script>
    var vm = new Vue({
        el: "#app",
        data: {
            info_lloc_turistic: [],
            carregat: false,
            id: ''
        },
        methods:{
            //aqui es recullen les dades del lloc turistic que s'ha buscat a la bbdd apartir d'axios.get i es pasa a la variable info_lloc_turistic.
            dadesLlocTuristic(){
                axios.get("JSON/json_info_turistica/dades_info_turistica.php?id=" + this.id)
                .then(res=>{
                    //console.log(res.data)
                    this.info_lloc_turistic = res.data
                    this.carregat = true

                    //es crida a la funcio initMap
                    initMap()
                })
            },
        },
        created(){
            //es recull la id de la url.
            this.id = window.location.search.split('=')[1]; 
        },
        mounted(){
            //es crida el metode dadesllocturistic
            this.dadesLlocTuristic()
        }
    
    })
    /*Funcio de google maps.*/
    function initMap()
    {
        //es recullen les coordenades de vue.js i es pasan a float.
        var coordenades = {lat: parseFloat(vm.info_lloc_turistic.latitud), lng: parseFloat(vm.info_lloc_turistic.longitud)};
        //es dona un zoom al maps i es centra el lloc proporcionat a les coordenades.
        var opcions = {zoom: 15, center: coordenades}
        //es pasara al div on es mostrara.
        var map = new google.maps.Map(document.getElementById("imatge_map"), opcions);
        //aqui es posa la marca del lloc exacta on es troba
        var marker = new google.maps.Marker({position: coordenades, map: map});
    }

    
    
</script>
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8SCbN9ajO1phNjE3rAMkwcY-psqVEVIM&callback=initMap&libraries=&v=weekly" type="text/javascript"></script>
        
</body>
        <script src="js/whatsapp/animation_whatsapp_top.js"></script>
        <script src="js/cookies/cookies.js"></script>
        <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</html>
