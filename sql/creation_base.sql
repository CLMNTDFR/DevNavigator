-- Creating the BDD
CREATE DATABASE IF NOT EXISTS `devnavigator`;
USE `devnavigator`;

-- Creating the table article
CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int(11) NOT NULL,
  `title` varchar(258) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `date_creation` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Creating the table users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(128) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

delete from `users`;
INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `age`) VALUES
(1, 'Clément Defer', 'clementdefer@exemple.com', 'devine', 32),
(2, 'Micky', 'micky@exemple.com', 'devine', 54);

delete from `article`;
INSERT INTO `article` (`article_id`, `title`, `content`, `author_id`, `date_creation`) VALUES
(1, 'Exploring Astro: The Modern Framework for Building Fast and Dynamic Websites', "Astro is a groundbreaking framework designed to simplify the process of building fast and efficient websites. It offers a unique approach by allowing developers to use their favorite tools and libraries, such as React, Vue, or Svelte, within a single project. Astro’s primary strength lies in its focus on delivering the fastest possible performance by generating static HTML at build time and only sending the necessary JavaScript to the browser. This results in incredibly fast page loads and a smoother user experience, as unnecessary JavaScript is minimized.\r\n\r\nBeyond its impressive performance benefits, Astro also provides a flexible and user-friendly development environment. It supports modern JavaScript features, provides a powerful Markdown-based content management system, and offers seamless integration with various APIs and data sources. Whether you\'re building a personal blog, a business website, or an e-commerce platform, Astro\'s flexibility and efficiency make it an excellent choice for developers looking to create high-quality web applications with minimal overhead.", 1, '2024-08-27 13:06:14'),
(2, 'Diving into Django: The Powerful Framework for Building Scalable and Robust Web Applications', "Django is a high-level Python web framework that encourages rapid development and clean, pragmatic design. It is renowned for its ability to simplify the process of building complex, database-driven websites. Django\'s primary strength lies in its \'batteries-included\' philosophy, which means it comes with a wide range of built-in features that are essential for web development, such as an ORM (Object-Relational Mapping) for database interaction, an admin interface for managing site content, and authentication mechanisms.\r\n\r\nOne of the standout features of Django is its focus on security. It automatically handles much of the security overhead that developers would otherwise need to consider, such as protecting against SQL injection, cross-site scripting, and CSRF attacks. This allows developers to concentrate on building their applications rather than worrying about security vulnerabilities.\r\n\r\nDjango\'s scalability is another key advantage. It is designed to handle high-traffic websites and can scale seamlessly from small projects to large, complex applications. Its modular architecture allows developers to break down their applications into reusable components, making it easier to maintain and extend over time.\r\n\r\nWhether you\'re building a simple blog, a social network, or a content management system, Django\'s robustness, security, and scalability make it an ideal choice for developers seeking to create high-performance web applications with ease.", 1, '2024-08-27 13:09:36'),
(3, 'Mastering Symfony: The Flexible PHP Framework for Building Modern Web Applications', "Symfony is a powerful PHP framework that has gained widespread popularity for its flexibility, robustness, and adherence to web standards. It is designed to streamline the development process by providing a set of reusable components and a structured approach to building web applications. Symfony\'s architecture is based on the Model-View-Controller (MVC) pattern, which helps developers to organize their code in a way that is both logical and maintainable.\r\n\r\nOne of the key strengths of Symfony is its component-based architecture. These components, which can be used independently or together, cover a wide range of functionalities, including routing, form handling, security, and templating. This modular approach allows developers to pick and choose the features they need, making Symfony highly adaptable to different project requirements.\r\n\r\nSymfony also emphasizes developer productivity through its extensive documentation, active community support, and built-in tools for debugging and performance optimization. Its compatibility with other libraries and frameworks, such as Doctrine for database abstraction and Twig for templating, further enhances its versatility.\r\n\r\nWhether you\'re building a small web service, a large enterprise application, or a complex e-commerce platform, Symfony\'s flexibility, performance, and community support make it an excellent choice for PHP developers looking to create modern, scalable, and maintainable web applications.", 2, '2024-08-27 13:13:05');

--
-- Index for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Index for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


--
-- Constraints for the `article` table
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);
COMMIT;