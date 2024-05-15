DROP DATABASE IF EXISTS php_news;
CREATE DATABASE php_news;
USE php_news;

CREATE TABLE user (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    root BOOLEAN NOT NULL DEFAULT false,
    PRIMARY KEY (id)
);

INSERT INTO user (username, password, root) VALUES ('admin', '123', true);
INSERT INTO user (username, password) VALUES ('yuri', '2078');

-- 新闻
DROP TABLE IF EXISTS news;
CREATE TABLE news (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `date` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
);

INSERT into news (`title`, `content`) VALUES ('测试新闻', '333');

-- 评论
DROP TABLE IF EXISTS comment;
CREATE TABLE comment (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL NOT NULL,
    `status` INT NOT NULL DEFAULT 0,
    `user_id` INT(11) NOT NULL,
    `news_id` INT(11) NOT NULL,
    `date` DATETIME DEFAULT  CURRENT_TIMESTAMP NOT NULL
);

select * from php_news.news where title like '%测试%' or content like '%测试%';
