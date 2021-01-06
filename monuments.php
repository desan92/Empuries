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
        #enllaç_img{
            width: 250px;
            height: 310px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
            transition: transform .2s;
        }

        #enllaç_img:hover {
            transform: scale(1.025);
        }
        #imatges_turistiques{
            border: 5px solid white;
            height: 250px;
            width: 250px;
        }

        #text_img_turistiques{
            border: 5px solid white;
            width: 250px;
            height: 60px;
            background-color: white;
            text-align: center;
        }

        #enllaç_img a{
            text-decoration: none;
            color: navy;
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
                    <span class="prova animate__animated animate__fadeInLeftBig">Llocs turístics<h3 class="" id="text_actiu"></h3></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
       <div class="row mt-3">
            <div class="col-lg-4 col-md-6 col-sm-12 thumb float-left" v-if="carregat" v-for="turisme in info_turistica">
                <div id="enllaç_img">
                    <a class="thumbnail" :href="'info_lloc_turistic.php?id=' + turisme.id_turisme">
                        <div>
                            <img class="img-responsive css_img" id="imatges_turistiques" :src="'images/img_info_turistica/' + turisme.imatge" alt= "">
                        </div>
                        <div id="text_img_turistiques">
                            <p>{{ turisme.nom_turisme }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('header_footer/footer.php'); ?>
    <script>
        var vm = new Vue({
            el: "#app",
            data: {
                info_turistica: [],
                carregat: false,
            },
            methods:{
                dadesTuristiques(){
                    axios.get("json_info_turistica/dades_info_turistica.php")
                    .then(res=>{
                        console.log(res.data)
                        this.info_turistica = res.data
                        this.carregat = true

                        Mapa()
                    })
                }
            },
            mounted(){
            this.dadesTuristiques()
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
