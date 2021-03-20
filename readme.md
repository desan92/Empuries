Treball final del cicle formatiu de grau superior de 
desenvolupament d’aplicacions web (DAW).

Nom del projecte: Emporium.

Que és Emporium?

Emporium és una pagina web que ofereix un grup de visites turístiques de tota la comarca de 
l'Empordà. 

Objectiu general:

- L’objectiu principal d’aquest projecte es oferir informació dels allotjaments i llocs més 
emblemàtics de l'Empordà per facilitar l’estància dels turistes. Així com oferir una sèrie 
de visites per acompanyar-los i submergir-los en la cultura i el patrimoni de l’Empordà, 
a partir de les visites proporcionades prèviament per l’administrador el client podrà 
adquirir aquestes experiències.

Objectius específics:

- Gestió d’usuaris. Un cop l’usuari s'hagi registrat podra modificar el seu perfil o 
eliminar-lo.
- Proporcionar informació històrica de l’Empordà.
- Proporcionar informació dels allotjaments que hi ha a la comarca de l’Empordà.
- Proporcionar informació dels diferents monuments que trobem a l’Empordà.
- Oferir la possibilitat de conèixer la comarca de l'Empordà amb un conjunt de visites. 
L’administració d’aquest contingut serà duta a terme per l’administrador de la pagina 
que podrà afegir, modificar o eliminar productes (visites), de la botiga online.
- L’administrador també podrà veure les comandes realitzades per visita.
- L’usuari client podrà afegir productes a la cistella i realitzar una comanda.
- Proporcionar al client un mètode de pagament per adquirir aquestes noves 
experiències turístiques.

Disseny del projecte:

El projecte tindrà una part informativa que es dividirà amb tres apartats:
1. Hi haurà una pagina d'història de la comarca de l’Empordà on s'explicarà el que ha 
succeït des de les primeres tribus que varen habitar aquesta terra fins com es troba 
actualment. (Contingut estàtic d’una pagina)
2. En una segona part s’inclouran els allotjaments que hi ha a la comarca així com tota 
la seva informació. (Les pagines que tenen aquesta informació seran reactives 
l’informació d’aquesta pagina haurà estat buscada prèviament i insertada a la base de 
dades. A traves d’axios i amb el mètode get serà passat a vue.js en format JSON on es 
mostrarà per pantalla).3. En tercer lloc, informació de cada lloc emblemàtic que podem trobar en tota la 
comarca de l'Empordà. (Les pagines que tenen aquesta informació seran reactives 
l’informació d’aquesta pagina haurà estat buscada prèviament i insertada a la base de 
dades. A traves d’axios i amb el mètode get serà passat a vue.js en format JSON on es 
mostrarà per pantalla).
4. A més a més hi haurà una part informativa d’un conjunt de visites turístiques, aquesta 
part serà inserida per l’administrador a la base de dades. Tindrà la capacitat d’afegir, 
modificar i eliminar. El contingut que ha estat afegit per l’usuari administrador serà 
rebut a l’interfície que mostrarà el contingut a traves de axios amb el mètode get i 
s’insertarà a la pagina a traves de vue.js.
A més a més, de la part informativa introduïda anteriorment:
1. El projecte tindrà una botiga online que vendrà les visites que haguí afegit 
l’administrador. Les visites que siguin interesants per l’usuari serà emmagatzemada a 
una SESSION que formarà la cistella.
2. Quan el client vulgui adquirir els productes seleccionats i presents a la cistella 
s'utilitzarà l’api de PayPal per realitzar els pagaments d’aquesta.

Base de dades: la base de dades tindrà les taules següents:

- Taula rols.
- Taula permisos.
- Taula usuaris.
- Taula productes.
- Taula comanda_item.
- Taula comanda.
- Taula transaccions.

Llenguatges utilitzats: PHP, HTML, CSS, JS (Framework: vue.js), MySQL.

Per a la realització d’aquest projecte s'utilitzarà vue.js que a partir de la crida d’APIs rebrà 
l’informació en format JSON i serà mostrada a l’interfície pertinent