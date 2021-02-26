CREATE TABLE `permisos`(
    id_permisos INT(11) NOT NULL AUTO_INCREMENT,
    tipus_permis VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_permisos)
);

CREATE TABLE `permisos_role`(
    id_permisosRole INT(11) NOT NULL AUTO_INCREMENT,
    id_permisos INT(11) NOT NULL,
    id_rol INT(11) NOT NULL,
    PRIMARY KEY (id_permisosRole),
    FOREIGN KEY (id_permisos) REFERENCES permisos(id_permisos),
    FOREIGN KEY (id_rol) REFERENCES rols_usuari(id_rol)
);

CREATE TABLE `rols_usuari`(
    id_rol INT(11) NOT NULL AUTO_INCREMENT,
    tipus_rol VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_rol)
);

CREATE TABLE `informacio_usuari`(
    id_usuari INT(11) NOT NULL AUTO_INCREMENT,
    nom_usuari VARCHAR(200) NOT NULL,
    cognom_usuari VARCHAR(200) NOT NULL,
    username VARCHAR(200) NOT NULL,
    contrasenya VARCHAR(100) NOT NULL,
    mail VARCHAR(100) NOT NULL,
    creat DATETIME CURRENT_TIMESTAMP(),
    id_rol INT(11) NOT NULL,
    PRIMARY KEY (id_usuari),
    FOREIGN KEY (id_rol) REFERENCES rols_usuari(id_rol)
);

/*CREATE TABLE `botiga_emporium`(
    id_botiga INT(11) NOT NULL AUTO_INCREMENT,
    nom_botiga VARCHAR(100) NOT NULL,
    id_rol INT(11) NOT NULL,
    PRIMARY KEY (id_botiga),
    FOREIGN KEY (id_rol) REFERENCES rols_usuari(id_rol)
);*/

CREATE TABLE `Productes_botiga`(
	id_producte INT(11) NOT NULL AUTO_INCREMENT,
    nom_producte VARCHAR(150) NOT NULL,
    intro_descripcio TEXT,
    descripcio TEXT,
    imatge_visita VARCHAR(100),
    preu VARCHAR(50) NOT NULL,
    places_ocupades INT(11) NOT NULL,
    places_totals INT(11) NOT NULL,
    places_restants INT(11) NOT NULL,
    dia_visita DATE NOT NULL,
    idioma VARCHAR(50),
    durada VARCHAR(100),
    punt_trobada VARCHAR(100) NOT NULL,
    latitud VARCHAR(50),
    longitud VARCHAR(50),
    id_usuari INT(11) NOT NULL,
    PRIMARY KEY (id_producte),
    FOREIGN KEY (id_usuari) REFERENCES informacio_usuari(id_usuari)
);

CREATE TABLE `comanda`(
    id_comanda INT(11) NOT NULL AUTO_INCREMENT,
    status_comanda VARCHAR(100) NOT NULL,
    data_comanda DATETIME CURRENT_TIMESTAMP(),
    preu_final FLOAT(6,2) NOT NULL,
    id_usuari INT(11) NOT NULL,
    PRIMARY KEY (id_comanda),
    FOREIGN KEY (id_usuari) REFERENCES informacio_usuari(id_usuari)
);

CREATE TABLE `detalls_comanda`(
    id_itemcomanda INT(11) NOT NULL AUTO_INCREMENT,
    nom_producte VARCHAR(200) NOT NULL,
    preu FLOAT(6,2) NOT NULL,
    quantitat_producte INT(10) NOT NULL,
    id_producte INT(11) NOT NULL,
    id_comanda INT(11) NOT NULL,
    PRIMARY KEY (id_itemcomanda),
    FOREIGN KEY (id_producte) REFERENCES Productes_botiga(id_producte)
    FOREIGN KEY (id_comanda) REFERENCES comanda(id_comanda)
);

