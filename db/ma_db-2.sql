-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `ma_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ma_db`;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` tinyint(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `author` tinyint(6) unsigned NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO `article` (`id`, `title`, `content`, `author`, `image`) VALUES
(14,	'OL : LES FANS DU PSG AUTORISÃ©S CONTRE L\'OL, MAIS TRÃ¨S ENCADRÃ©S',	'Dimanche soir, le PSG se dÃ©placera Ã  Lyon dans le cadre de la 23e journÃ©e de Ligue 1. Pour cette rencontre, les supporters parisiens seront autorisÃ©s.\r\n\r\nNÃ©anmoins, du fait des tensions entre les supporters des deux clubs, la prÃ©fecture du RhÃ´ne a pris un arrÃªt limitant la taille du parcage et interdisant la prÃ©sence de fans du PSG en dehors du dÃ©placement encadrÃ© par le club. Une dÃ©cision prise en raison de plusieurs Ã©pisodes de tension autour des dÃ©placement parisiens dans le RhÃ´ne ces derniÃ¨res annÃ©es, et de lâ€™utilisation de fumigÃ¨nes et pÃ©tards dans certains cortÃ¨ges comme Ã  Naples en Ligue des Champions. Â« La prÃ©fecture interdit aussi la possession et le transport des boissons alcoolisÃ©es autour du stade rhodanien Â» prÃ©cise par ailleurs Le Parisien.',	1,	'./files/661-magic-article-actu-c48-aee-6202b14beaec8ea3690e8eac3c-ce-n-est-pas-lui-le-desarroi-de-brigitte-macron-face-aux-attaques-des-gilets-jaunes|c48aee6202b14beaec8ea3690e8eac3c.jpg'),
(16,	'PSG',	'AprÃ¨s lâ€™Ã©chec pour Frenkie de Jong, future recrue du FC Barcelone, lâ€™avenir dâ€™Antero Henrique semble menacÃ© au Paris Saint-Germain.\r\n\r\nCompte tenu de la rivalitÃ© avec les Blaugrana, le prÃ©sident Nasser Al-KhelaÃ¯fi nâ€™a pas du tout apprÃ©ciÃ© la dÃ©faite de son directeur sportif. RÃ©sultat, on reparle dâ€™une possible arrivÃ©e dâ€™ArsÃ¨ne Wenger au poste de manager gÃ©nÃ©ral. Lâ€™idÃ©e semble intÃ©ressante, et pourtant, elle ne sÃ©duit pas SÃ©bastien Tarrago. De son cÃ´tÃ©, le journaliste estime quâ€™aucun dÃ©cideur ne sera vraiment pris au sÃ©rieux face Ã  lâ€™omniprÃ©sence du Qatar lorsqu\'il s\'agit de prendre des dÃ©cisions au PSG.\r\n\r\nÂ« C\'est un club trÃ¨s particulier oÃ¹ les gens censÃ©s avoir du pouvoir ne l\'ont pas vraiment, a dÃ©noncÃ© notre confrÃ¨re sur la chaÃ®ne Lâ€™Equipe. A tout moment, le Qatar peut arriver et dire \"non\". Vous croyez qu\'ArsÃ¨ne Wenger va accepter Ã§a ? C\'est passÃ© inaperÃ§u mais Tuchel a dit qu\'il essayait de convaincre l\'Ã©mir du Qatar de recruter. Donc pour la premiÃ¨re fois, puisque c\'est un sujet tabou, il a dit que l\'Ã©mir du Qatar allait vraiment dans le coeur des sujets au PSG. Donc il y a l\'Ã©mir, Nasser... C\'est un enfer ce club, tu ne peux pas travailler. Ils gagneront peut-Ãªtre une Ligue des Champions mais ce sera un miracle parce qu\'ils ne travaillent pas bien. Â» Autant dire que Nasser Al-KhelaÃ¯fi et ses compatriotes au Paris Saint-Germain n\'apprÃ©cieront pas... ',	1,	NULL),
(17,	'PLUS BESOIN DE PESER UN COLIS POUR Lâ€™ENVOYER PAR LA POSTE',	'Une application Ã  la lettre. Comme pour rÃ©pondre Ã  son slogan â€œSimplifier la vieâ€, le groupe public La Poste arbore une toute nouvelle version amÃ©liorÃ©e de son site laposte.fr. En ligne depuis la fin de la semaine derniÃ¨re, elle propose notamment aux internautes de se passer de la fameuse pesÃ©e avant lâ€™envoi de colis, un service â€œunique en Europeâ€ dâ€™aprÃ¨s le groupe. ConcrÃ¨tement, La Poste a Ã©tabli une liste des 100 objets les plus envoyÃ©s parmi lesquels on retrouve, outre les courriers classiques, les lettres de rÃ©siliation, les vÃªtements, les bouteilles, le matÃ©riel high tech, les livresâ€¦ Ces articles ont tous Ã©tÃ© prÃ©alablement pesÃ©s et apparaissent sur laposte.fr sous forme dâ€™icÃ´nes.\r\n\r\nAinsi, si vous dÃ©sirez envoyer une paire de chaussures, inutile de la peser, il suffit de cliquer sur l\'icÃ´ne correspondant. Ceci fait, de nouveaux items apparaÃ®tront afin de prÃ©ciser la nature de lâ€™article. Essentiel lorsque lâ€™on sait quâ€™une â€œpaire de sandales pÃ¨se en moyenne cinq fois moins quâ€™une paire de bottesâ€, quâ€™une â€œbouteille de champagne est plus lourde quâ€™une bouteille de vinâ€, ou que â€œdeux tÃ©lÃ©phones peuvent avoir un poids diffÃ©rents pour un mÃªme formatâ€, prÃ©cise La Poste. Le bon icÃ´ne sÃ©lectionnÃ©, il suffit de choisir lâ€™emballage (la boÃ®te Ã  chaussures, la caisse en bois, le carton standard, lâ€™enveloppe) pour que les diffÃ©rents tarifs sâ€™affichent. Il ne reste plus quâ€™Ã  imprimer lâ€™Ã©tiquette renseignant lâ€™adresse sur le colis et le facteur passera le rÃ©cupÃ©rer dans votre boÃ®te aux lettres. Si toutefois vous ne disposez pas dâ€™un emballage, il reste possible dâ€™en commander un Ã  La Poste.\r\n\r\nCe service entre dans lâ€™objectif de simplification de laposte.fr. Le groupe comptait pas moins de 80 sites internet avant quâ€™un unique ne soit mis en place en 2014. Cependant, ce dernier restait dans une logique de portail et renvoyait lâ€™internaute vers la plateforme dÃ©diÃ©e au service. La version 2019 franchit encore un nouveau pas en facilitant lâ€™accessibilitÃ© en direction des clients. Alors que lâ€™activitÃ© colis de La Poste ne cesse dâ€™augmenter en termes de volume et dÃ©tient 75% de part de marchÃ© en France, le groupe souhaite profiter de lâ€™essor de la vente de particulier Ã  particulier via lâ€™envoi dâ€™articles. Pour y parvenir, La Poste mise Ã©galement sur la nouvelle version de son site pour smartphone, qui devrait Ãªtre lancÃ©e d\'ici le mois de mars. Dernier objectif pour laposte.fr : mettre en avant certains de ses services comme lâ€™impression de timbres en ligne.',	1,	'./files/960x614_la-28-janvier-2019-sur-une-route-limitee-a-80-km-h-philippe-huguen-afp.jpg');

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `article` tinyint(6) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article` (`article`),
  CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `commentaire` (`id`, `username`, `content`, `article`) VALUES
(1,	'nv',	'fhcgjvhk',	14);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` tinyint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1,	'ayrlomusic@gmail.com',	'$2y$10$z/.je8u/Qai/H0TgHneeJOljGmtlavWLEUFtp1n6boCydE2OQJiaC');

-- 2019-01-29 01:04:57
