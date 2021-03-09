<?php 
session_start();
//es comprava que la session rol esta creada i que aquesta es client si no s'envia a index.php
if(isset($_SESSION["rol"]))
{
    $rol = $_SESSION["rol"];
    if(!empty($rol) && $rol != "Client")
    {
        header("Location: index.php");
    }
    else
    {
        //es pasen les variables session creades al login a variable.
        if(isset($_SESSION["user"], $_SESSION["nom"], $_SESSION['cognom'], $_SESSION['mail'], $_SESSION["id"]))
        {
            $user = $_SESSION["user"];
            $nom = $_SESSION["nom"];
            $cognom = $_SESSION['cognom'];
            $mail = $_SESSION['mail'];
            $id = $_SESSION["id"];
            //echo $id;
        }
        else
        {
            header("Location: index.php");
        }
    }
    //header("Location: index.php");
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

        .container_cistella_client{
            background-color: #ffffffc4;
            border-radius: 5px;
        }



    </style>
</head>

<body>
<div id="app">
    <!--header de la pagina -->
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
       <div class="container">
            <div class="container_cistella_client">
       <div class="row">
                <div class="col">
                <h2 class="text-center m-auto pt-5" style="color: navy;"><span><b>Cistella de la Compra</b></span></h2>
                </div>
            </div>
        <div class="row mt-5">
            <div class="col-12">
            <div class="container pt-3">
                <!-- Alert que surt si l'usuari no te cap item a la cistella.-->
                <div v-if="!cistella.length" class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>&nbsp;&nbsp;No hi ha items a la cistella de compra.</div>
                <!-- En cas de tenir productes a la cistella es mostra la taula seguent.-->
                <div class="table-responsive shopping-cart">
                    <table  v-if="cistella.length" class="table">
                        <thead>
                            <tr>
                                <th>Nom Producte</th>
                                <th class="text-center">Quantitat</th>
                                <th class="text-center">Afegir</th>
                                <th class="text-center">Treure</th>
                                <th class="text-center">Total Producte</th>
                                <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="cistella/items_cistella.php?all_items=true">Netejar cistella</a></th>
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
                                <td class="text-center text-lg text-medium"><a  :href="'cistella/items_cistella.php?add=1&id=' + cistella.id"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg></a></td>
                                <td class="text-center text-lg text-medium"><a  :href="'cistella/items_cistella.php?substract=1&id=' + cistella.id"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg></a></td>
                                <td class="text-center text-lg text-medium">{{ cistella.total_producte }}€</td>
                                <td class="text-center"><a class="remove-from-cart" :href="'cistella/items_cistella.php?item=' + cistella.id" data-toggle="tooltip" title="" data-original-title="Remove item"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div  v-if="cistella.length" class="shopping-cart-footer">
                    <div class="column text-lg">Total: <span class="text-medium">{{ total }}€</span></div>
                </div>
                <div  v-if="cistella.length" class="shopping-cart-footer">
                    <div class="column"><a class="btn btn-outline-secondary" href="visites.php"><i class="icon-arrow-left"></i>&nbsp;Tornar a visites</a></div>
                    <div class="column"><a class="btn btn-success" href="finalitzar_compra.php">Finalitzar compra</a></div>
                </div>
                <?php
                    /**
                     * si la quantitat introduida per producte es superior a la que hi ha a la bbdd es mostra error.
                     */
                        if(isset($_GET["quantitat"]) && !empty($_GET["quantitat"]))
                        {
                            echo "<div class='row'>
                                    <div class='col'>
                                        <div class='text-center'>
                                            <p style='color: red;'>Error, has superat la quantitat de reserves permeses ha aquesta visita.</p>
                                        </div>
                                    </div>
                                </div> ";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
 
    
    
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <!--footer de la pagina.-->
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
            //dadesLLocturistic recull la informacio de les visites seleccionades per introduirse a la cistella de la compra.
            dadesLlocTuristic(){
                axios.get("cistella/visualitzar_session.php")
                .then(res=>{
                    this.cistella = res.data
                    this.carregat = true

                    //es calcula el total de la compra.
                    this.total = this.cistella.reduce((sum, curr) => sum + curr.total_producte, 0);
                })
            }
        },
        mounted(){
            //es crida al metode dadesllocturistic.
            this.dadesLlocTuristic()
        }
    
    })

    </script>

    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</body>
</html>
