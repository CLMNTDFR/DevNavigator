-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 28 août 2024 à 14:37
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `devnavigator`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `title` varchar(258) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `date_creation` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`article_id`, `title`, `content`, `author_id`, `date_creation`) VALUES
(1, 'Exploring Astro: The Modern Framework for Building Fast and Dynamic Websites', 'Astro is a groundbreaking framework designed to simplify the process of building fast and efficient websites. It offers a unique approach by allowing developers to use their favorite tools and libraries, such as React, Vue, or Svelte, within a single project. Astro’s primary strength lies in its focus on delivering the fastest possible performance by generating static HTML at build time and only sending the necessary JavaScript to the browser. This results in incredibly fast page loads and a smoother user experience, as unnecessary JavaScript is minimized.\r\n\r\nBeyond its impressive performance benefits, Astro also provides a flexible and user-friendly development environment. It supports modern JavaScript features, provides a powerful Markdown-based content management system, and offers seamless integration with various APIs and data sources. Whether you\'re building a personal blog, a business website, or an e-commerce platform, Astro\'s flexibility and efficiency make it an excellent choice for developers looking to create high-quality web applications with minimal overhead.', 1, '2024-08-27 13:06:14'),
(2, 'Diving into Django: The Powerful Framework for Building Scalable and Robust Web Applications', 'Django is a high-level Python web framework that encourages rapid development and clean, pragmatic design. It is renowned for its ability to simplify the process of building complex, database-driven websites. Django\'s primary strength lies in its \'batteries-included\' philosophy, which means it comes with a wide range of built-in features that are essential for web development, such as an ORM (Object-Relational Mapping) for database interaction, an admin interface for managing site content, and authentication mechanisms.\r\n\r\nOne of the standout features of Django is its focus on security. It automatically handles much of the security overhead that developers would otherwise need to consider, such as protecting against SQL injection, cross-site scripting, and CSRF attacks. This allows developers to concentrate on building their applications rather than worrying about security vulnerabilities.\r\n\r\nDjango\'s scalability is another key advantage. It is designed to handle high-traffic websites and can scale seamlessly from small projects to large, complex applications. Its modular architecture allows developers to break down their applications into reusable components, making it easier to maintain and extend over time.\r\n\r\nWhether you\'re building a simple blog, a social network, or a content management system, Django\'s robustness, security, and scalability make it an ideal choice for developers seeking to create high-performance web applications with ease.', 1, '2024-08-27 13:09:36'),
(3, 'Mastering Symfony: The Flexible PHP Framework for Building Modern Web Applications', 'Symfony is a powerful PHP framework that has gained widespread popularity for its flexibility, robustness, and adherence to web standards. It is designed to streamline the development process by providing a set of reusable components and a structured approach to building web applications. Symfony\'s architecture is based on the Model-View-Controller (MVC) pattern, which helps developers to organize their code in a way that is both logical and maintainable.\r\n\r\nOne of the key strengths of Symfony is its component-based architecture. These components, which can be used independently or together, cover a wide range of functionalities, including routing, form handling, security, and templating. This modular approach allows developers to pick and choose the features they need, making Symfony highly adaptable to different project requirements.\r\n\r\nSymfony also emphasizes developer productivity through its extensive documentation, active community support, and built-in tools for debugging and performance optimization. Its compatibility with other libraries and frameworks, such as Doctrine for database abstraction and Twig for templating, further enhances its versatility.\r\n\r\nWhether you\'re building a small web service, a large enterprise application, or a complex e-commerce platform, Symfony\'s flexibility, performance, and community support make it an excellent choice for PHP developers looking to create modern, scalable, and maintainable web applications.', 2, '2024-08-27 13:13:05'),
(12, 'Holberton', 'Best school', 1, '2024-08-27 18:08:01');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `date_creation` datetime DEFAULT current_timestamp(),
  `parent_comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `article_id`, `comment`, `date_creation`, `parent_comment_id`) VALUES
(1, 1, 3, 'Great work Micky!', '2024-08-27 18:30:33', NULL),
(2, 1, 3, 'Can you add me on linkedin? :)', '2024-08-27 18:30:51', NULL),
(3, 3, 3, 'Nice work micky, you are the best', '2024-08-28 14:35:28', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `full_name`, `email`, `company`, `message`, `created_at`) VALUES
(1, 'Iyona BO', 'bog@gmail.com', NULL, 'lololo', '2024-08-28 12:27:19'),
(2, 'jezFMZEIHFOE', 'JDHZCVpife@exemple.com', NULL, 'nvjiQP¨GVOU3AFIRA0Z', '2024-08-28 12:27:49');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `date_creation` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`like_id`, `user_id`, `article_id`, `date_creation`) VALUES
(2, 1, 3, '2024-08-28 09:26:38'),
(5, 1, 12, '2024-08-28 09:32:48'),
(11, 1, 2, '2024-08-28 10:02:35'),
(15, 1, 1, '2024-08-28 10:08:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(128) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `age`) VALUES
(1, 'Clément Defer', 'clementdefer@exemple.com', 'devine', 32),
(2, 'Micky', 'micky@exemple.com', 'devine', 54),
(3, 'clemkill', 'clemkill@exemple.com', '$2y$10$bb2zw7WElqJOXFKbdoLv.uV3hL9rvfAILA4qcaRC/HAcWtB15yn7W', 32),
(5, 'alphy', 'alphy@exemple.com', 'devine', 31),
(6, 'Toto', 'toto@exemple.com', 'devine', 31),
(8, 'tutu', 'tutu@exemple.com', '$2y$10$1tgnCYOodEJDUk3OoEpn8eHSynwRkk5JOrD7spxvxkxjtOLmAsMMe', 14);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `IDX_5F9E962A9D86650F` (`user_id`),
  ADD KEY `IDX_5F9E962A69574A48` (`article_id`);

--
-- Index pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `unique_like` (`user_id`,`article_id`),
  ADD KEY `IDX_USER_ID` (`user_id`),
  ADD KEY `IDX_ARTICLE_ID` (`article_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962A69574A48` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5F9E962A9D86650F` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_ARTICLE_ID` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_USER_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