INSERT INTO `productes_botiga`(`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`, `id_usuari`) VALUES ("Museu Dalí + Museu del Joguet", "Aquesta visita s'iniciara al museu Dalí on podrem veure part de les grans obres del pintor Alt Empordanès i tot seguit podrem deleitarnos amb la col·lecció de joguines més gran de tot Catalunya que es troba present al museu del Joguet de Figueres.","Ens reunirem a les 14:30h a la rambla de Figueres. Desde aqui iniciarem un tour per els dos museus més emblamàtics de la capital Alt Empordanesa.<br><br>Aquet Tour comensara amb la visita del museu Dalí on es podran veure part de les obres més emblamàtiques del pintor Català com podrien ser: Retrat de Gala amb dues costelles de xai en equilibri sobre la seva espatlla, Natura morta al clar de lluna malva, Retrat de Pablo Picasso al segle XXI, entre d'altres.<br><br>Tot seguit ens dirigirem al museu del Joguet on podrem veure com ha estat l'evolució de les joguines amb una col·lecció de 4000 peces de joguines que ens transportara a la nostra infantesa.<br><br>Finalment, acabarem el tour sobre les 19:00 i les 19:30 a la rambla de Figueres.","visita_museudali_museujoguet.jpg","45€",0,35,35,"2021-06-23","Català","4 hores 30 minuts","Rambla de Figueres","42.266631","2.9608155",1);
INSERT INTO `productes_botiga`(`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`, `id_usuari`) VALUES ("Empúries", "Visita guiada per el complex arqueológic d'Empúries on es podran veure les restas de les ciutats de Empuriae i de Empòrion.","Ens reunirem a les 15:00 al parc arqueològic d'Empúries i desde aqui iniciarem el tour per el complex arqueológic més important de la península ibèrica.<br><br>Aquet tour comensara amb la visita de la neàpolis on podrem veure les muralles de ciclopies, el temple d'Asclepi, el temple de Serapis, el macellum, la casa de peristil, l'àgora i la stoa, un cop vista la part de la neàpolis visitarem el museu d'empúries on podrem observar l'estatua d'Asclepi i tot seguit ens centrarem amb la part romana podra veure les dues Domus, el forum o les Termes públiques romanes.<br><br>Finalment, acabarem el tour sobre les 17:00 i les 17:30 a l'entrada del parc arqueològic d'Empúries","Empuries.jpg","25€",0,30,30,"2021-06-28","Català","2 hores","Parc arqueològic Empúries","42.1339441","3.109809",1);
INSERT INTO `productes_botiga`(`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`, `id_usuari`) VALUES ("Aiguamolls de l'Empordà", "Visita guiada per el Parc natural dels Aiguamolls de l'Empordà on es podra veure la seva fauna i la vegetació de una de les zones mes tranquiles i harmonioses de Catalunya.","Ens reunirem a les 15:00 al parc natural dels Aiguamolls de l'Empordà i aqui s'iniciara el tour per un dels dos itinararis que ens permetran veure la fauna que es troba present dins al parc, aquet itinerari serà el del Cortalet.<br><br>Dins de aquesta immersió a la natura podrem veure gran part de la fauna que es troba present als aiguamolls com alguns ocells de les 329 especies registrades, alguns reptils, peixos, etc.<br><br>Finalment, acabarem el tour sobre les 16:00 i les 16:30 a l'entrada del parc natural dels Aiguamolls de l'Empordà.","aiguamolls-de-l-emporda-girona.jpg","Gratuït",0,20,20,"2021-07-01","Català","1 hora 30 minuts","Parc natural dels Aiguamolls de l'Empordà","42.2247746","3.089862",1);
INSERT INTO `productes_botiga`(`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`, `id_usuari`) VALUES ("Ciutadella de Roses", "Visita guiada per a la ciutadella de Roses on es podra veura la fortificació renaxentista del segle XVI.","Ens reunirem a les 16:30 a la Ciutadella de Roses i desde aqui s'iniciara el tour per la fortificació del segle XVI.<br><br>En aquet tour podrem observa dintre les muralles de la ciutadella, les restes de la ciutat grega i romana de Rhode, el monestir altomediaval de Santa Maria de Roses i la vila vella de Roses amb les seves fortificacions mediavals.<br><br>Finalment, acabarem el tour sobre les 18:00 a l'entrada de la Ciutadella de Roses.","ciutadella.jpg","15€",0,25,25,"2021-07-04","Català","1 hora 30 minuts","Ciutadella de Roses","42.2656785","3.1705532",1);