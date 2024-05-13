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

SELECT * from user;