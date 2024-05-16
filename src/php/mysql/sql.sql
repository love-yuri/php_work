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

INSERT INTO user (id, username, password, root) VALUES (1, 'admin', '123', true);
INSERT INTO user (id, username, password) VALUES (2, 'yuri', '2078');

-- 新闻
DROP TABLE IF EXISTS news;
CREATE TABLE news (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `date` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
);

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

INSERT INTO news (id, title, content, date) VALUES
(1, '科技突破：新型电池技术发布', '近日，常熟理工学院的研究团队发布了一项革命性的新型电池技术。这项技术大幅提升了电池的能量密度和充放电效率，有望在未来应用于电动汽车和便携式电子设备中。', '2024-05-15 10:00:00'),
(2, '环保新政策：政府推行绿色能源计划', '为了应对气候变化和环境污染，政府近日推出了一系列绿色能源计划。这些计划包括大规模推广太阳能和风能发电，鼓励企业和家庭使用可再生能源，并提供相应的财政补贴。', '2024-05-15 11:00:00'),
(3, '人工智能：智能家居的未来', '随着人工智能技术的发展，智能家居正在逐渐成为现实。智能家居设备不仅能够提供便利，还能通过数据分析提高能源效率和安全性。许多公司已经开始在这一领域投入大量资源，以期在未来占据市场优势。', '2024-05-15 12:00:00');

-- 插入测试评论（指定新闻 ID）
INSERT INTO comment (content, status, user_id, news_id, date) VALUES
('这项电池技术的发布将极大地推动电动汽车的发展，期待早日应用到市场中。', 1, 1, 1, '2024-05-15 10:30:00'),
('这是一个重要的科技突破，能够大幅提升电池性能，对环保也有积极影响。', 1, 2, 1, '2024-05-15 10:45:00'),
('政府的绿色能源计划非常及时和必要，希望能够真正落到实处，为环境保护做出贡献。', 1, 1, 2, '2024-05-15 11:30:00'),
('绿色能源的发展对我们的未来至关重要，这些政策将帮助我们迈向可持续发展的道路。', 1, 2, 2, '2024-05-15 11:45:00'),
('智能家居的发展令人兴奋，希望能够早日看到更多的智能设备进入我们的日常生活。', 1, 1, 3, '2024-05-15 12:30:00'),
('人工智能在智能家居中的应用非常有前景，可以极大地提升我们的生活质量。', 1, 2, 3, '2024-05-15 12:45:00');
