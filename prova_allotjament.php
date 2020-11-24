<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <script src="js/vue.js"></script>
	<script src="js/axios.min.js"></script>
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
                                <li><a href="#">Llocs turistics</a></li>
                                <li><a href="#">Visitas guiades</a></li>
                                <li><a href="allotjaments.php">Allotjaments</a></li>
                                <li><a href="#">About us</a></li>
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
                    i a més amb garantia de qualitat.</p>
            </div>
            </div>
            <div class="row m-1">
                <div class="col-sm-12 m-auto justify-content-center form-group">
                    <select class="form-control" id="exampleFormControlSelect1" v-model="url">
                        <option v-for="ar in sortedArray">{{ ar.Poblacio }}</option>
                    </select>
                </div>
            </div>
            <div class="row m-1">
                <div class="col-sm-12 mt-4 text-center form-group">
                    <div>
                        <a :href="'json_allotjament/dades_allotjament.php?city=' + url" class="btn_cerca">Cerca</a>
                    </div>
                </div>
            </div>
       </div>
       
       <div class="container recuadre_allotjament" v-for="item in items">
            <div class="row">
                <div class="col-md-5 col-sm-12 m-auto" id="imatge">
                    <img :src="'images/img_allotjament/' + item.imatge" id="imatge_allotjament">
                </div>
                <div class="col-md-1 col-sm-12"></div>
                <div class="col-md-6 col-sm-12" id="desc_allotjament">
                        <p><b>Allotjament:</b> {{ item.Nom }}</p>
                        <p><b>Adreça:</b> {{ item.Direccio }}</p>
                        <p><b>Poblacio:</b> {{ item.Poblacio }}</p>
                        <p><b>Telefon:</b> {{ item.Telefon }}</p>
                        <p><b>Web:</b> <a v-bind:href="'//' + item.web" target="_blank"> {{ item.web }}</a></p>
                        <p><b>Email:</b> {{ item.mail }}</p>
                </div>
            </div>
       </div>
       <!--<div class="container recuadre_allotjament">
            <div class="row">
                <div class="col-md-5 col-sm-12 m-auto" id="imatge">
                    <p class="text-center" id="titol_monument">Castell Gala Dalí</p>
                    <img src="images/img_allotjament/albons.jpg" class="" id="imatge_allotjament">
                    <p class="text-center mt-3">Horari: primavera-estiu: De Dimarts a Diumenge De 10:30 a 14h i De 15:30 a 19:30
                    Tardor- hivern: De dimecres a diumenge	De 10:30 a 15 h	14:15 h
                    </p>
                    <p class="text-center">Preu: 1000.80€</p>
                </div>
                <div class="col-md-1 col-sm-12"></div>
                <div class="col-md-6 col-sm-12" id="desc_allotjament">
                        <p class="text-justify">El Castell Gala Dalí de Púbol, obert al públic des del 1996, permet descobrir un edifici medieval on Salvador Dalí va materialitzar un desbordant esforç creatiu pensant en una persona: Gala, i en una funció, un lloc adient per al descans i el refugi de la seva esposa. El pas del temps va determinar la transformació d'aquest espai, entre 1982 i 1984, en el darrer taller de Salvador Dalí i en el mausoleu per a la seva musa.<br><br>

Documentat des del segle XI, l'estructura bàsica de l'actual edifici, de tres plantes i articulat al voltant d'un pati alt i estret, cal situar-la durant el període de màxima esplendor de la baronia de Púbol: la segona meitat del segle XIV i principi del XV.<br><br>

