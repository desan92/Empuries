<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <script src="js/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link href="fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.css">
    <title>EMPURIES</title>
    <style>
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
            width: 350px;
            align-items: center;
            margin: auto;
            display: block;
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
    </style>
</head>

<body>
<div id="app">
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
       <div class="container recuadre_allotjament" v-if="carregat">
        <div class="row mb-4">
            <p class="text-center text-align-center m-auto" id="titol_monument" v_if="carregat">{{ info_lloc_turistic.nom_turisme }}</p>
        </div>
        <div class="row mt-5 m-auto" v-if="carregat">
                <div class="col-md-5 col-sm-12 text-align-center justify-content-center m-auto" id="imatge">
                    <img :src="'images/img_info_turistica/' + info_lloc_turistic.imatge" class="justify-content-center m-auto" id="imatge_lloc_turistic">
                </div>
                <div class="col-md-1 col-sm-12"></div>
                <div class="col-md-6 col-sm-12 m-auto justify-content-center " id="imatge">

                    <p class="text-center mt-3 align-middle"><b>Horari:</b></p><p class="text-center align-middle" v-html="info_lloc_turistic.horari"></p></p>
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
       <div class="container recuadre_allotjament" v-if="carregat">
       <div class="row">
            <div class="col-md-6 col-sm-12 m-auto" id="imatge">
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

<script>
    var vm = new Vue({
        el: "#app",
        data: {
            a: '2',
            info_lloc_turistic: null,
            carregat: false,
            id: ''
        },
        methods:{
            dadesLlocTuristic(){
                axios.get("json_info_turistica/dades_info_turistica.php?id=" + this.id)
                .then(res=>{
                    console.log(res.data)
                    this.info_lloc_turistic = res.data
                    this.carregat = true

                    initMap()
                })
            }
        },
        created(){
            this.id = window.location.search.split('=')[1]; 
        },
        mounted(){
            this.dadesLlocTuristic()
        }
    
    })

    function initMap()
    {
        var coordenades = {lat: parseFloat(vm.info_lloc_turistic.latitud), lng: parseFloat(vm.info_lloc_turistic.longitud)};
        var opcions = {zoom: 15, center: coordenades}
        var map = new google.maps.Map(document.getElementById("imatge_map"), opcions);
        var marker = new google.maps.Marker({position: coordenades, map: map});
    }
</script>
       
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAs6i1mssHmgMuKSeGkjqZa-N3nYYSnrY&callback=initMap" type="text/javascript"></script>
        <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
