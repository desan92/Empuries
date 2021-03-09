<?php session_start(); ?>
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
        .container_allotjaments{
            padding-left: 5%;
            padding-right: 5%;
        }
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
            background-color: #0000f0;
            color: white !important;
        }

        /**media querie  que adapta les imatdes dels hotels i el seu contingut al centre del
        div quan es menosr a 768px*/
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
        <!--header de la pagina-->
    <?php include('header_footer/header.php'); ?>
        <div class="container-fluid">
        <div class="row">
            <div class="col p-0">
                <div class="jumbotron jumbotron-fluid" id="photo">
                    <span class="prova animate__animated animate__fadeInLeftBig">Llocs per allotjar-se<h3 class="" id="text_actiu"></h3></span>
                </div>
            </div>
        </div>
        </div>
        <div class="container_allotjaments">
       <div class="container recuadre_allotjament">
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
                <div class="col-md-3"></div>
                <div class="col-md-6 m-auto justify-content-center">
                    <select class="form-control" id="exampleFormControlSelect1" v-model="url">
                        <option v-for="ar in sortedArray">{{ ar.Poblacio }}</option>
                    </select>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row m-1">
                <div class="col-sm-12 mt-4 text-center">
                    <div>
                        <a :href="'allotjaments.php?city=' + url" class="btn btn_cerca" role="button">Cerca</a>
                    </div>
                </div>
            </div>
       </div>
       <!--v-for al div que contindra tota l'informacio dels allotjaments enmagatzemants.-->
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
   <!--footer de la pagina-->
    <?php include('header_footer/footer.php'); ?>

   <script>

        var vm = new Vue({
            el: "#app",
            data: {
                allotjaments: [],
                url: '',
                /**array amb totes les poblacions amb allotjaments troabats a la bbdd. */
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
                carregat: false,
            },
            methods:{
                /**
                 * dades d'allotjaments carregades de la bbdd i agafades per axios on posteriorment 
                 * es pasaran a la variable allotjaments on sera utilitzats per posar a la pagina web
                 */
                dadesAllotjament(){
                    axios.get("JSON/json_allotjament/dades_allotjament.php?city=" + this.codi)
                    .then(res=>{
                    this.allotjaments = res.data
                        //es mante en false si no esta carregat per que no dongui error i es creiin div sense contigut.
                        if(this.allotjaments.length == 0)
                        {
                            this.carregat = false
                        }
                        else
                        {
                            this.carregat = true
                        }
                    })
                }
            },
            computed: {
                //funcio amb la que s'ordenen les poblacions del select.
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
                //s'agafa el codi id pasat per get de l'url
                this.codi = window.location.search.split('=')[1]; 
            },
            mounted(){
                //es crida al metode dadesallotjaments.
            this.dadesAllotjament()
        },
       
        })
    </script>
        <script src="js/whatsapp/animation_whatsapp_top.js"></script>
        <script src="js/cookies/cookies.js"></script>
        <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