Quan Dalí va comprar el Castell, el 1969, estava molt deteriorat, amb sostres caiguts, esquerdes importants i el jardí en estat semisalvatge. Tot això atorgava al conjunt un aspecte romàntic que és el que els Dalí valoraren i intentaren mantenir en la restauració que van encomanar. Es va consolidar l'aspecte ruïnós exterior, sense amagar les cicatrius provocades pel pas del temps.  Salvador Dalí  va utilitzar de manera molt intel·ligent les parets i els sostres semiderruïts, creant espais insospitats i de dimensions molt contrastades; va concebre la decoració interior basant-se en representacions pictòriques als murs, falses arquitectures, barroquisme tèxtil, antiguitats, simbologia de caire romàntic,... El resultat és un lloc tancat, misteriós, privat, auster i sobri, amb espais de gran bellesa, com ara l'antiga cuina convertida en cambra de bany o el Saló del Piano.</p>
                </div>
            </div>
            
       </div>
       <div class="container recuadre_allotjament">
       <div class="row">
                <div class="col-md-6 col-sm-12 m-auto" id="imatge">
                <img src="images/img_allotjament/albons.jpg" class="d-block" id="imatge_map">
                </div>
                <div class="col-md-1 col-sm-12"></div>
                <div class="col-md-5 col-sm-12" id="desc_allotjament">
                <p class="text-center">web: www.salvador-dali.org</p>
                    <p class="text-center">email: reserves@fundaciodali.org</p>
                    <p class="text-center">telefon: 972488655</p>
                    <p class="text-center">Poblacio: Pubol</p>
                    <p class="text-center">direccio: Gala Dali, s/n</p>
                </div>
            </div>
       </div>
   </div>-->
   <div class="container recuadre_allotjament">
        <div class="row mb-4">
            <p class="text-center text-align-center m-auto" id="titol_monument">Castell Gala Dalí</p>
        </div>
        <div class="row mt-5 m-auto">
                <div class="col-md-5 col-sm-12 text-align-center justify-content-center m-auto" id="imatge">
                    <img src="images/img_allotjament/albons.jpg" class="justify-content-center m-auto" id="imatge_allotjament">
                </div>
                <div class="col-md-1 col-sm-12"></div>
                <div class="col-md-6 col-sm-12 m-auto justify-content-center " id="imatge">

                    <p class="text-center mt-3 align-middle"><b>Horari:</b> De maig a octubre: de dimarts a dissabte d’11.00 a 20.00 hores; diumenge i festius, d’11.00 a 14.00 hores
                        <br>De novembre a abril: de dimarts a dissabte d’11.00 a 19.00 hores; diumenge i festius, d’11.00 a 14.00 hores
                    </p>
                    <p class="text-center align-middle"><b>Preu:</b> 1000.80€</p>
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-md-12 col-sm-12 m-auto mt-3" id="desc_allotjament">
                        <p class="text-justify">El Castell Gala Dalí de Púbol, obert al públic des del 1996, permet 
                        descobrir un edifici medieval on Salvador Dalí va materialitzar un desbordant esforç creatiu
                        pensant en una persona: Gala, i en una funció, un lloc adient per al descans i el refugi de 
                        la seva esposa. El pas del temps va determinar la transformació d'aquest espai, entre 1982 
                        i 1984, en el darrer taller de Salvador Dalí i en el mausoleu per a la seva musa.<br><br>

                        Documentat des del segle XI, l'estructura bàsica de l'actual edifici, de tres plantes i 
                        articulat al voltant d'un pati alt i estret, cal situar-la durant el període de màxima 
                        esplendor de la baronia de Púbol: la segona meitat del segle XIV i principi del XV.<br><br>

                        Quan Dalí va comprar el Castell, el 1969, estava molt deteriorat, amb sostres caiguts, 
                        esquerdes importants i el jardí en estat semisalvatge. Tot això atorgava al conjunt un 
                        aspecte romàntic que és el que els Dalí valoraren i intentaren mantenir en la restauració 
                        que van encomanar. Es va consolidar l'aspecte ruïnós exterior, sense amagar les cicatrius 
                        provocades pel pas del temps.  Salvador Dalí  va utilitzar de manera molt intel·ligent les 
                        parets i els sostres semiderruïts, creant espais insospitats i de dimensions molt 
                        contrastades; va concebre la decoració interior basant-se en representacions pictòriques 
                        als murs, falses arquitectures, barroquisme tèxtil, antiguitats, simbologia de caire 
                        romàntic,... El resultat és un lloc tancat, misteriós, privat, auster i sobri, amb espais 
                        de gran bellesa, com ara l'antiga cuina convertida en cambra de bany o el Saló del Piano.</p>
                </div>
            </div>
       </div>
       <div class="container recuadre_allotjament">
       <div class="row">
                <div class="col-md-6 col-sm-12 m-auto" id="imatge">
                <img src="images/img_allotjament/albons.jpg" class="d-block" id="imatge_map">
                </div>
                <!--<div class="col-md-1 col-sm-12"></div>-->
                <div class="col-md-6 col-sm-12 align-middle m-auto" id="desc_allotjament">
                <p class="text-center align-middle"><b>Web:</b> www.salvador-dali.org</p>
                    <p class="text-center align-middle"><b>Email:</b> reserves@fundaciodali.org</p>
                    <p class="text-center align-middle"><b>Telefon:</b> 972488655</p>
                    <p class="text-center align-middle"><b>Poblacio:</b> Pubol</p>
                    <p class="text-center align-middle"><b>Direccio:</b> Gala Dali, s/n</p>
                </div>
            </div>
       </div>
   </div>
   </div>
    <script>
        var vm = new Vue({
            el: "#app",
            data: {
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
                    { Poblacio: "Llança"}

                ],
                items: [
                    { Nom: "Hotel Jonquera", Direccio: "Avinguda de Galicia, 2-4", Poblacio :"La Jonquera", Telefon: 972556555, web: "hotelnacionaljonquera.com", mail: "", imatge: "hotel_lajonquera.jpg" },
                    { Nom: "La Fornal dels Ferrers",Direccio: "Carrer Major, 31",Poblacio: "Terrades",Telefon: 972542004,web: "www.lafornal.com",mail: "info@lafornal.com", imatge: "lafornal.jpg" }
                ]
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
            }
       
        })
    </script>
       
        <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
        <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
