<?php 
session_start();
//es comprava que existeix la session ron i que es client si no torna a index.php
if(isset($_SESSION["rol"]))
{
    $rol = $_SESSION["rol"];
    //$rol = str_replace("<br>", '', $rol);;
    if(!empty($rol) && $rol != "Client")
    {
        header("Location: index.php");
    }
    else
    {
        //es pasen les session creades al login a una variable.
        if(isset($_SESSION["user"], $_SESSION["nom"], $_SESSION['cognom'], $_SESSION['mail'], $_SESSION["id"]))
        {
            $user = $_SESSION["user"];
            $nom = $_SESSION["nom"];
            $cognom = $_SESSION['cognom'];
            $mail = $_SESSION['mail'];
            $id = $_SESSION["id"];

        }
        else
        {
            header("Location: index.php");
        }
    }

}
else
{
    header("Location: index.php");
}

?>
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
    <script src="https://www.paypal.com/sdk/js?client-id=AXxjs0rLFGBbancpBQeJzkrmASRTFe4VyiEjDq5n97zoR1oHw5oVwt2wLVIkMjG5UQYxSZIStaKJKF_X&currency=EUR"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
    </script>
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

        #table_monuments{
            padding: 2%;
            border-radius: 3px;
            background-color: #ffffffc4;
        }

        #paypal-button-container{
            background-color: #ffffffc4; 
            padding: 5%;
        }

    </style>
</head>

<body>
<div id="app">
    <!--header de la pagina.-->
    <?php include('header_footer/header.php'); ?>
    <div class="container-fluid">
       <div class="row">
       <div class="col p-0">
              <div class="jumbotron jumbotron-fluid" id="photo">
                  <span class="prova animate__animated animate__fadeInLeftBig">Cistella Compra<h3 class="" id="text_actiu"></h3></span>
              </div>
           </div>
       </div>
       <div class="row">
            <div class="col p-0">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: navy;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span><svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-list text-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav list-inline text-center mx-auto justify-content-center">
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="index.php">Inici</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="profile_client.php">Perfil</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="comandes_client.php">Comandes</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="cistella_compra.php">Cistella</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="log_register/session_exit.php">Sortir</a>
                    </li>
                    </ul>
                </div>
            </nav>
            </div>
       </div><br>
        <div class="row">
            <div class="col-md-8">
            <div class="container pt-3" style="background-color: #ffffffc4;">
                <!-- Alert que surt si no hi ha cap item a finalitzar compra.-->
                <div v-if="!cistella.length" class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>&nbsp;&nbsp;No hi ha items a la cistella de compra.</div>
                <!-- Part informativa de la compra abans de comprar.-->
                <div class="table-responsive shopping-cart">
                    <table  v-if="cistella.length" class="table">
                        <thead>
                            <tr>
                                <th>Nom Producte</th>
                                <th class="text-center">Quantitat</th>
                                <th class="text-center">Total Producte</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="carregat" v-for="cistella in cistella">
                                <td>
                                    <div class="product-item">
                                        <a class="product-thumb" :href="'info_visita.php?id=' + cistella.id"><img :src="'images/img_visites/' + cistella.imatge" alt="Product"></a>
                                        <div class="product-info">
                                            <h4 class="product-title"><a :href="'info_visita.php?id=' + cistella.id">{{ cistella.nom }}</a></h4>
                                            <span><em>Preu:</em> {{ cistella.preu }}€</span><!--<span><em>Color:</em> Dark Blue</span>-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center text-lg text-medium">{{ cistella.quantitat }}</td>
                                <td class="text-center text-lg text-medium">{{ cistella.total_producte }}€</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="shopping-cart-footer">
                    <div class="column text-lg">Total: <span class="text-medium">{{ total }}€</span></div>
                </div>
                <div class="shopping-cart-footer">
                    <div class="column"><a class="btn btn-outline-secondary" href="cistella_compra.php"><i class="icon-arrow-left"></i>&nbsp;Tornar a la cistella</a></div>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <!--boto de pagament de paypal-->
                <div v-if="cistella.length" id="paypal-button-container"></div>
            </div>
        </div>
    </div>
 
    
    
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <!--footer de la pagina-->
   <?php include('header_footer/footer.php'); ?>
</div>



    <script>
        var vm = new Vue({
        el: "#app",
        data: {
            cistella: [],
            options_cistella: [],
            carregat: false,
            id: '', 
            count: 0, 
            total: ''
        },
        methods:{
            //dadesllocturistic recull la informacio de la varible session_cistella.
            dadesLlocTuristic(){
                axios.get("cistella/visualitzar_session.php")
                .then(res=>{
                    this.cistella = res.data
                    this.carregat = true

                    //es calcula el total de la cistella.
                    this.total = this.cistella.reduce((sum, curr) => sum + curr.total_producte, 0);
                })
            }
        },
        mounted(){
            //es crida al metode dadesllocturistic.
            this.dadesLlocTuristic()
        }
    
    })

    /**
     * script del boto de pagament de paypal.
     */
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              description: "Compra Realitzada a Visites Emporium.",
              amount: {
                currency_code: "EUR",
                value: vm.total,
                breakdown: {
                        item_total: {
                            currency_code: "EUR",
                            value: vm.total //s'introdueix el preu final de la compra.
                        }
                    } 
              },
                items: [
                    
                    <?php
                    /**
                     * foreach realitzar per mostrar a paypal tots els items comprats.
                     */
                            foreach($_SESSION["cistella"] as $index => $array)
                            {
                                echo "{ 
                                        name: \"" . $array['nom'] . "\", 
                                        unit_amount: {
                                            currency_code: 'EUR',
                                            value: \"". $array['preu'] . "\"
                                        },
                                        quantity: \"" . $array['quantitat'] . 
                                     "\"}, ";
                            }
                          ?>
                ],
                shipping: {
                    //informacio del lloc de compra i del "propietari".
                    address:{
                            address_line_1: "Carrer Nou nº 9",
                            admin_area_1: "Figueres",
                            admin_area_2: "Girona",
                            country_code: "ES",
                            postal_code: "17600"
                        },
                    name: {full_name: "Jordi de San Antonio Planas"}
                }
                    
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
              //si s'aproba el pagament surt un alert i s'envia a una pagina on es registrara  a la bbdd.
              if(details.status == "COMPLETED")
              {
                  alert('Transaction completed by ' + details.payer.name.given_name);//details.payer.name.given_name
                  window.location.href = "http://localhost/Emporium/cistella/registre_comanda.php?payment=accept";
              }
              else
              {
                  //si no es realitza pagament saltara un alert.
                  alert('Transaction failed');
              }
            
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page

    </script>

    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</body>
</html>
