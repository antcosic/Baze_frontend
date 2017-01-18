-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 07:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `nagrada`
--

CREATE TABLE `nagrada` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `opis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nagrada`
--

INSERT INTO `nagrada` (`id`, `naziv`, `opis`) VALUES
(1, 'Prvak razreda mladih pasa', 'Naslov prvaka mladih pasa moze biti dodijeljen samo u razredu mladih pasa najboljem psu koji je ocijenjen ocjenom "odlican" i to jednako mužjaku kao i zenki. '),
(2, 'Mladi prvak hrvatske', 'Naslov moze osvojiti pas koji je prethodno osvojio tri naslova "Prvaka razreda mladih"'),
(3, 'CAC-HR i CAC-HR rezerva', 'Na internacionalnim, nacionalnim izlozbama te na specijalnim izlozbama sudac moze dodijeliti kandidaturu za prvaka Hrvatske u ljepoti - CAC HR i to prvoplasiranom odlicno ocijenjenom muzjaku i zenki.'),
(4, 'Prvak Hrvatske - CH HR', 'Psi koji su vec proglaseni za "Prvaka Hrvatske" natjecu se obvezatno u razredu prvaka.'),
(5, 'Izlozbeni prvak hrvatske -AP CH HR', 'Naslov "Apsolutni Prvak Hrvatske" (AP CH HR) na trazenje vlasnika priznat ce HKS psu koji ima potvrdu o hrvatskom prvaku u ljepoti i radu.'),
(6, 'CACIB i rezerva CACIB', 'Na medunarodnim izlozbama koje stiti FCI dodijeljuje se CACIB - kandidatura za medunarodnog prvaka u ljepoti koje je raspisao FCI. '),
(7, 'Medunarodni prvak u ljepoti - INT.CH.', 'Naslov "Medunarodni prvak u ljepoti (Int.Ch.)" na trazenje vlasnika, a preko HKS-a, dodijelit ce FCI psu koji je osvojio dvije kandidature CACIB u dvije razlicite zemlje i od dva razlicita suca.'),
(8, 'Medunarodni izlozbeni prvak - INT.SH.CH', 'Naslov "Medunarodni izlozbeni prvak (Int.Sh.Ch.)" na trazenje vlasnika, a preko HKS-a, dodijelit ce FCI psu one pasmine za koje se po trazenju FCI-a imaju sve uvjete ispunjene.'),
(9, 'Prvak razreda veterana', 'Naslov prvaka razreda veterana moze biti dodijeljen samo u razredu veterana najboljem psu koji je ocijenjen ocjenom "odlican" i to jednako muzjaku kao i zenki.'),
(10, 'Veteranski prvak Hrvatske - CHV HR', 'Naslov "Veteranski prvak Hrvatske (CHV HR)c na trazenje vlasnika priznat ce HKS psu koji je osvojio tri naslova Prvaka razreda veterana.'),
(11, 'Prvak pasmine-BOB', 'Samo jedan sudac smije suditi odabir pobjednika pasmine.\r\nPrije izbora najljepseg psa pasmine sudac izabire najljepseg mladog psa pasmine.');

-- --------------------------------------------------------

--
-- Table structure for table `natjecanje`
--

