<?php session_start(); ?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
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
        #imatge-personal{
            height: 150px;
            width: 150px;
            border: 5px solid navy;
            text-align: center;
        }

        .recuadre_personal{
            border-radius: 5px;
            height: 500px;
            padding: 25px;
            background-color: #ffffffc4;
            margin-top:4%;
            margin-bottom:4%;
        }

        #input_contacte{
            color: navy;
            font-weight: 600;
        }

        #bold_info{
            color: navy;
        }
        /*Media querie per aumentar els paddings laterals de l'informacio dels admins. */
        @media all and (max-width: 768px){
            .form_contacte{
                padding-left: 15px;
                padding-right: 15px;
            }
        }
    </style>
</head>

<body>
    <!--header de la pagina-->
    <?php include('header_footer/header.php'); ?>
    <div class="container-fluid">
       <div class="row">
           <div class="col p-0">
              <div class="jumbotron jumbotron-fluid" id="photo">
                  <span class="prova animate__animated animate__fadeInLeftBig">Qui som?<h3 class="" id="text_actiu"></h3></span>
              </div>
           </div>
       </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-5 col-sm-12 m-auto recuadre_personal">
                <img src="images/perfil/perfil.jpg" id="imatge-personal" class="rounded d-block m-auto">
                <p class="mt-3"><b id="bold_info">Nom:</b> Jordi</p>
                <p><b id="bold_info">Cognom:</b> de San Antonio Planas</p>
                <p><b id="bold_info">Estudis:</b> Graduat en Historia (UAB).</p>
                <p><b id="bold_info">Especialitat:</b> Master en Arqueologia Clasica (UAB) i
                Master en Historia de l'Art (UAB).</p>
                <p><b id="bold_info">Funcio:</b> Divulgació dels béns i patrimoni de l'Empordà.</p>
            </div>
            <div class="col-md-2 col-sm-12"></div>
            <div class="col-md-5 col-sm-12 recuadre_personal">
                <img src="images/perfil/perfil.jpg" id="imatge-personal" class="rounded d-block m-auto">
                <p class="mt-3"><b id="bold_info">Nom:</b> Glòria</p>
                <p><b id="bold_info">Cognom:</b> Vergés Marés</p>
                <p><b id="bold_info">Estudis:</b> Graduada en Historia (UAB).</p>
                <p><b id="bold_info">Especialitat:</b> Master de Mediterrani Antic (UAB).</p>
                <p><b id="bold_info">Funcio:</b> Divulgació dels béns i patrimoni de l'Empordà.</p>
            </div>
        </div>
   </div>
   <div class="container-fluid">
   <div class="div-spacer"></div>
       <div class="div-spacer"></div>
       <div class="row">
           <div class="col-12">
               <h2 class="titol_destacats text-center w-75"><span><b>Contacte</b></span></h2>
           </div>
       </div>
       <div class="div-spacer"></div>
       <div class="div-spacer"></div>
       <div class="row">
           <div class="col-md-3"></div>
            <div class="col-md-6 form_contacte">
            <form action="mail/mail.php" name="contacte" method="POST" onsubmit=" return validaciocontacte()">
                <div class="form-group">
                    <label id="input_contacte" for="exampleInputNom">Nom</label>
                    <input type="nom" name="nom" class="form-control" id="exampleInputNom" aria-describedby="nomHelp" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <label id="input_contacte" for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
                    pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                </div>
                <div class="form-group">
                    <label id="input_contacte" for="exampleInputSubject">Tema</label>
                    <input type="subject" name="subject" class="form-control" id="exampleInputSubject" aria-describedby="subjectHelp" placeholder="Tema" required>
                </div>
                <div class="form-group">
                    <label id="input_contacte" for="exampleFormControlTextarea1">Missatge</label>
                    <textarea class="form-control" name="missatge" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-right">Enviar</button>
            </form>
                <?php 
                /**Es mostrara un error si el missatge enviat per correu electronic no ha arribat.
                 * en cas contrari si s'envia sortira un alert que s'ha enviat el mail correctament.
                 */
                    if(isset($_GET["missatge_status"]) && !empty($_GET["missatge_status"] == "error"))
                    {
                        echo "<p class='buit_registre'>Error, el missatge no s'ha enviat.</p>";
                    }
                    elseif(isset($_GET["missatge_status"]) && !empty($_GET["missatge_status"] == "send"))
                    {
                        echo '<script language="javascript">';
                        echo "const okalert = true;

                        if(okalert) {
                            setTimeout(function() {
                                alert('Missatge enviat correctament')
                        }, 1000);
                        }";
                        echo '</script>';
                    }
                ?>
            </div>
            <div class="col-md-3"></div>
       </div>
   </div>
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <div class="div-spacer"></div>
   <?php include('header_footer/footer.php'); ?>

   <script>
    //a mes a mes de el required del input hi ha aquesta funcio de seguretat que mostrara error si es treuen els requireds i es vol pasar una variable buida o el mail incorrecte.
        function validaciocontacte()
        {
            
            var nom = document.forms["contacte"]["exampleInputNom"].value;
            var mail = document.forms["contacte"]["exampleInputEmail1"].value;
            var tema = document.forms["contacte"]["exampleInputSubject"].value;
            var consulta = document.forms["contacte"]["exampleFormControlTextarea1"].value;
                    
            if(nom == "" || mail == "" || tema == ""  || consulta == "")
            {
                alert("Algun camp esta buit.");
                return false;
            }

            return(true)

        }
    </script>
    <script src="js/whatsapp/animation_whatsapp_top.js"></script>
    <script src="js/cookies/cookies.js"></script>
    <script src="bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</body>
</html>
