
CREATE TABLE `info_turistica`(
    id_turisme INT(11) AUTO_INCREMENT,
    nom_turisme VARCHAR(200),
    descripcio TEXT,
    direccio VARCHAR(100),
    poblacio VARCHAR(100),
    telefon INT(11),
    latitud VARCHAR(50),
    longitud VARCHAR(50),
    horari TEXT,
    preu VARCHAR(200),
    pagina_web VARCHAR(200),
    email VARCHAR(200),
    imatge VARCHAR(200),
    PRIMARY KEY (id_turisme)
);

CREATE TABLE `info_allotjament`(
    id_allotjament INT(11) AUTO_INCREMENT,
    nom_allotjament VARCHAR(200),
    direccio VARCHAR(200),
    poblacio VARCHAR(200),
    telefon INT(11),
    web VARCHAR(100),
    email VARCHAR(100),
    imatge VARCHAR(200),
    PRIMARY KEY (id_allotjament)
);

CREATE TABLE `rols_usuari`(
    id_rol INT(11) AUTO_INCREMENT,
    tipus_rol VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_rol)
);

CREATE TABLE `informacio_usuari`(
    id_usuari INT(11) AUTO_INCREMENT,
    nom_usuari VARCHAR(200),
    cognom_usuari VARCHAR(200),
    username VARCHAR(200) UNIQUE,
    contrasenya VARCHAR(100),
    mail VARCHAR(100) UNIQUE,
    creat TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    id_rol INT(11),
    PRIMARY KEY (id_usuari),
    FOREIGN KEY (id_rol) REFERENCES rols_usuari(id_rol)
);

CREATE TABLE `Productes_botiga`(
	id_producte INT(11) AUTO_INCREMENT,
    nom_producte VARCHAR(150),
    intro_descripcio TEXT,
    descripcio TEXT,
    imatge_visita VARCHAR(100),
    preu FLOAT(6,2),
    places_ocupades INT(11),
    places_totals INT(11),
    places_restants INT(11),
    dia_visita DATE,
    idioma VARCHAR(50),
    durada VARCHAR(100),
    punt_trobada VARCHAR(100),
    latitud VARCHAR(50),
    longitud VARCHAR(50),
    PRIMARY KEY (id_producte)
);

CREATE TABLE `comanda`(
    id_comanda INT(11) AUTO_INCREMENT,
    status_comanda VARCHAR(100) NOT NULL,
    data_comanda TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    preu_final FLOAT(6,2) NOT NULL,
    id_usuari INT(11),
    PRIMARY KEY (id_comanda),
    FOREIGN KEY (id_usuari) REFERENCES informacio_usuari(id_usuari) ON DELETE SET NULL
);

CREATE TABLE `detalls_comanda`(
    id_itemcomanda INT(11) AUTO_INCREMENT,
    nom_producte VARCHAR(200),
    preu_producte FLOAT(6,2),
    preu_total_producte FLOAT(6,2),
    quantitat_producte INT(10),
    id_producte INT(11),
    id_comanda INT(11),
    PRIMARY KEY (id_itemcomanda),
    FOREIGN KEY (id_producte) REFERENCES Productes_botiga(id_producte) ON DELETE SET NULL,
    FOREIGN KEY (id_comanda) REFERENCES comanda(id_comanda) 
);

INSERT INTO `informacio_usuari`(
    `nom_usuari`,
    `cognom_usuari`,
    `username`,
    `contrasenya`,
    `mail`,
    `id_rol`
)
VALUES('Jordi', 'de San Antonio Planas', 'jordi', md5(2323), 'jordi.a.h@gmail.com', 1),
('Gloria', 'Verges Mares', 'gloria', md5(1111), 'gloria.vm@gmail.com', 1),
('Rafael', 'Nadal Parera', 'Rafa13', md5(1313), 'rafa13@gmail.com', 2),
('Manel', 'Marti Pascal', 'Manel21', md5(2121), 'manel.mp@gmail.com', 2);

