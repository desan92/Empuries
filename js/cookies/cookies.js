
    /*
    funcio amb la que es crea la cookie un cop cargada la pagina es podra permetre o denegar
    les cookies un cop aqui es cridara aquesta funcio que creara la cookie apartir del
    document.cookie.match.
    */
    function getCookie(name) 
    {
      var b = document.cookie.match('(^|[^;]+)\\s*' + name + '\\s*=\\s*([^;]+)');
      return b ? b.pop() : '';
    }

    /*
    esdeveniment que s'executa quan es carrega la pagina. On es crida tant la funcio que crea
    la cookie com l'element visual d'aquesta.
    */
    window.addEventListener("load", function () {

    getCookie('emporium_cookie');

    /*
    part visual de la cookie, utilitzant l'element cookieconsent, es genera el contingut 
    que sera present en totes les pagines i que els usuaris que entrin a la pagina podran 
    o no acceptar les cookies.  
    */
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "#000",
        },
        "button": {
          "background": "#f1d600",
        }
      },
      "theme": "edgeless",
      "type": "opt-out",
      "content": {
        "message": "Aquesta web utilitza cookies de tercers amb finalitats de publicitat basada en els seus hàbits de navegació i per finalitats analítiques.",
        "allow": "Permetre cookies",
        "deny": "Rebutjar",
        "link": "Politica de Privacidad",
        "href": "politica_cookies.php"
      },
      "revokable": true,
      "cookie":{
        "name": "emporium_cookie",
        //"domain": "emporium.com"
      }, 
      //funcio que s'executa quan la cookie canvia d'estatus i pasa de allow a deny o a l'inversa.
      onStatusChange: function () 
      {
        location.reload();
      }
    })
  });
