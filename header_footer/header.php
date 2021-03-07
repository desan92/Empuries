<!--Boto lateral per pujar cap amunt al scroll-->
<button class="btn animate__animated animate__fadeInRightBig" id="btnTop" onclick="topFunction()">
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/>
        <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/>
      </svg>
    </button>
    <!--Boto lateral de whatsapp api.-->
    <a href="https://api.whatsapp.com/send?phone=+34666666666&text=Hola%21%20Voldria%20m%C3%A9s%20informaci%C3%B3%20sobre%20Emporium" class="whatsapp animate__animated animate__fadeInRightBig" id="whatsapp" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
    </a>
<div class="container-fluid">
    <div class="row">
        <div class="col p-0">
            <div class="pos-f-t nav-fill w-100">
                <div class="collapse" id="navbarToggleExternalContent">
                  <div class="p-4" style="background-color: navy;">
                    <div class="row">
                    <div class="col-4" id="col1collapse">
                        <div class="div_img"><img src="images/sidebar_foto/1.jpg"></div>
                        <?php
                        /* 
                            Es comprova si l'usuari existeix i el rol que te, es fa per que a dins del navbar
                            quan un esta logejat sortira el nom de usuari (anira al perfil d'aquest) i un boto
                            per sortir de la sessio.
                        */
                        if(isset($_SESSION["user"], $_SESSION["rol"]) && !empty($_SESSION["user"]))
                        {
                            $rol = $_SESSION["rol"];
                            $rol = str_replace("<br>", '', $rol);;

                            //es comprova si es client o admin i es posara el link al href depenent del rol que tingui.
                            if($rol == "Client")
                            {
                                $link = 'profile_client.php';
                            }
                            elseif($rol == "Administrador")
                            {
                                $link = 'profile_admin.php';
                            }
                            //boto que posara el nom de l'usuari logejat i que portara al seu perfil.
                            echo "<div class='user text-center'><a href='".$link."'>" . $_SESSION["user"] . "</a></div>";
                            
                            //boto que al estar registrat et permetre sortir de la session.
                            echo "<div class='user text-center'><a href='log_register/session_exit.php'> Sortir</a></div>";
                            
                        }
                        ?>
                    </div>
                    <!--Quan s'obre el navbar sortira aquesta llista amb els seguents href.-->
                    <div class="col-8">
                        <div class="llista">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="historia.php">Historia</a></li>
                                <li><a href="monuments.php">Llocs turistics</a></li>
                                <li><a href="visites.php">Visitas guiades</a></li>
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
                    <span class="ml-4" id="title-header">EMPORIUM</span></a> 
                    <?php

                    //Es comprova que l'usuari existeix o no
                        if(!isset($_SESSION["user"], $_SESSION["rol"]))
                        {
                            //si no existeix s'envia el visitant de la web al login
                            echo "<a href='log.php' class='navbar-toggler' type='button'>
                            <span class='text-ligh'><svg width='1.3em' height='1.3em' viewBox='0 0 16 16' class='bi bi-person- text-light' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                <path d='M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z'/>
                                <path fill-rule='evenodd' d='M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
                                <path fill-rule='evenodd' d='M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z'/>
                            </svg></span>
                            </a>";
                            
                        }
                        else
                        {
                            /*
                                En cas, que estigui logejat es posara un boto al lloc del que enviaba al login
                                que enviara al perfil del usuari que esta loggejat.
                            */

                            $rol = $_SESSION["rol"];
                            $rol = str_replace("<br>", '', $rol);;

                            //es comprova si es client o admin per posar el link que pertoca
                            if($rol == "Client")
                            {
                                $link = 'profile_client.php';
                            }
                            elseif($rol == "Administrador")
                            {
                                $link = 'profile_admin.php';
                            }

                            //boto on l'usuari registrat podra anar al seu perfil.
                            echo "<a href='".$link."' class='navbar-toggler' type='button'>
                            <i class='fas fa-users' style='color: white;'></i></span></span>
                            </a>";
                        }

                        ?>
                </nav>
            </div>
         </div>
    </div> 
</div>