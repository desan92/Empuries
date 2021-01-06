
    function getCookie(name) 
    {
      var b = document.cookie.match('(^|[^;]+)\\s*' + name + '\\s*=\\s*([^;]+)');
      return b ? b.pop() : '';
    }

    function addAnalytics() {
      window.dataLayer = window.dataLayer || [];

      function gtag() 
      {
         dataLayer.push(arguments);
      }

      gtag('js', new Date());
      gtag('config', 'UA-XXXXXXXX-X');
    }

    window.addEventListener("load", function () {

    const cookieConsent = getCookie('emporium_cookie');

    if (cookieConsent === 'allow' || cookieConsent === '') 
    {
      addAnalytics();
    }

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
      onStatusChange: function (status, chosenBefore) 
      {
        location.reload();
      }
    })
  });
