USE `devnavigator`;

-- Creation of the likes table
CREATE TABLE IF NOT EXISTS `likes` (
    `like_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `article_id` int(11) NOT NULL,
    `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`like_id`),
    UNIQUE KEY `unique_like` (`user_id`, `article_id`),
    KEY `IDX_USER_ID` (`user_id`),
    KEY `IDX_ARTICLE_ID` (`article_id`),
    CONSTRAINT `FK_USER_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
    CONSTRAINT `FK_ARTICLE_ID` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

