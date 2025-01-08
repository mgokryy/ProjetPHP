-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 08 jan. 2025 à 19:05
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetfinal`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `name`) VALUES
(1, 'Géographie'),
(2, 'Science'),
(3, 'Littérature'),
(4, 'Histoire'),
(5, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` int NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_option` tinyint NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id_question`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`, `category_id`) VALUES
(1, 'Quelle est la capitale de l\'Australie ?', 'Sydney', 'Canberra', 'Melbourne', 'Brisbane', 2, 1),
(2, 'Quelle est la plus grande île du monde ?', 'Groenland', 'Madagascar', 'Nouvelle-Guinée', 'Bornéo', 1, 1),
(3, 'Combien de continents y a-t-il ?', '5', '6', '7', '8', 3, 1),
(4, 'Quel est le plus haut sommet de l\'Afrique ?', 'Mont Kenya', 'Mont Elgon', 'Mont Stanley', 'Mont Kilimandjaro', 4, 1),
(5, 'Quelle mer borde la côte est de l\'Italie ?', 'Mer Tyrrhénienne', 'Mer Adriatique', 'Mer Ionienne', 'Mer Égée', 2, 1),
(6, 'Quel est le pays le plus peuplé du monde ?', 'Inde', 'Chine', 'États-Unis', 'Indonésie', 2, 1),
(7, 'Quelle est la capitale du Canada ?', 'Toronto', 'Vancouver', 'Ottawa', 'Montréal', 3, 1),
(8, 'Quel est le plus grand lac d\'eau douce en volume ?', 'Lac Baïkal', 'Lac Supérieur', 'Lac Victoria', 'Lac Tanganyika', 1, 1),
(9, 'Quel est le plus grand désert du monde ?', 'Désert de Gobi', 'Sahara', 'Antarctique', 'Désert d\'Atacama', 3, 1),
(10, 'Dans quel pays se trouve la ville de Machu Picchu ?', 'Bolivie', 'Chili', 'Équateur', 'Pérou', 4, 1),
(11, 'Quel est l\'élément chimique dont le symbole est \"O\" ?', 'Or', 'Oxygène', 'Osmium', 'Oganesson', 2, 2),
(12, 'Combien y a-t-il de planètes dans le système solaire ?', '7', '9', '8', '10', 3, 2),
(13, 'Quel scientifique a découvert la théorie de la relativité ?', 'Isaac Newton', 'Albert Einstein', 'Galilée', 'Marie Curie', 2, 2),
(14, 'Quel est l\'organe responsable de pomper le sang dans le corps humain ?', 'Cœur', 'Cerveau', 'Poumon', 'Foie', 1, 2),
(15, 'Quel gaz est essentiel pour la respiration humaine ?', 'Azote', 'Oxygène', 'Hydrogène', 'Carbone', 2, 2),
(16, 'Quel est le plus petit os du corps humain ?', 'Stapes', 'Scaphoïde', 'Coccyx', 'Malléus', 1, 2),
(17, 'Quelle est la formule chimique de l\'eau ?', 'H2O', 'CO2', 'O2', 'H2SO4', 1, 2),
(18, 'Quel est le nom du processus par lequel les plantes fabriquent leur nourriture ?', 'Respiration', 'Transpiration', 'Fermentation', 'Photosynthèse', 4, 2),
(19, 'Quel est l\'élément le plus abondant dans l\'univers ?', 'Hydrogène', 'Hélium', 'Oxygène', 'Carbone', 1, 2),
(20, 'Quel est le plus grand organe du corps humain ?', 'Cœur', 'Poumon', 'Peau', 'Foie', 3, 2),
(21, 'Qui a écrit \"Les Misérables\" ?', 'Victor Hugo', 'Émile Zola', 'Charles Baudelaire', 'Alexandre Dumas', 1, 3),
(22, 'Dans quelle pièce trouve-t-on le personnage d\'Hamlet ?', 'Othello', 'Macbeth', 'Hamlet', 'Roméo et Juliette', 3, 3),
(23, 'Quel auteur a écrit \"1984\" ?', 'George Orwell', 'Aldous Huxley', 'Ray Bradbury', 'Philip K. Dick', 1, 3),
(24, 'Quel est le genre littéraire du \"Seigneur des Anneaux\" ?', 'Science-fiction', 'Fantasy', 'Policier', 'Historique', 2, 3),
(25, 'Qui a écrit \"L\'Étranger\" ?', 'Jean-Paul Sartre', 'Albert Camus', 'André Gide', 'Simone de Beauvoir', 2, 3),
(26, 'Quel est le titre du premier roman de J.K. Rowling ?', 'Harry Potter et la Chambre des Secrets', 'Harry Potter et le Prisonnier d\'Azkaban', 'Harry Potter à l\'école des sorciers', 'Harry Potter et la Coupe de Feu', 3, 3),
(27, 'Quel est le nom du célèbre détective créé par Arthur Conan Doyle ?', 'Hercule Poirot', 'Sherlock Holmes', 'Miss Marple', 'Philip Marlowe', 2, 3),
(28, 'Quel roman de George Orwell décrit une société dystopique sous surveillance constante ?', '1984', 'Le Meilleur des Mondes', 'Fahrenheit 451', 'La Servante écarlate', 1, 3),
(29, 'Qui a écrit \"À la recherche du temps perdu\" ?', 'Marcel Proust', 'Gustave Flaubert', 'Honoré de Balzac', 'Stendhal', 1, 3),
(30, 'Quel est le titre du roman de Mary Shelley qui est considéré comme l\'un des premiers romans de science-fiction ?', 'Dracula', 'Frankenstein', 'Le Portrait de Dorian Gray', 'Le Fantôme de l\'Opéra', 2, 3),
(31, 'En quelle année a eu lieu la Révolution française ?', '1776', '1789', '1804', '1815', 2, 4),
(32, 'Qui était l\'empereur de France en 1812 ?', 'Louis XIV', 'Napoléon Bonaparte', 'Louis XVI', 'Charlemagne', 2, 4),
(33, 'Quel mur est tombé en 1989 ?', 'Mur d\'Hadrien', 'Mur de Berlin', 'Mur de Chine', 'Mur de l\'Atlantique', 2, 4),
(34, 'Qui a découvert l\'Amérique en 1492 ?', 'Vasco de Gama', 'Christophe Colomb', 'Ferdinand Magellan', 'Marco Polo', 2, 4),
(35, 'Quel événement a marqué la fin de la Seconde Guerre mondiale ?', 'La chute de Berlin', 'Le bombardement d\'Hiroshima', 'Le débarquement en Normandie', 'La conférence de Yalta', 2, 4),
(36, 'Quel est le nom du traité qui a mis fin à la Première Guerre mondiale ?', 'Traité de Versailles', 'Traité de Paris', 'Traité de Tordesillas', 'Traité de Westphalie', 1, 4),
(37, 'Qui était le premier président des États-Unis ?', 'Thomas Jefferson', 'George Washington', 'Abraham Lincoln', 'John Adams', 2, 4),
(38, 'Quelle civilisation ancienne a construit les pyramides de Gizeh ?', 'Les Romains', 'Les Grecs', 'Les Égyptiens', 'Les Mayas', 3, 4),
(39, 'Quel pays a été dirigé par Adolf Hitler ?', 'Italie', 'Allemagne', 'Japon', 'Espagne', 2, 4),
(40, 'Quel événement a déclenché la Première Guerre mondiale ?', 'L\'assassinat de l\'archiduc François-Ferdinand', 'La chute de l\'Empire ottoman', 'La révolution russe', 'Le traité de Versailles', 1, 4),
(41, 'Quel joueur de tennis a remporté le plus de titres du Grand Chelem ?', 'Roger Federer', 'Rafael Nadal', 'Novak Djokovic', 'Pete Sampras', 2, 5),
(42, 'Quel pays a remporté le plus de médailles aux Jeux Olympiques d\'été ?', 'États-Unis', 'Chine', 'Russie', 'Royaume-Uni', 1, 5),
(43, 'Quel est le record du monde du saut en longueur masculin ?', '8,95 mètres', '8,90 mètres', '8,85 mètres', '8,80 mètres', 1, 5),
(44, 'Quel club de football a remporté le plus de Ligues des Champions ?', 'Real Madrid', 'AC Milan', 'Liverpool', 'Bayern Munich', 1, 5),
(45, 'Quel est le sport national du Japon ?', 'Sumo', 'Judo', 'Kendo', 'Baseball', 1, 5),
(46, 'Quel est le plus grand stade de football en termes de capacité ?', 'Camp Nou', 'Wembley', 'Maracanã', 'Rungrado May Day Stadium', 4, 5),
(47, 'Quel athlète a remporté le plus de médailles d\'or aux Jeux Olympiques ?', 'Michael Phelps', 'Usain Bolt', 'Carl Lewis', 'Mark Spitz', 1, 5),
(48, 'Quel est le record du monde du 100 mètres féminin ?', '10,49 secondes', '10,61 secondes', '10,70 secondes', '10,75 secondes', 1, 5),
(49, 'Quel pays a remporté la première Coupe du Monde de Football en 1930 ?', 'Brésil', 'Argentine', 'Uruguay', 'Italie', 3, 5),
(50, 'Quel joueur de basket-ball est surnommé \"King James\" ?', 'Michael Jordan', 'LeBron James', 'Kobe Bryant', 'Shaquille O\'Neal', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `score` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `score`, `created_at`) VALUES
(1, 'test', '$2y$10$PJv4Yr.3xYpE8/a8/XoZneRyiYKhHudsAchxotF630TCM9mhXlTzW', 0, '2024-12-29 19:45:39'),
(2, 'maelle_abk', '$2y$10$UUmR8/kTYLDJIv9WxNOGxefDP3YXpZf9NCmQktmGmMQ6vaweH28de', 0, '2024-12-30 02:17:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
