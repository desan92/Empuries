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
        #descripcio_hospedatge{
            height: 200px;
            width: 100%;
        }
        #imatge_allotjament{
            border: 5px solid navy;
            height: 200px;
            width: 300px;
        }

        #desc_allotjament{
            font-size: 14px;
        }

        .btn_cerca{
            background-color: navy;
            color: white !important;
        }

        .btn_cerca:hover{
            background-color: white;
            color: black !important;
        }

        @media all and (max-width: 768px){
        #imatge_allotjament{
            align-items: center;
            margin: auto;
            text-align: center;
        }
        #desc_allotjament{
            top: 10px;
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
                </nav>
              </div>
           </div>
       </div>
       <div class="container recuadre_allotjament">
           <div class="row m-1">
                <span class="col-12 m-auto text-center"><b>ALLOTJAMENT</b></span>
           </div>
            <div class="row m-1 mt-3">
                <div class="col-12 m-auto justify-content-center" id="desc_allotjament">
                    <img class="img-fluid" src="images/1.jpg" id="descripcio_hospedatge">
                </div>
            </div>
            <div class="row m-1 mt-3">
                <div class="col-12 justify-content-center text-justify">
                    <p>Dormir a la nostra comarca pot ser tot un plaer, al gust de cadascú: hotels de luxe per als amants de les grans 
                    comoditats, hotels o hostals familiars per als que cerquen el contacte directe amb la gent de la comarca, apartaments 
                    de lloguer per als que volen una independència total, gran varietat de càmpings situats en llocs bellíssims per
                    als qui els agrada aquest estil de vacances, i turisme rural per als que necessiten urgentment desconnectar de  
                    tot.<br><br>
                    És a dir, trobareu l'allotjament que vulgueu segons les vostres necessitats i preferències,
                    i a més amb garantia de qualitat. Per cercar els allotjaments amb millor qualitat per allotjar-se podeu fer servir el cercador 
                    que es troba a sota on selecionant la localitat trobareu els hotels, hostals i altres instalacions on podreu gaudir de la
                    nostre terra. </p>  
                </div>
            </div>
            <div class="row m-1">
                <div class="col-sm-12 m-auto justify-content-center">
                    <select class="form-control" id="exampleFormControlSelect1" v-model="url">
                        <option v-for="ar in sortedArray">{{ ar.Poblacio }}</option>
                    </select>
                </div>
            </div>
            <div class="row m-1">
                <div class="col-sm-12 mt-4 text-center">
                    <div>
                        <a :href="'allotjaments.php?city=' + url" class="btn btn_cerca" role="button">Cerca</a>
                    </div>
                </div>
            </div>
       </div>
       
       <div v-if="carregat" class="container recuadre_allotjament" v-for="allotjament in allotjaments">
            <div class="row">
                <div class="col-md-5 col-sm-12 m-auto" id="imatge">
                    <img :src="'images/img_allotjament/' + allotjament.imatge" id="imatge_allotjament">
                </div>
                <div class="col-md-1 col-sm-12"></div>
                <div class="col-md-6 col-sm-12" id="desc_allotjament">
                        <p><b>Allotjament:</b> {{ allotjament.nom_allotjament }}</p>
                        <p><b>Adreça:</b> {{ allotjament.direccio }}</p>
                        <p><b>Poblacio:</b> {{ allotjament.poblacio }}</p>
                        <p><b>Telefon:</b> {{ allotjament.telefon }}</p>
                        <p><b>Web:</b> <a v-bind:href="'//' + allotjament.web" target="_blank"> {{ allotjament.web }}</a></p>
                        <p><b>Email:</b> {{ allotjament.email }}</p>
                </div>
            </div>
       </div>
   </div>
    </div>

   <script>

        var vm = new Vue({
            el: "#app",
            data: {
                allotjaments: [],
                url: '',
                array: [ 
                    { Poblacio: ""},
                    { Poblacio: "Portbou"},
                    { Poblacio: "Cantallops"},
                    { Poblacio: "Figueres"},
                    { Poblacio: "La Jonquera"},
                    { Poblacio: "Darnius"},
                    { Poblacio: "Terrades"},
                    { Poblacio: "Pont de molins"},
                    { Poblacio: "Garriguella"},
                    { Poblacio: "Peralada"},
                    { Poblacio: "Avinyonet de Puigventos"},
                    { Poblacio: "Palau Saverdera"},
                    { Poblacio: "Castello d'Empuries"},
                    { Poblacio: "Empuriabrava"},
                    { Poblacio: "Santa Margarita"},
                    { Poblacio: "Roses"},
                    { Poblacio: "Cadaques"},
                    { Poblacio: "Llança"},
                    { Poblacio: "Sant Pere Pescador"},
                    { Poblacio: "Albons"},
                    { Poblacio: "L'Escala"},
                    { Poblacio: "L'Estartit"},
                    { Poblacio: "Torroella de Montgri"},
                    { Poblacio: "Casavells"},
                    { Poblacio: "Gualta"},
                    { Poblacio: "Fonteta"},
                    { Poblacio: "Peratallada"},
                    { Poblacio: "Pals"},
                    { Poblacio: "Begur"},
                    { Poblacio: "Tamariu"},
                    { Poblacio: "Llafranc"},
                    { Poblacio: "Palafrugell"},
                    { Poblacio: "Palamos"},
                    { Poblacio: "Sant Antoni de Calonge"},
                    { Poblacio: "Calonge"},
                    { Poblacio: "Platja d'Aro"},
                    { Poblacio: "Sant Feliu de Guixols"}
                ],
                items: [
                    { Nom: "Hotel Jonquera", Direccio: "Avinguda de Galicia, 2-4", Poblacio :"La Jonquera", Telefon: 972556555, web: "hotelnacionaljonquera.com", mail: "", imatge: "hotel_lajonquera.jpg" },
                    { Nom: "La Fornal dels Ferrers",Direccio: "Carrer Major, 31",Poblacio: "Terrades",Telefon: 972542004,web: "www.lafornal.com",mail: "info@lafornal.com", imatge: "lafornal.jpg" }
                ],
                carregat: false,
            },
            methods:{
                dadesAllotjament(){
                    axios.get("json_allotjament/dades_allotjament.php?city=" + this.codi)
                    .then(res=>{
                    console.log(res.data)
                    this.allotjaments = res.data

                        if(this.allotjaments.length == 0)
                        {
                            this.carregat = false
                        }
                        else
                        {
                            this.carregat = true
                        }
                        console.log(this.carregat)
                    })
                }
            },
            computed: {
                sortedArray: function(){
                    function compare(a, b) 
                    {
                        if (a.Poblacio < b.Poblacio)
                        {
                            return -1;
                        }
                        if (a.Poblacio > b.Poblacio)
                        {
                            return 1;
                        }
                        return 0;
                    }

                    return this.array.sort(compare);
                }
            },
            created(){
                this.codi = window.location.search.split('=')[1]; 
            },
            mounted(){
            this.dadesAllotjament()
        },
       
        })
    </script>
       
        <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
