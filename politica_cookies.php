<?php session_start(); ?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emporium</title>
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="shortcut icon" type="image/png" href="images/logo/logo.png"/>
    <link href="fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
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

    div.row{
        margin-right: 0px;
        margin-left: 0px;
    }

    div.container-fluid{
        padding-right: 0px;
        padding-left: 0px;
    }

    .container_cookies{
        padding: 5%;
        line-height: 26px;
    }
    .container_cookies .row{
        padding: 2%;
        border-radius: 3px;
        background-color: #ffffffc4;
    }

    #icon_cookies{
        color: #47ff5d;
    }

    </style>
</head>

<body>
<?php include('header_footer/header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col p-0">
            <div class="jumbotron jumbotron-fluid" id="photo">
                <span class="prova animate__animated animate__fadeInLeftBig">Política de cookies<h3 class="" id="text_actiu"></h3></span>
            </div>
        </div>
    </div>
    <div class="container_cookies">
        <div class="row">
            <div class="col-12 text-justify">
                <h2 class="text-center" style="color: navy;"><b>Què són les cookies?</b></h2><br>
                <p>Una cookie és un fitxer que es descarrega al seu ordinador en accedir a 
                determinades pàgines web. Les cookies permeten a una pàgina web, entre altres
                coses, emmagatzemar i recuperar informació sobre hàbits de navegació d'un 
                usuari o del seu equip i, depenent de la informació que continguin i de la 
                forma que utilitzi el seu equip, poden utilitzar-se per a reconèixer a 
                l'usuari.</p>
                <div class="div-spacer"></div>
                <h2 class="text-center" style="color: navy;"><b>Per a què s'utilitzen les cookies i quins solen ser les seves finalitats?</b></h2><br>
                <p><i class="fas fa-angle-right" id="icon_cookies"></i> Cookies d'anàlisis: són aquelles cookies que bé, tractades per nosaltres o per tercers,
                ens permeten quantificar el nombre d'usuaris i així realitzar el mesurament i anàlisi 
                estadística de la utilització que fan els usuaris del servei. Per això s'analitza la 
                seva navegació en la nostra pàgina web amb la finalitat de millorar l'experiència de 
                l'usuari.</p>
                <p><i class="fas fa-angle-right" id="icon_cookies"></i> Cookies tècniques: Són aquelles que permeten a l'usuari la navegació a través de
                la pàgina web o aplicació i la utilització de les diferents opcions o serveis
                que en ella existeixen. Per exemple, controlar el trànsit i la comunicació de
                dades, identificar la sessió, accedir a les parts web d'accés restringit,
                recordar els elements que integren una comanda, realitzar la sol·licitud
                d'inscripció o participació en un esdeveniment, utilitzar elements de 
                seguretat durant la navegació i emmagatzemar continguts per a la difusió 
                de vídeos o so.</p>
                <p><i class="fas fa-angle-right" id="icon_cookies"></i> Cookies sobre personalització: Són aquelles que permeten a l'usuari accedir
                al servei amb algunes característiques de caràcter general predefinides en la 
                seva terminal o que el propi usuari defineixi. Per exemple, l'idioma, el tipus 
                de navegador a través del qual accedeix al servei, el disseny de continguts 
                seleccionat, geolocalització del terminal i la configuració regional des d'on 
                s'accedeix al servei.</p>
                <p><i class="fas fa-angle-right" id="icon_cookies"></i> Cookies sobre preferències: Aquestes cookies permeten que els nostres llocs
                web recordin informació que canvia l'aspecte o el comportament del lloc com,
                per exemple, el teu idioma preferit o la regió en la qual et trobes. Per exemple,
                en recordar la teva regió, un lloc web pot proporcionar-te notícies sobre el trànsit
                o butlletins meteorològics locals. Aquestes cookies també et permeten canviar la 
                grandària del text, la font i altres parts de les pàgines web que pots personalitzar.</p>
                <p><i class="fas fa-angle-right" id="icon_cookies"></i> Cookies publicitàries: Són aquelles que permeten la gestió eficaç dels espais 
                publicitaris que s'han inclòs en la pàgina web o aplicació des de la qual es presta 
                el servei. Permeten adequar el contingut de la publicitat perquè aquesta sigui 
                rellevant per a l'usuari i per a evitar mostrar anuncis que l'usuari ja hagi vist.</p>
            </div>
        </div>
    </div>
</div>
 <?php include('header_footer/footer.php'); ?>
    
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script>
    </script>
</body>
</html>