CREATE TABLE `natjecanje` (
  `id` int(11) NOT NULL,
  `naziv` varchar(60) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `datum_odrzavanja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `natjecanje`
--

INSERT INTO `natjecanje` (`id`, `naziv`, `opis`, `datum_odrzavanja`) VALUES
(3, 'CAC Osijek', 'Kinolosko drustvo OSIJEK, ul. Adama Reisnera 39, 31000 Osijek', '2017-01-12'),
(4, 'CAC Rovinj', 'Izlagati se mogu psi koji posjeduju rodovnicu priznatu od FCI.', '2017-02-10'),
(5, 'Medunarodni prvak prvaka', 'Natjecanje se odrzava u Zagrebu. ', '2017-01-28'),
(6, '4xCACIB Zadar', 'Natjecanje odrzava u vise kategorija.\r\nMjesto: Zadar.', '2017-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `ocjena`
--

CREATE TABLE `ocjena` (
  `id` int(11) NOT NULL,
  `naziv` varchar(10) NOT NULL,
  `opis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocjena`
--

INSERT INTO `ocjena` (`id`, `naziv`, `opis`) VALUES
(1, 'nedovoljan', 'kao ocjena predstavlja "diskvalifikaciju" i dodijeljuje se psu koji ne odgovara propisanom standardu'),
(2, 'dovoljan', 'dobiva pas koji je dovoljno u tipu pasmine, ali nema njezina opce prepoznatljiva svojstva ili njegova tjelesna grada ne zadovoljava'),
(3, 'dobar', 'se dodjeljuje psu koji posjeduje glavna obiljezja pasmine, ali ima greske, pod pretpostavkom da greske nisu prikrivene'),
(4, 'vrlo dobar', 'se kao ocjena pripisuje psu tipicnih obiljezja svoje pasmine, ujednacenih proporcija i u dobroj formi'),
(5, 'odlican', 'se smije dodijeliti samo psu koji je jako blizu idealnom standardu pasmine, privedenom u odlicnoj formi'),
(6, 'bez ocjene', 'ostaju psi kojima se ne moze dodijeliti niti jedna prije navedena ocjena');

-- --------------------------------------------------------

--
-- Table structure for table `pas`
--

CREATE TABLE `pas` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `godina_rodenja` date NOT NULL,
  `pasmina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pas`
--

INSERT INTO `pas` (`id`, `ime`, `godina_rodenja`, `pasmina_id`) VALUES
(5, 'roki', '2016-06-10', 2),
(6, 'caki', '2015-02-10', 3),
(7, 'baki', '2014-04-22', 8),
(8, 'tuki', '2015-07-06', 4),
(9, 'laki', '2016-02-03', 10),
(10, 'fuki', '2016-05-09', 10),
(11, 'lesi', '2013-04-04', 6),
(12, 'besi', '2012-08-08', 12),
(13, 'cuki', '2015-04-05', 9),
(14, 'baduljac', '2014-06-07', 4),
(15, 'ljubs', '2016-03-03', 10),
(16, 'moki', '2016-09-04', 11),
(17, 'taki', '2016-01-05', 13),
(18, 'kroki', '2015-05-06', 8),
(19, 'denki', '2014-09-03', 1),
(20, 'moli', '2016-08-04', 13),
(21, 'muki', '2015-09-02', 8),
(22, 'zuki', '2016-04-06', 12),
(23, 'rex', '2014-02-08', 13),
(24, 'softic', '2016-10-10', 6),
(25, 'smokic', '2015-11-09', 1),
(26, 'brzi', '2013-05-09', 5),
(27, 'spori', '2015-08-08', 5),
(28, 'kratki', '2016-01-01', 11),
(29, 'dugi', '2015-04-08', 7),
(30, 'max', '2016-02-06', 7),
(31, 'faksi', '2015-12-09', 9),
(32, 'zeus', '2016-04-05', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pasmina`
--

CREATE TABLE `pasmina` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `skupina_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasmina`
--

INSERT INTO `pasmina` (`id`, `naziv`, `opis`, `skupina_id`) VALUES
(1, 'engleski setter', 'Karakteristicno je njegovo osarano, dlakama razlicitih boja pokriveno tijelo.', NULL),
(2, 'njemacki gonic', 'Njegov najznacajniji lokalni varijetet bio je trobojni sanderlandski gonic za lov u sumi.', 6),
(3, 'entlebuski planinski pas', 'Entelbucher je najmanji od cetiri svicarska planinsko - pastirska psa', 2),
(4, 'belgijski ovcar', 'Nije lako klasificirati belgijske ovcare, buduci da nacionalni kinoloski klub ne moze usaglasiti njihovo nazivlje.', 1),
(5, 'americki terijer', 'On moze biti fizicki malen, no ovaj robusni mali terijer zadrzao je svu strast svojih foksterijerskih predaka.', 3),
(6, 'alpski jazavcar', 'Jamari su najucinkovitiji tragaci po hladnom tragu ranjenih jelena u alpskim dijelovima Austrije i Njemacke.', 4),
(7, 'pomeranijski spic', 'Danasnji mali pas razvijen je u njemackoj pokrajini Pomeraniji uzgojem od malih varijateta velikog njemackog spica.', 5),
(8, 'danski pticar', 'Pasmina je nastala ukrstavanjem osam generacija ciganskih pasa sa lokalnim farmerskim psima.', 7),
(9, 'curly coated retriever', 'Ovog ponosnog, prelijepog, visenamjenskog lovnog retrivera mnogi smatraju i priznaju za jednu od najstarijih pasmina retrivera', 8),
(10, 'engleski patuljasti terijer', 'Ova pasmina potjece od krzljavih mancesterskih terijera.', 9),
(11, 'afganistanski hrt', 'Afganistanski hrt je najljepsi u trku, najelegantniji i najdostojanstveniji od svih pasmina.', 10),
(12, 'anatolski pastirski pas', 'Anatolski pastirski pas je pas cuvar, cija proslost doseze daleko unatrag, pri cemu njegovo porijeklo, vjerovatno ide sve do lovackih pasa u Mezopotamiji.', 1),
(13, 'srednji snaucer', 'Srednji snaucer je ostrodlak, srednje velicine, snazan, zilav, vise zbijen nego vitak pas.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posjeduje`
--

CREATE TABLE `posjeduje` (
  `pas_id` int(11) NOT NULL,
  `vlasnik_id` int(11) NOT NULL,
  `od` date NOT NULL,
  `do` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posjeduje`
--

INSERT INTO `posjeduje` (`pas_id`, `vlasnik_id`, `od`, `do`) VALUES
(5, 36, '2017-01-03', '2017-01-18'),
(5, 50, '2014-12-16', '2017-01-02'),
(7, 23, '2017-01-03', NULL),
(9, 23, '2016-07-12', NULL),
(10, 35, '2017-01-12', NULL),
(11, 29, '2017-01-13', NULL),
(13, 50, '2017-01-05', NULL),
(14, 27, '2014-03-09', '2015-10-10'),
(16, 33, '2017-01-10', NULL),
(17, 28, '2014-01-11', '2016-09-09'),
(18, 23, '2014-06-16', '2015-05-06'),
(18, 36, '2016-07-16', '2017-01-08'),
(19, 32, '2017-01-27', NULL),
(21, 34, '2017-01-11', NULL),
(22, 50, '2017-01-02', NULL),
(31, 26, '2017-01-11', NULL),
(32, 31, '2017-01-25', NULL);

--
-- Triggers `posjeduje`
--
DELIMITER $$
CREATE TRIGGER `provjera_dodjele_psa_vlasniku` BEFORE INSERT ON `posjeduje` FOR EACH ROW BEGIN


	declare novi_id integer;
    declare provjera integer;
    declare datum date;
    declare zadnji_datum date;
    declare msg varchar(255);
    
    select new.pas_id into novi_id;
    SELECT DISTINCT pas_id into provjera FROM posjeduje WHERE 						pas_id=novi_id and do is null;
	
    
    if new.od>=new.do then
        set msg = concat('Pocetni datum ne moze biti veci od zavrsnog!');
        signal sqlstate '45000' set message_text = msg;
    end if;
    
    if provjera>0 then
        set msg = concat('Pas ima vlasnika!');
        signal sqlstate '45000' set message_text = msg;
    end if;
    
    SELECT godina_rodenja into datum FROM pas WHERE id=novi_id;
    if new.od < datum then
        set msg = concat('Pas jos tada nije rodjen');
        signal sqlstate '45000' set message_text = msg;
    end if;
    
    select do into zadnji_datum from posjeduje where pas_id=novi_id ORDER by do desc limit 1;
    if new.od < zadnji_datum then
        set msg = concat('Ne mozete dodati taj datum kao pocetak vlasnistva jer je taj datum u intervalu zadnjeg vlasnistva!');
        signal sqlstate '45000' set message_text = msg;
    end if;
    

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `razred`
--

CREATE TABLE `razred` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `opis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `razred`
--

INSERT INTO `razred` (`id`, `naziv`, `opis`) VALUES
(1, 'razred stenadi', 'za pse od 3 - 6 mjeseci'),
(2, 'razred najmladih', 'za pse od 6 - 9 mjeseci'),
(3, 'razred mladih', 'za pse od 9 - 18 mjeseci'),
(4, 'razred medurazred', 'za pse od 15 - 24 mjeseca'),
(5, 'razred otvorenih', 'za pse iznad 15 mjeseci'),
(6, 'razred radnih', 'za pse iznad 15 mjeseci s priznatim polozenim ispitom'),
(7, 'razred prvaka', 'u ovaj razred mogu se prijavljivati psi kojima je priznat naslov nacionalnog sampiona u ljepoti ');

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

CREATE TABLE `registracija` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`id`, `username`, `password`) VALUES
(2, 'antcosic', 'antonio'),
(3, 'marsostar', 'marta'),
(4, 'nikola', 'nikola'),
(5, 'julija', 'julija'),
(7, 'baki ', 'baki'),
(8, 'baki ', 'baki');

-- --------------------------------------------------------

--
-- Table structure for table `skupina`
--

CREATE TABLE `skupina` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skupina`
--

INSERT INTO `skupina` (`id`, `naziv`) VALUES
(1, 'pastirski i ovcarski psi osim svicarskog planinskog psa'),
(2, 'pinceri i snauceri, molosi i svicarski planinski psi'),
(3, 'terijeri'),
(4, 'jazavcari'),
(5, 'spicevi i psi primitivnog tipa'),
(6, 'gonici, krvosljednici i srodne pasmine'),
(7, 'pticari'),
(8, 'retriveri'),
(9, 'psi za pratnju i patuljaste pasmine'),
(10, 'hrtovi');

-- --------------------------------------------------------

--
-- Table structure for table `sudac`
--

CREATE TABLE `sudac` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `drzava` varchar(20) NOT NULL,
  `natjecanje_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sudac`
--

INSERT INTO `sudac` (`id`, `ime`, `prezime`, `drzava`, `natjecanje_id`) VALUES
(1, 'Andrea', 'Danzante', 'Italija', 3),
(2, 'Domagoj', 'Ergovic', 'Crna gora', 3),
(3, 'Bogdan', 'Erdelji', 'SAD', 3),
(4, 'Josip', 'Bijelic', 'Republika Hrvatska', 3),
(5, 'Tomislav', 'Hirs', 'Spanjolska', 4),
(6, 'Ivan ', 'Bebek', 'Njemacka', 4),
(7, 'Filip', 'Babic', 'Slovenia', 4),
(8, 'Jura', 'Baksa', 'Portugal', 4);

--
-- Triggers `sudac`
--
DELIMITER $$
CREATE TRIGGER `broj_sudaca_po_natjecanju` BEFORE INSERT ON `sudac` FOR EACH ROW BEGIN


	declare novi_id integer;
    declare broj_sudaca integer;
    declare msg varchar(128);
    
    select new.natjecanje_id into novi_id;
	SELECT COUNT(*) into broj_sudaca from sudac where natjecanje_id=novi_id GROUP BY natjecanje_id;
    if broj_sudaca=4 then
        set msg = concat('Dosegnut je maksimalan broj sudaca za to natjecanje!');
        signal sqlstate '45000' set message_text = msg;
    end if;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sudjeluje`
--

CREATE TABLE `sudjeluje` (
  `pas_id` int(11) NOT NULL,
  `natjecanje_id` int(11) NOT NULL,
  `razred_id` int(11) NOT NULL,
  `ocjena_id` int(11) NOT NULL,
  `nagrada_id` int(11) DEFAULT NULL,
  `sudac_id` int(11) NOT NULL,
  `skupina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sudjeluje`
--

INSERT INTO `sudjeluje` (`pas_id`, `natjecanje_id`, `razred_id`, `ocjena_id`, `nagrada_id`, `sudac_id`, `skupina_id`) VALUES
(9, 4, 2, 3, 9, 5, 9),
(10, 4, 2, 2, NULL, 6, 9),
(15, 4, 2, 4, NULL, 7, 9),
(16, 3, 1, 2, NULL, 1, 10),
(28, 3, 1, 5, 4, 2, 10);

--
-- Triggers `sudjeluje`
--
DELIMITER $$
CREATE TRIGGER `provjera_za_skupinu_psa` BEFORE INSERT ON `sudjeluje` FOR EACH ROW BEGIN


	declare novi_id integer;
    declare skupina_id_novi integer;
    declare provjera integer;
    
    declare sud_id integer;
    declare nat_id integer;
    declare provjera2 integer;
    
    declare msg varchar(255);
    
    select new.pas_id into novi_id;
    select new.skupina_id into skupina_id_novi;
    
    
    select pas.id into provjera from pas, pasmina, skupina where pas.id=novi_id and pas.pasmina_id=pasmina.id and pasmina.skupina_id=skupina_id_novi limit 1;
    if provjera is null then
        set msg = concat('Pasmina psa ne pripada toj skupini i ne moze se u njoj natjecati!');
        signal sqlstate '45000' set message_text = msg;
    end if;
    
    
    select new.natjecanje_id into nat_id; 
    select new.sudac_id into sud_id;
    select sudac.id into provjera2 from sudac where sudac.id=sud_id and sudac.natjecanje_id=nat_id limit 1;
    if provjera2 is null then
        set msg = concat('Sudac ne pripada tom natjecanju!');
        signal sqlstate '45000' set message_text = msg;
    end if;
    

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `vlasnik`
--

CREATE TABLE `vlasnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vlasnik`
--

INSERT INTO `vlasnik` (`id`, `ime`, `prezime`, `adresa`, `email`, `telefon`) VALUES
(23, 'Marta', 'Cosic', 'Doljani 34, Sandrovac', 'marsostar@foi.hr', '0912344567'),
(26, 'Leona', 'Cosic', 'Ivana Gundulica 2, Krusevica', 'lols@foi.hr', '0912345678'),
(27, 'Martin', 'Cos', 'Ivana Gundulica 2, Krusevica', 'martins@gmail.com', '0994567231'),
(28, 'Marija', 'Cosic', 'Nova ulica 8, Slavosnki Samac', 'cosicka71@gmail.com', '0984321458'),
(29, 'Magdalena', 'Sostarec', 'Doljani 34, Snadrovac', 'ens@hotmail.com', '0967843214'),
(31, 'Josipa', 'Petric', 'Nova ulica 6, Slavonski Samac', 'joks@msn.com', '0987612345'),
(32, 'Katarina', 'Pet', 'Nova ulica 6, Slavonski Samac', 'katapet@foi.hr', '0975663452'),
(33, 'Vjekoslav', 'Petric', 'Nova ulica 6, Slavonski Samac', 'vjeks@gmail.com', '0987886775'),
(34, 'Sabina', 'Sostarec', 'Doljani 34, Snadrovac', 'bina@gmail.com', '09867888845'),
(35, 'Marica ', 'Petric', 'Nova ulica 6, Slavonski Samac', 'marica@gmail.com', '0978995664'),
(36, 'Ivo', 'Cosic', 'Ivana Gundulica 2, Krusevica', 'ivo.cosic@gmail.com', '0997554222'),
(38, 'Franjo', 'Ä†osiÄ‡', 'Nova ulica 8, Slavonski Samac', 'franc@foi.hr', '0986752345'),
(50, 'Antonio', 'Roki', 'Nova ulica 8', 'antonio.cosic94@gmail.com', '0967921234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nagrada`
--
ALTER TABLE `nagrada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `natjecanje`
--
ALTER TABLE `natjecanje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocjena`
--
ALTER TABLE `ocjena`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pas`
--
ALTER TABLE `pas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasmina_id` (`pasmina_id`);

--
-- Indexes for table `pasmina`
--
ALTER TABLE `pasmina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skupina_id` (`skupina_id`);

--
-- Indexes for table `posjeduje`
--
ALTER TABLE `posjeduje`
  ADD PRIMARY KEY (`pas_id`,`vlasnik_id`),
  ADD KEY `pas_id` (`pas_id`),
  ADD KEY `vlasnik_id` (`vlasnik_id`);

--
-- Indexes for table `razred`
--
ALTER TABLE `razred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skupina`
--
ALTER TABLE `skupina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sudac`
--
ALTER TABLE `sudac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `natjecanje_id` (`natjecanje_id`);

--
-- Indexes for table `sudjeluje`
--
ALTER TABLE `sudjeluje`
  ADD PRIMARY KEY (`pas_id`,`natjecanje_id`),
  ADD KEY `natjecanje_id` (`natjecanje_id`),
  ADD KEY `ocjena_id` (`ocjena_id`),
  ADD KEY `pas_id` (`pas_id`),
  ADD KEY `razred_id` (`razred_id`),
  ADD KEY `nagrada_id` (`nagrada_id`),
  ADD KEY `sudac_id` (`sudac_id`),
  ADD KEY `skupina_id` (`skupina_id`);

--
-- Indexes for table `vlasnik`
--
ALTER TABLE `vlasnik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nagrada`
--
ALTER TABLE `nagrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `natjecanje`
--
ALTER TABLE `natjecanje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ocjena`
--
ALTER TABLE `ocjena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pas`
--
ALTER TABLE `pas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `pasmina`
--
ALTER TABLE `pasmina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `razred`
--
ALTER TABLE `razred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `registracija`
--
ALTER TABLE `registracija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `skupina`
--
ALTER TABLE `skupina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sudac`
--
ALTER TABLE `sudac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vlasnik`
--
ALTER TABLE `vlasnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pas`
--
ALTER TABLE `pas`
  ADD CONSTRAINT `pas_ibfk_1` FOREIGN KEY (`pasmina_id`) REFERENCES `pasmina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasmina`
--
ALTER TABLE `pasmina`
  ADD CONSTRAINT `pasmina_ibfk_1` FOREIGN KEY (`skupina_id`) REFERENCES `skupina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posjeduje`
--
ALTER TABLE `posjeduje`
  ADD CONSTRAINT `posjeduje_ibfk_1` FOREIGN KEY (`vlasnik_id`) REFERENCES `vlasnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posjeduje_ibfk_2` FOREIGN KEY (`pas_id`) REFERENCES `pas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sudac`
--
ALTER TABLE `sudac`
  ADD CONSTRAINT `sudac_ibfk_1` FOREIGN KEY (`natjecanje_id`) REFERENCES `natjecanje` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sudjeluje`
--
ALTER TABLE `sudjeluje`
  ADD CONSTRAINT `sudjeluje_ibfk_1` FOREIGN KEY (`pas_id`) REFERENCES `pas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sudjeluje_ibfk_2` FOREIGN KEY (`natjecanje_id`) REFERENCES `natjecanje` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sudjeluje_ibfk_3` FOREIGN KEY (`ocjena_id`) REFERENCES `ocjena` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sudjeluje_ibfk_4` FOREIGN KEY (`razred_id`) REFERENCES `razred` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sudjeluje_ibfk_5` FOREIGN KEY (`nagrada_id`) REFERENCES `nagrada` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sudjeluje_ibfk_6` FOREIGN KEY (`sudac_id`) REFERENCES `sudac` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sudjeluje_ibfk_7` FOREIGN KEY (`skupina_id`) REFERENCES `skupina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
