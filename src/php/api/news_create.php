<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-15 22:08:38
 * @LastEditTime: 2024-05-15 22:09:12
 * @Description: 创建新闻
 */
require_once ("../mysql/mysql.php");
require_once ("../common/utils.php");

CORS();

$news = getRequestBody();

$title = $news['title'];
$content = $news['content'];

$sql = "INSERT into news (title, content) VALUES ('$title', '$content');";
execSql($sql);