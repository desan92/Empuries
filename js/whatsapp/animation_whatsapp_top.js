    
    //variables que recullan la informacio dels id de btnTop i whatsapp, per despres manipularlos.
    var mybutton = document.getElementById("btnTop");
    var aWhats = document.getElementById("whatsapp");

    window.onscroll = function() {scrollFunction()};

    /*
    funcio on es mostraran tant el boto de pujar com al de whatsapp apartir de que es pasi
    20 de la pagina en vertical. Si no esta per sobre del 20 els dos botons es mantindran 
    invisibles amb al display: none.
    */
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20)
      {
        mybutton.style.display = "block";
        aWhats.style.display = "block";
      } 
      else 
      {
        mybutton.style.display = "none";
        aWhats.style.display = "none";
      }
    }
    
    //funcio que envia adalt de tot de la pagina on es troba.
    function topFunction() 
    {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }