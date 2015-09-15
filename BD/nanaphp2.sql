--
-- Base de données :  `nanaphp2`
--

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `capital` varchar(30) NOT NULL,
  `superficie` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