INSERT INTO `productes_botiga`(`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`) VALUES ("Museu Dalí + Museu del Joguet", "Aquesta visita s'iniciara al museu Dalí on podrem veure part de les grans obres del pintor Alt Empordanès i tot seguit podrem deleitarnos amb la col·lecció de joguines més gran de tot Catalunya que es troba present al museu del Joguet de Figueres.","Ens reunirem a les 14:30h a la rambla de Figueres. Desde aqui iniciarem un tour per els dos museus més emblamàtics de la capital Alt Empordanesa.<br><br>Aquet Tour comensara amb la visita del museu Dalí on es podran veure part de les obres més emblamàtiques del pintor Català com podrien ser: Retrat de Gala amb dues costelles de xai en equilibri sobre la seva espatlla, Natura morta al clar de lluna malva, Retrat de Pablo Picasso al segle XXI, entre d'altres.<br><br>Tot seguit ens dirigirem al museu del Joguet on podrem veure com ha estat l'evolució de les joguines amb una col·lecció de 4000 peces de joguines que ens transportara a la nostra infantesa.<br><br>Finalment, acabarem el tour sobre les 19:00 i les 19:30 a la rambla de Figueres.","visita_museudali_museujoguet.jpg","45€",0,35,35,"2021-06-23","Català","4 hores 30 minuts","Rambla de Figueres","42.266631","2.9608155");
INSERT INTO `productes_botiga`(`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`) VALUES ("Empúries", "Visita guiada per el complex arqueológic d'Empúries on es podran veure les restas de les ciutats de Empuriae i de Empòrion.","Ens reunirem a les 15:00 al parc arqueològic d'Empúries i desde aqui iniciarem el tour per el complex arqueológic més important de la península ibèrica.<br><br>Aquet tour comensara amb la visita de la neàpolis on podrem veure les muralles de ciclopies, el temple d'Asclepi, el temple de Serapis, el macellum, la casa de peristil, l'àgora i la stoa, un cop vista la part de la neàpolis visitarem el museu d'empúries on podrem observar l'estatua d'Asclepi i tot seguit ens centrarem amb la part romana podra veure les dues Domus, el forum o les Termes públiques romanes.<br><br>Finalment, acabarem el tour sobre les 17:00 i les 17:30 a l'entrada del parc arqueològic d'Empúries","Empuries.jpg","25€",0,30,30,"2021-06-28","Català","2 hores","Parc arqueològic Empúries","42.1339441","3.109809");
INSERT INTO `productes_botiga`(`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`) VALUES ("Aiguamolls de l'Empordà", "Visita guiada per el Parc natural dels Aiguamolls de l'Empordà on es podra veure la seva fauna i la vegetació de una de les zones mes tranquiles i harmonioses de Catalunya.","Ens reunirem a les 15:00 al parc natural dels Aiguamolls de l'Empordà i aqui s'iniciara el tour per un dels dos itinararis que ens permetran veure la fauna que es troba present dins al parc, aquet itinerari serà el del Cortalet.<br><br>Dins de aquesta immersió a la natura podrem veure gran part de la fauna que es troba present als aiguamolls com alguns ocells de les 329 especies registrades, alguns reptils, peixos, etc.<br><br>Finalment, acabarem el tour sobre les 16:00 i les 16:30 a l'entrada del parc natural dels Aiguamolls de l'Empordà.","aiguamolls-de-l-emporda-girona.jpg","Gratuït",0,20,20,"2021-07-01","Català","1 hora 30 minuts","Parc natural dels Aiguamolls de l'Empordà","42.2247746","3.089862");
INSERT INTO `productes_botiga`(`nom_producte`, `intro_descripcio`, `descripcio`, `imatge_visita`, `preu`, `places_ocupades`, `places_totals`, `places_restants`, `dia_visita`, `idioma`, `durada`, `punt_trobada`, `latitud`, `longitud`) VALUES ("Ciutadella de Roses", "Visita guiada per a la ciutadella de Roses on es podra veura la fortificació renaxentista del segle XVI.","Ens reunirem a les 16:30 a la Ciutadella de Roses i desde aqui s'iniciara el tour per la fortificació del segle XVI.<br><br>En aquet tour podrem observa dintre les muralles de la ciutadella, les restes de la ciutat grega i romana de Rhode, el monestir altomediaval de Santa Maria de Roses i la vila vella de Roses amb les seves fortificacions mediavals.<br><br>Finalment, acabarem el tour sobre les 18:00 a l'entrada de la Ciutadella de Roses.","ciutadella.jpg","15€",0,25,25,"2021-07-04","Català","1 hora 30 minuts","Ciutadella de Roses","42.2656785","3.1705532");



CREATE TRIGGER sale_AINS
AFTER INSERT ON detalls_comanda 
FOR EACH ROW
  UPDATE productes_botiga 
     SET places = places - NEW.quantitat_producte
   WHERE id_producte = NEW.id_producte;


DELIMITER //
CREATE TRIGGER t_producte_AI_001 AFTER INSERT ON detalls_comanda FOR EACH ROW
BEGIN
    DECLARE places_restants TYPE OF detalls_comanda.quantitat_producte;

    SELECT places INTO places_restants
    FROM productes_botiga 
    WHERE id_producte = NEW.id_producte;

    IF places_restants - NEW.quantitat_producte > 0 THEN
        UPDATE productes_botiga 
            SET places = places - NEW.quantitat_producte
        WHERE id_producte = NEW.id_producte;
    ELSE
        UPDATE productes_botiga 
            SET places = 0
        WHERE id_producte = NEW.id_producte;
    END IF;

   END //
DELIMITER ;
