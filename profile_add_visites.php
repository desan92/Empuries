<?php 
session_start();
//es comprova que exsiteix l'usuari i que es administrador sino va cap a index.
if(isset($_SESSION["rol"]))
{
    $rol = $_SESSION["rol"];
    //$rol = str_replace("<br>", '', $rol);;
    if(!empty($rol) && $rol != "Administrador")
    {
        header("Location: index.php");
    }
    else
    {
        //es pasen les sessions creades al login a variables.
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

        #perfil_info{
            margin-top: 50px;
            margin-bottom: 50px;
        }

        #titol_info{
            font-size: 21px;
        }

        #imatge-personal{
            height: 150px;
            width: 150px;
            border: 5px solid navy;
            text-align: center;
        }

        .recuadre_personal{
            border-radius: 5px;
            height: 600px;
            padding: 25px;
            background-color: #ffffffc4;
            margin-top:4%;
            margin-bottom:4%;
        }

        #table_monuments{
            padding: 2%;
            border-radius: 3px;
            background-color: #ffffffc4;
        }

        #container_visites_add{
            background-color: #ffffffc4;
            border-radius: 5px;
        }

        #label_add{
            color: navy;
            font-weight: 600;
        }

        @media all and (max-width: 768px){
            #desc_user{
                margin-top: 25px;
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
                  <span class="prova animate__animated animate__fadeInLeftBig">Afegir Visita<h3 class="" id="text_actiu"></h3></span>
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
                        <a class="nav-link text-light" href="profile_admin.php">Perfil</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="comandes_admin.php">Comandes</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="profile_visites_admin.php">Visites</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-light" href="log_register/session_exit.php">Sortir</a>
                    </li>
                    </ul>
                </div>
            </nav>
            </div>
       </div>
       <div class="div-spacer"></div>
       <div class="div-spacer"></div>
       <div class="container">

       <div id="container_visites_add">
       <div class="row">
           <div class="col-12">
               <h2 class="text-center m-auto pt-5" style="color: navy;"><span><b>Afegir Visites</b></span></h2>
           </div>
       </div>
        <div class="div-spacer"></div>
        <div class="div-spacer"></div>
        <div class="div-spacer"></div>
       <div class="row">
           <div class="col">
               <!--formulari per afegir una nova visita.-->
           <form action="JSON/json_visites/dades_visites.php?add=true" name="visites" method="POST" enctype="multipart/form-data" onsubmit="return validar();">
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <label id="label_add">Nom Visita</label>
                        <input type="text" name="nom_visita" id="nom_visita" class="form-control mb-2" placeholder="Nom visita">
                    </div>
                    <div class="col-md-5">
                        <label id="label_add">Preu visita</label>&nbsp;<span id="preu_intro" style="color: red;"></span>
                        <input type="number" step=0.01  name="preu" id="preu" class="form-control mb-2" placeholder="Preu">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                    <label id="label_add">Idioma</label>
                        <input type="text" name="idioma" id="idioma" class="form-control mb-2" placeholder="Idioma">
                    </div>
                    <div class="col-md-5">
                        <label id="label_add">Places visita</label>
                        <input type="number" name="places_totals" id="places_totals" class="form-control mb-2" placeholder="Places">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <label id="label_add">Durada visita</label>
                        <input type="text" name="durada" id="durada" class="form-control mb-2" placeholder="Durada">
                    </div>
                    <div class="col-md-5">
                        <label id="label_add">Punt de trobada</label>
                        <input type="text" name="punt_trobada" id="punt_trobada" class="form-control mb-2" placeholder="Lloc de trobada">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <label id="label_add">Latitud</label>
                        <input type="number" name="latitud" id="latitud" step=0.0000001 class="form-control mb-2" placeholder="Latitud">
                    </div>
                    <div class="col-md-5">
                        <label id="label_add">Longitud</label>
                        <input type="number" name="longitud" id="longitud" step=0.0000001 class="form-control mb-2" placeholder="Longitud">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <label id="label_add" >Imatge visita</label>
                        <input type="file" id="fitxer" name="fitxer" class="form-control-file mb-2" style="font-size: 14px;">
                    </div>
                    <div class="col-md-5">
                        <label id="label_add" >Dia de visita</label>
                        <input type="date" name="dia_visita" id="dia_visita" class="form-control mb-2" v-bind:min="date" placeholder="Dia visita">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-10">
                        <label id="label_add" for="exampleFormControlTextarea1">Introducció</label>
                        <textarea class="form-control mb-2" name="intro" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-10">
                    <label id="label_add" for="exampleFormControlTextarea2">Descripció</label>
                    <textarea class="form-control mb-2" name="desc" id="exampleFormControlTextarea2" rows="3" required></textarea>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="form-row pb-4">
                    <div class="col-md-1"></div>
                    <div class="col-10 text-right">
                        <button type="submit" class="btn btn-primary">Afegir</button>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </form>
            <?php
                //si arriba la variable insert per get vol dir que hi ha hagut un error al insertar i es mostrara un error.
                if(isset($_GET["insert"]) && !empty($_GET["insert"]))
                {
                    echo "<div class='row'>
                            <div class='col'>
                                <div class='text-center'>
                                    <p style='color: red;'>Error, l'informació no s'ha penjat correctament.</p>
                                </div>
                            </div>
                        </div> ";
                }
                else if(isset($_GET["buit"]) && !empty($_GET["buit"]))
                {
                    //si arriba aquest missatge alguna variable esta buida.
                    echo "<div class='row'>
                            <div class='col'>
                                <div class='text-center'>
                                    <p style='color: red;'>Alguna variable esta buida.</p>
                                </div>
                            </div>
                        </div> ";
                }
                else if(isset($_GET["error"]) && !empty($_GET["error"]))
                {
                    //si arriba error alguna variable enviada no existeix.
                    echo "<div class='row'>
                            <div class='col'>
                                <div class='text-center'>
                                    <p style='color: red;'>Alguna variable no existeix.</p>
                                </div>
                            </div>
                        </div> ";
                }
                else if(isset($_GET["fitxer"]) && !empty($_GET["fitxer"] == "existeix"))
                {
                    //si arriba fitxer per get vol dir que el fitxer seleccionat existeix.
                    echo "<div class='row'>
                            <div class='col'>
                                <div class='text-center'>
                                    <p style='color: red;'>Error, el fitxer ja existeix.</p>
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
    <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <!--footer de la pagina-->
   <?php include('header_footer/footer.php'); ?>
</div>
   <script>
   
   function validar()
    {
        var nom = document.forms["visites"]["nom_visita"].value;
        var preu = document.forms["visites"]["preu"].value;
        var idioma = document.forms["visites"]["idioma"].value;
        var places = document.forms["visites"]["places_totals"].value;
        var durada = document.forms["visites"]["durada"].value;
        var p_trobada = document.forms["visites"]["punt_trobada"].value;
        var latitud = document.forms["visites"]["latitud"].value;
        var longitud = document.forms["visites"]["longitud"].value;
        var d_visita = document.forms["visites"]["dia_visita"].value;
        var intro = document.forms["visites"]["exampleFormControlTextarea1"].value;
        var desc = document.forms["visites"]["exampleFormControlTextarea2"].value;

        //es compraova que les varibales no estiguin vuides
        if(nom == "" || preu == "" || idioma == "" || places == "" || durada == "" || p_trobada == "" || latitud == "" || longitud == "" || d_visita == "" || intro == "" || desc == "")
        {
            alert("Algun camp esta buit.");
            return false;
        }
        else if(preu <= 0) 
        {
            //es comprova que el preu sigui major a 0
            document.getElementById("preu_intro").innerHTML ='El preu no pot ser 0 inferior.';
            return false;
        }
    }

    var vm = new Vue ({
        el: "#app",
        data:{
            date: '',
        },
        methods:{
            //es realitza aquest metode per que no pugui introduir dades menors que la data actual.
            date_min(){
                var date_now = new Date().toISOString().slice(0, 10);
                this.date = date_now;
            }
        },
        mounted(){
            //es crida al metode data_min
            this.date_min()
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