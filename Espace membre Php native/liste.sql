-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Ven 12 Juillet 2013 à 07:47
-- Version du serveur: 5.0.41
-- Version de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de données: `cocohub`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `liste`
-- 

CREATE TABLE `liste` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `birth` date NOT NULL,
  `sexe` varchar(100) NOT NULL,
  `nationaliter` varchar(100) NOT NULL,
  `photo` blob NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `mdp2` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Contenu de la table `liste`
-- 

INSERT INTO `liste` (`id`, `nom`, `prenom`, `pseudo`, `email`, `adresse`, `birth`, `sexe`, `nationaliter`, `photo`, `mdp`, `mdp2`) VALUES 
(5, 'Tako', 'Mahefa', 'tako', 'tako@gmail.com', '101Tanjombato', '2013-07-17', 'Homme', 'Malagasy', '', '1bd1b586c06d5b9ea08d8d299c3aa90bfff1c603', ''),
(6, 'Jess', 'Delol', 'Juju', 'jessdelola@yahoo.com', '101Tanjombato', '2013-08-03', 'inconnue', 'Faible', '', '1bd1b586c06d5b9ea08d8d299c3aa90bfff1c603', ''),
(7, 'Hasina', 'mania', 'dede', 'tony@gmail.com', '110, Ivandry', '2013-07-15', 'Femme', 'Anglais', '', '1bd1b586c06d5b9ea08d8d299c3aa90bfff1c603', ''),
(8, 'BOBOTY', 'Mahefa', 'fefefefef', 'jessduelola@yahoo.com', '101Tanjombato', '2013-07-12', 'Homme', 'FranÃ§ais', '', '1bd1b586c06d5b9ea08d8d299c3aa90bfff1c603', ''),
(9, 'Hasina', 'diane', 'diana', 'dina@aol.com', '104, ITAOSY', '2013-07-03', 'Femme', 'FranÃ§ais', '', '1bd1b586c06d5b9ea08d8d299c3aa90bfff1c603', ''),
(10, 'BOBOTY', 'Mahefa', 'Joda', 'kjodaa@yahoo.com', '101Tanjombato', '2013-07-12', 'Homme', 'FranÃ§ais', '', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', ''),
(11, 'Jess', 'Jess', 'dila', 'jessdelolya@yahoo.com', '110, Ivandry', '2013-07-03', 'Homme', 'Anglais', '', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', ''),
(12, 'Harimisa', 'Maeva', 'maeva', 'maeva@aol.com', '102 , Ampasamadinika', '2004-05-12', 'Femme', 'Faible', '', '1bd1b586c06d5b9ea08d8d299c3aa90bfff1c603', ''),
(13, 'Tako', 'Mane', 'mane', 'maneman@gmail.com', '110 , Faravohitra', '2022-02-28', 'Homme', 'Noob', '', '1bd1b586c06d5b9ea08d8d299c3aa90bfff1c603', ''),
(14, 'MANIA', 'rAKLE', 'Maia', 'maiaa@aol.com', '104, Andravbgohangy', '2013-08-06', 'Homme', 'FranÃ§ais', '', '1bd1b586c06d5b9ea08d8d299c3aa90bfff1c603', ''),
(15, 'BOBOTY', 'Raya', 'Didie', 'didie@aol.com', '101 Andavamamba', '2013-07-09', 'Femme', 'Propla', '', '1bd1b586c06d5b9ea08d8d299c3aa90bfff1c603', ''),
(16, 'Jojoby', 'Marley', 'jojoby', 'jojobyvbe@gmail.com', '110, Ivandry', '2013-07-03', 'Homme', 'Malagasy', '', '1bd1b586c06d5b9ea08d8d299c3aa90bfff1c603', ''),
(17, 'Toky', 'Raya', 'joby', 'lemananaojoby@gmail.com', '104, ITAOSY', '2013-07-09', 'Homme', 'Africain', '', '1bd1b586c06d5b9ea08d8d299c3aa90bfff1c603', '');
