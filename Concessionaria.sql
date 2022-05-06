-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2017 at 04:27 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";







/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Concessionaria`
--





DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `EstraiCostoInt` (`idrip` INT(10)) RETURNS INT(11) begin
declare somma int;
set somma = 0;
SELECT SUM(Intervento.costo) INTO somma FROM Intervento WHERE Intervento.Id_Riparazione=idrip;
return somma;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Auto`
--

CREATE TABLE `Auto` (
  `Num_Telaio` varchar(17) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modello` varchar(30) NOT NULL,
  `optional` varchar(100) NOT NULL,
  `cilindrata` int(11) NOT NULL,
  `alimentazione` varchar(30) NOT NULL,
  `km_percorsi` int(11) NOT NULL DEFAULT '0',
  `nuova` tinyint(1) NOT NULL DEFAULT '1',
  `prezzo` int(11) DEFAULT NULL,
  `mesiGaranzia` int(4) NOT NULL DEFAULT '24',
  `Descrizione` varchar(200) DEFAULT NULL,
  `Colore` varchar(30) DEFAULT NULL,
  `Immagine` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Auto` query auto numero telaio che non sia venduta
--

INSERT INTO `Auto` (`Num_Telaio`, `marca`, `modello`, `optional`, `cilindrata`, `alimentazione`, `km_percorsi`, `nuova`, `prezzo`, `mesiGaranzia`, `Descrizione`, `Colore`, `Immagine`) VALUES
('12LKNMVE46587BF', 'Alfa Romeo', 'Giulia QV', 'Full', 2980, 'Benzina', 0, 0, 89000, 24, 'Alfa Romeo Giulia: sinonimo di eleganza e raffinatezza, segna la rinascita del prestigioso Marchio di Arese ai nostri giorni. La nuova Alfa Romeo Giulia promette eleganza e potenza ad un prezzo concorrente', 'Bianco', 'img/GiuliaNuova.jpeg'),
('12LKOYT8965KJUR', 'Volkswagen', 'Passat', 'Base', 1854, 'Diesel', 0, 0, 24980, 24, 'Auto senza componenti scandalo Dieselgate', 'Grigio metallizzato', 'img/PassatNuova.jpeg'),
('18ER96SDC58A54P', 'Audi', 'A3', 'Sportback', 1489, 'Diesel', 0, 0, 24500, 24, 'Versione SportBack', 'Grigio metallizzato',  'img/A3Nuova.jpeg'),
('25POLIKUJYHTGR1', 'Lancia', 'Y', '30Th Anniversary', 1200, 'Benzina', 20000, 1, 9500, 12, 'Versione Elefantino Blu', 'Blu oltremare', 'img/YUsata.jpg'),
('35OPIYT428OYTH1', 'Alfa Romeo', 'Mito', 'Base', 1400, 'Benzina', 0, 0, 15000, 24, 'Auto con impianto Harman Kardon di serie', 'Rosso Alfa', 'img/MitoNuova.jpeg'),
('85UJTG143KJUTYH', 'Alfa Romeo', 'Giulietta Veloce', 'Sport', 2000, 'Benzina', 0, 0, 27000, 24, 'Auto con impianto Bose di serie', 'Rosso Alfa', 'img/GiuliettaNuova.jpeg'),
('BMWSTP4582AX22P', 'Bmw', '320D', 'Full', 1996, 'Diesel', 0, 0, 37000, 24, 'Auto con tettuccio panoramico di serie', 'Bianco', 'img/320DNuova.jpg'),
('CTR857452JGHSFS', 'Citroen', 'C3', 'Base', 1300, 'Diesel', 89645, 1, 5000, 0, 'Auto con interni conciati male', 'Bicolore Bianca e nera', 'img/C3Usata.jpg'),
('DHTSUMTR8857422', 'Dahiatsu', 'Materia', 'Full', 1459, 'Diesel', 130000, 1, 12000, 12, 'Auto con cambio automatico singola frizione', 'Bianco', 'img/MateriaUsata.jpg'),
('DLT666741258DEL', 'Lancia', 'Delta', 'Martini', 2000, 'Benzina', 56000, 1, 75000, 12, 'Auto molto rara in limited edition', 'Bianco con livrea Martini', 'img/DeltaUsata.jpg'),
('FLV7541275FULVI', 'Lancia', 'Fulvia', 'HF Full', 1600, 'Benzina', 74968, 1, 73499, 12, 'Auto storica iscritta al registro storico Lancia', 'Bianco', 'img/FulviaUsata.jpg'),
('FTTPTT578965412', 'Fiat', 'Punto', 'Emotion', 1296, 'Diesel', 130000, 1, 12000, 12, 'Auto con tagliando appena eseguito da ex proprietario', 'Rosso', 'img/PuntoUsata.jpg'),
('MLTPLFTT9834591', 'Fiat', 'multipla', 'no', 1200, 'Benzina', 280000, 1, 200, 24, 'Auto con motore multijet di altissima resistenza', 'Blu - Rosso', 'img/MULTIPLA.jpg'),
('PGGUT57896325JK', 'Peugeot', '207', 'Base', 1300, 'Diesel', 89645, 1, 5000, 0, 'Auto con chilometraggio certificato', 'Grigio', 'img/207Usata.jpeg'),
('RNTCL7455845565', 'Renault', 'Clio', 'Base', 1196, 'Benzina', 100236, 1, 5600, 12, 'Auto con una bolla di verniciatura sul cofano', 'Grigio', 'img/ClioUsata.jpg'),
('SAAB93SC4565246', 'Saab', '93S', 'Full', 1986, 'Benzina', 156000, 1, 13500, 12, 'Auto ancora in perfette condizioni', 'Bianco', 'img/935Usata.jpg'),
('ALFRMR823487625', 'Alfa Romeo', 'Giulia 1600', 'Full', 1600, 'Benzina', 79000, 1, 65000, 12, 'Auto iscritta al registro storico Alfa Romeo ed ASI', 'Verde', 'img/GIULIA_1600.jpg'),
('ALFRMRGTJNR2324', 'Alfa Romeo', 'Junior 1300', 'Full', 1300, 'Benzina', 65436, 1, 72000, 12, 'Auto storica in perfette condizioni. Vero affare per collezionisti ed appassionati', 'Rosso bordò', 'img/GT_JUNIOR_1300.jpg'),
('FCATP872634UUUH', 'Fiat', 'Tipo SW', 'Business', 1500, 'Diesel', 0, 0, 22500, 24, 'Auto perfetta per lunghi viaggi grazie al robustissimo motore Multijet', 'Blu metallizzato', 'img/TIPO_SW.jpg'),
('22POLIKUJYHTGR2', 'Lancia', 'Y', '30Th Anniversary', 1200, 'Benzina', 0, 0, 14500, 12, 'Versione Elefantino Blu', 'Blu', 'img/Y_30TH_ANNIVERSARY.jpeg'),
('RNTL23987345CRY', 'Renault', 'Talisman', 'Business', 2000, 'Diesel', 0, 0, 37000, 24, 'Nuova station wagon di rappresentanza della Renault! Robusta ed affidabile con il motore Eco2', 'Nero lucido', 'img/TALISMAN.jpg'),
('RNTCL799584231L', 'Renault', 'Clio', 'Full', 1500, 'Diesel', 0, 0, 18000, 24, 'Nuova Renault clio. Citycar perfetta dai consumi contenuti grazie al motore 1500 tipo Eco2', 'Rosso', 'img/CLIO.jpg'),
('MRCDS87687364PP', 'Mercedes', 'E', 'All Terrain', 2200, 'Diesel', 0, 0,68000, 36, 'Nuova Mercedes classe E allestimento All Terrain. Per chi vuole una station wagon ma non vuole rinunciare ad una emozione offroad', 'Rosso', 'img/CLASS_E_ALLTERRAIN.jpg'),
('MTBSHI983745938', 'Mitsubishi', 'Lancer', 'Evolution', 2400, 'Benzina', 0, 1, 39500, 12, 'Versione Evolution 10 con centralina modificata', 'Bianco', 'img/LANCER_EVOLUTION.jpg'),
('SBRU867345GTAAK', 'Subaru', 'Impreza', 'WRC', 2500, 'Benzina', 60000, 1, 19500, 12, 'Versione WRC derivata dal campionato Rally', 'Blu', 'img/IMPREZA_WRX.jpg'),
('SKAUVWBU876345J', 'Skoda', 'Octavia', 'Base', 1500, 'Diesel', 115000, 1, 4500, 12, 'Versione base con aria condizionata manuale', 'Verde', 'img/OCTAVIA.jpg'),
('LNCSTS87364538A', 'Lancia', 'Stratos', 'WRC', 3000, 'Benzina', 7244, 1, 545500, 12, 'Versione da gara guidata dal famosissimo Munari', 'Rosso HF', 'img/STRATOS.jpg'),
('BTMTC867234LCYA', 'Lancia', 'Beta', 'Montecarlo', 2000, 'Benzina', 118770, 1, 12500, 12, 'Versione molto rara in allestimento montecarlo', 'Rosso Lancia', 'img/BETA_MONTECARLO.jpg'),
('ADSHT9986567BUU', 'Audi', 'A4', 'Quattro', 2000, 'Diesel', 0, 0, 49000, 24, 'Versione con trazione integrale e freni maggiorati', 'Bianco', 'img/A4.jpg'),
('CTRCTRCTREEEEEN', 'Citroen', 'DS', 'Full', 1500, 'Diesel', 0, 0, 18500, 24, 'Nuova citroen DS. Da oggi con gli stessi motori Peugeot HDI Blue', 'Bianco', 'img/DS3.jpg'),
('DCCCCIA5384753I', 'Dacia', 'Sandero', 'Stepway', 1500, 'Diesel', 5000, 1, 6500, 12, 'Auto usata dalla Nostra sede come auto di cortesia', 'Blu', 'img/SANDERO.jpg'),
('MSRTI87623SPORT', 'Maserati', 'Levante', 'S-Version', 3000, 'Benzina', 0, 0, 139500, 24, 'Nuovo suv della celebre casa del tridente', 'Bianco', 'img/MASERATI_LEVANTE.jpeg'),
('MSRTI8762GNL986', 'Maserati', 'Ghibli', 'Full', 1994, 'Benzina', 0, 0, 72500, 24, 'Celebre restyling della casa del tridente', 'Nero', 'img/MASERATI_GHIBLI.jpg'),
('MSRTI87780MSRTT', 'Maserati', 'Quattroporte', 'Full', 2000, 'Benzina', 0, 0, 94000, 24, 'Restyling della celebre versione della berlina sportiva del tridente', 'Bianco', 'img/MASERATI_QUATTROPORTE.jpeg'),
('BMWCCC876345BWW', 'Bmw', '320D', 'Full', 2000, 'Diesel', 0, 0, 42500, 24, 'Ennesimo restyling della celebre casa tedesca. Berlina esteticamente accatticante ed aggressiva', 'Nero', 'img/BMW_320D.jpg'),
('VWWGFFGLF982740', 'VolksWagen', 'Golf', 'base', 1500, 'Diesel', 0, 0, 19500, 24, 'Restyling con scarichi finti di una delle macchine di segmento C più vendute', 'Grigio', 'img/VOLKSWAGEN_GOLF.jpg'),
('RNLTESCARGOT775', 'Renault', 'Clio', 'Sporter', 1500, 'Diesel', 0, 0, 17500, 24, 'Restyling di una delle machine di classe C più amata dai giovani', 'Rosso Nero', 'img/RENAULT_CLIO_SPORTER.jpg'),
('ALF12KL02394ALF', 'Alfa Romeo', 'Giulietta', 'Base', 2000, 'Diesel', 0, 0, 16900, 24, 'Restyling 2017 della fmosa auto del biscione', 'Nero', 'img/ALFA_GIULIETTA.jpg'),
('CTRCTRESCARGOT7', 'Citroen', 'C1', 'Automatica', 1000, 'Benzina', 0, 0, 11500, 24, 'Citycar resa esteticamente più accattivante', 'Grigia-Rossa', 'img/CITROEN_C1.jpg'),
('FTT124FULL09834', 'Fiat', '124', 'Full', 2000, 'Diesel', 0, 0, 32500, 24, 'Nuova Fiat 124. Per chi vuole una piccola sportiva con carattere', 'Nero', 'img/FIAT_124.jpg'),
('FTT500XXX978392', 'Fiat', '500X', 'Full', 2000, 'Diesel', 0, 0, 25000, 24, 'Nuova 500X. Eleganza e maneggevolezza sotto forma di auto', 'Avorio', 'img/FIAT_500X.jpg'),
('FTT500LKJHSDF76', 'Fiat', '500L', 'Pop', 1400, 'Benzina', 0, 0, 17000, 24, 'Se hai mai desiderato di avere una 500 allungata allora questa auto è giusta per te ', 'Bianco', 'img/FIAT_500L.jpg'),
('FTT500RVRVRVRVR', 'Fiat', '500', 'Riva', 1500, 'Diesel', 0, 0, 22500, 24, 'Nuova 500 riva. Tutto il meglio di una 500 con interni in legno pregiato simili a quelli del motoscafo Riva', 'Azzurro', 'img/FIAT_500RIVA.jpg'),
('ALF12KL082736EC', 'Alfa Romeo', 'Giulia Veloce', 'Full', 22000, 'Diesel', 0, 0, 42500, 24, 'La migliore berlina sul mercato ora anche con trazione intergrale', 'Azzurro', 'img/ALFA_GIULIA_VELOCE.jpg');
;
-- `Num_Telaio`, `marca`, `modello`, `optional`, `cilindrata`, `alimentazione`, `km_percorsi`, `nuova`, `prezzo`, `mesiGaranzia`, `Descrizione`, `Colore`, `Immagine`
-- --------------------------------------------------------fiat, alfa, lancia, maserati, volks, renault,citroen, bmw

--
-- Table structure for table `Cliente`
--

CREATE TABLE `Cliente` (
  `Username` varchar(20) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Pswd` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Telefono` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Cliente`
--

INSERT INTO `Cliente` (`Username`, `Nome`, `Cognome`, `Pswd`, `Email`, `Telefono`) VALUES
('ChuckNorris', 'Chuck', 'Norris', 'calciorotante', 'chucknorris@dreamcars.it', 423658974),
('DStocco', 'Davide', 'Stocco', 'dstocco', 'dstoc@dreamcars.it', 337828293),
('DufferSmitz', 'Smitz', 'Duffersmitz', 'password', 'duffer@dreamcars.it', 45745145),
('PirlogCristina', 'Cristina', 'Pirlog', 'dwarfex', 'pircri@dreamcars.it', 424896523),
('user', 'user', 'user', 'user', 'user@dreamcars.it', 12345678),
('Yorbabalinda', 'Balinda', 'Yorbalinda', 'password', 'robaba@dreamcars.it', 33396028);

-- --------------------------------------------------------

--
-- Table structure for table `Dipendente`
--

CREATE TABLE `Dipendente` (
  `Matricola` varchar(20) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Dipendente`
--

INSERT INTO `Dipendente` (`Matricola`, `nome`, `cognome`, `telefono`, `mail`, `password`) VALUES
('admin', 'admin', 'admin', 31265991, 'admin@dreamcars.it', 'admin'),
('davnob', 'Davide', 'Nobiliati', 31255741, 'davnob@dreamcars.it', 'DavNob'),
('dorros', 'Dora', 'Rosil', 31255459, 'dorros@dreamcars.it', 'DorRos'),
('edocarex', 'Edoardo', 'Caregnato', 31255447, 'edocarex@dreamcars.it', 'EdCar'),
('enribonny', 'Enrico', 'Bonato', 31289657, 'enribonny@dreamcars.it', 'EnriBon'),
('federo', 'Federica', 'Rossi', 31269854, 'federo@dreamcars.it', 'FedRos'),
('fiscod', 'Fiscale', 'Codice', 31255963, 'fiscod@dreamcars.it', 'FisCod'),
('luiner', 'Luigi', 'Neri', 31296851, 'luiner@dreamcars.it', 'LuiNer'),
('marba', 'Mario', 'Basso', 31269741, 'marba@dreamcars.it', 'MarBas'),
('mariluci', 'Maria', 'Lucita', 31274569, 'mariluci@dreamcars.it', 'MariLuc'),
('marro', 'Maria', 'Rossi', 31265774, 'marro@dreamcars.it', 'MariRos'),
('matbon', 'Mattia', 'Bonato', 31296874, 'matbon@dreamcars.it', 'MatBon'),
('paorizz', 'Paolo', 'Rizzardo', 31266985, 'paorizz@dreamcars.it', 'PaoRiz'),
('pierfav', 'Pierluca', 'Favaron', 31265741, 'pierfav@dreamcars.it', 'PierFav');

-- --------------------------------------------------------

--
-- Table structure for table `Intervento`
--

CREATE TABLE `Intervento` (
  `Id_Intervento` int(10) NOT NULL,
  `Matricola` varchar(20) NOT NULL,
  `Id_Riparazione` int(10) NOT NULL,
  `descrizione` varchar(200) NOT NULL,
  `Data_intervento` date NOT NULL,
  `costo` int(10) NOT NULL,
  `oretot` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Intervento`
--

INSERT INTO `Intervento` (`Id_Intervento`, `Matricola`, `Id_Riparazione`, `descrizione`, `Data_intervento`, `costo`, `oretot`) VALUES
(1, 'admin', 1, 'Sostituzione turbina Maggiornata', '2016-06-02', 150, 3),
(2, 'admin', 5, 'Sostituzione braccio cambio', '2016-06-09', 35, 4),
(3, 'admin', 5, 'Sostituzione silent block anteriore', '2016-07-04', 70, 1),
(4, 'admin', 6, 'Sotituzione centralina', '2016-03-09', 570, 2),
(5, 'admin', 5, 'Sostituzione impianto elettrico avantreno', '2016-07-04', 1500, 8),
(6, 'admin', 3, 'Sostituzione supporto motore', '2016-05-31', 600, 7),
(7, 'admin', 3, 'Sostituzione supporto cambio', '2016-06-02', 40, 1),
(8, 'admin', 5, 'Sostituzione boccola anteriore', '2016-07-04', 30, 1),
(9, 'admin', 5, 'Sostituzione braccio supporto carrozzeria', '2016-07-06', 130, 1),
(10, 'admin', 7, 'Sostituzione testata ed albero a camme', '2016-07-02', 970, 5),
(11, 'admin', 7, 'Sostituzione cinghia di distribuzione', '2016-07-12', 75, 5),
(12, 'admin', 2, 'Sostituzione FAP', '2016-03-06', 950, 15),
(13, 'admin', 2, 'Sostituzione Centralina tarocca', '2016-03-07', 1500, 4),
(14, 'admin', 2, 'Sostituzione iniettori', '2016-03-08', 3700, 15),
(15, 'admin', 4, 'Sostituzione guarnizione di testa con silicone isolante', '2016-06-09', 170, 6),
(16, 'admin', 2, 'Rabbocco olio motore e olio cambio', '2016-03-06', 35, 1);

--
-- Triggers `Intervento` da fare ulteriori trigger per delete, update, insert
--
DELIMITER $$
CREATE TRIGGER `modificaCostoAU` AFTER UPDATE ON `Intervento` FOR EACH ROW UPDATE Riparazione, Intervento
SET Riparazione.costorip=estraiCostoInt(Intervento.Id_Riparazione) WHERE Riparazione.Id_Riparazione=Intervento.Id_Riparazione
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `modificaCostoAD` AFTER DELETE ON `Intervento` FOR EACH ROW UPDATE Riparazione, Intervento
SET Riparazione.costorip=estraiCostoInt(Intervento.Id_Riparazione) WHERE Riparazione.Id_Riparazione=Intervento.Id_Riparazione
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `modificaCostoAI` AFTER INSERT ON `Intervento` FOR EACH ROW UPDATE Riparazione, Intervento
SET Riparazione.costorip=estraiCostoInt(Intervento.Id_Riparazione) WHERE Riparazione.Id_Riparazione=Intervento.Id_Riparazione
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Riparazione`
--

CREATE TABLE `Riparazione` (
  `Id_Riparazione` int(10) NOT NULL,
  `Numero_Telaio` varchar(17) NOT NULL,
  `descrizione` varchar(100) DEFAULT NULL,
  `costorip` int(11) NOT NULL DEFAULT '0',
  `dataInizio` date NOT NULL,
  `ora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Riparazione`
--

INSERT INTO `Riparazione` (`Id_Riparazione`, `Numero_Telaio`, `descrizione`, `costorip`, `dataInizio`, `ora`) VALUES
(1, 'BMWSTP4582AX22P', 'Sostituzione Turbina', 150, '2016-06-02', '14:24:57'),
(2, '12LKOYT8965KJUR', 'Sostituzione componenti scandalo Dieselgate', 6185, '2016-03-06', '17:23:57'),
(3, 'DHTSUMTR8857422', 'Sostituzione supporti', 640, '2016-05-31', '15:26:25'),
(4, 'PGGUT57896325JK', 'Sostituzione guarnizione di testa', 170, '2016-06-09', '16:06:52'),
(5, 'CTR857452JGHSFS', 'Sostituzione cambio', 1765, '2016-07-04', '14:27:23'),
(6, 'RNTCL7455845565', 'Sostituzione centralina', 570, '2016-03-09', '14:44:53'),
(7, '85UJTG143KJUTYH', 'Sostituzione blocco motore', 1045, '2016-07-02', '17:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `StoricoVendite`
--

CREATE TABLE `StoricoVendite` (
  `Num_Telaio` varchar(17) NOT NULL,
  `Cliente` varchar(20) NOT NULL,
  `Data` date NOT NULL,
  `Prezzo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `StoricoVendite`
--

INSERT INTO `StoricoVendite` (`Num_Telaio`, `Cliente`, `Data`, `Prezzo`) VALUES
('12LKNMVE46587BF', 'user', '2015-08-11', 24980),
('12LKOYT8965KJUR', 'user', '2016-07-04', 8900),
('85UJTG143KJUTYH', 'user', '2016-07-02', 5600),
('BMWSTP4582AX22P', 'user', '2016-05-31', 37000),
('CTR857452JGHSFS', 'user', '2016-03-15', 5000),
('DHTSUMTR8857422', 'Yorbabalinda', '2016-04-11', 24500),
('DLT666741258DEL', 'user', '2014-03-03', 75000),
('FLV7541275FULVI', 'user', '2017-04-16', 73499),
('MLTPLFTT9834591', 'user', '2017-03-03', 7770),
('PGGUT57896325JK', 'ChuckNorris', '2016-07-03', 27000),
('PGGUT57896325JK', 'DufferSmitz', '2016-06-09', 5000),
('RNTCL7455845565', 'user', '2016-07-02', 5600),
('SAAB93SC4565246', 'user', '2016-06-15', 13500);

-- --------------------------------------------------------

--
-- Table structure for table `Testdrive`
--

CREATE TABLE `Testdrive` (
  `Id` int(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Numero_Telaio` varchar(17) NOT NULL,
  `Data` date NOT NULL,
  `Ora` time DEFAULT NULL,
  `Confirmed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Testdrive` (`Id`, `Username`, `Numero_Telaio`, `Data`, `Ora`,`Confirmed`) VALUES
(1, 'user', 'FTTPTT578965412', '2017-07-12','16:00',1),
(2, 'user', 'RNTL23987345CRY', '2017-08-12','17:00',0),
(3, 'user', 'RNTCL799584231L', '2017-07-15','16:00',0),
(4, 'user', 'ADSHT9986567BUU', '2017-09-01','18:00',1),
(5, 'DufferSmitz', 'MTBSHI983745938', '2017-07-12','16:00',1),
(6, 'user', 'DCCCCIA5384753I', '2017-09-18','16:00',0),
(7, 'user', 'SBRU867345GTAAK', '2017-10-012','18:00',1),
(8, 'user', 'ALFRMR823487625', '2017-06-19','17:00',1),
(9, 'user', 'FCATP872634UUUH', '2017-09-01','18:00',1),
(10, 'user', '22POLIKUJYHTGR2', '2017-10-12','16:00',0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Auto`
--
ALTER TABLE `Auto`
  ADD PRIMARY KEY (`Num_Telaio`);

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `Dipendente`
--
ALTER TABLE `Dipendente`
  ADD PRIMARY KEY (`Matricola`);

--
-- Indexes for table `Intervento`
--
ALTER TABLE `Intervento`
  ADD PRIMARY KEY (`Id_Intervento`),
  ADD KEY `Id_Riparazione` (`Id_Riparazione`),
  ADD KEY `Matricola` (`Matricola`);

--
-- Indexes for table `Riparazione`
--
ALTER TABLE `Riparazione`
  ADD PRIMARY KEY (`Id_Riparazione`),
  ADD KEY `Numero_Telaio` (`Numero_Telaio`);

--
-- Indexes for table `StoricoVendite`
--
ALTER TABLE `StoricoVendite`
  ADD PRIMARY KEY (`Num_Telaio`,`Cliente`);

--
-- Indexes for table `Testdrive`
--
ALTER TABLE `Testdrive`
  ADD PRIMARY KEY(`Id`),
  ADD KEY `Numero_Telaio_FK` (`Numero_Telaio`),
  MODIFY `Id` int (10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Intervento`
--
ALTER TABLE `Intervento`
  MODIFY `Id_Intervento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `Riparazione`
--
ALTER TABLE `Riparazione`
  MODIFY `Id_Riparazione` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Testdrive`
--
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Intervento`
--
ALTER TABLE `Intervento`
  ADD CONSTRAINT `Id_Riparazione` FOREIGN KEY (`Id_Riparazione`) REFERENCES `Riparazione` (`Id_Riparazione`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Matricola` FOREIGN KEY (`Matricola`) REFERENCES `Dipendente` (`Matricola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Riparazione`
--
ALTER TABLE `Riparazione`
  ADD CONSTRAINT `Numero_Telaio` FOREIGN KEY (`Numero_Telaio`) REFERENCES `Auto` (`Num_Telaio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `StoricoVendite`
--
ALTER TABLE `StoricoVendite`
  ADD CONSTRAINT `Num_Telaio` FOREIGN KEY (`Num_Telaio`) REFERENCES `Auto` (`Num_Telaio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Testdrive`
--
ALTER TABLE `Testdrive`
  ADD CONSTRAINT `Numero_Telaio_FK` FOREIGN KEY (`Numero_Telaio`) REFERENCES `Auto` (`Num_Telaio`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
