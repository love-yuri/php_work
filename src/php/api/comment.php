<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-15 11:45:46
 * @LastEditTime: 2024-05-15 19:22:00
 * @Description: 
 */
require_once ("../mysql/mysql.php");
require_once ("../common/utils.php");

CORS();

$data = getRequestBody();

$userId = $data['user_id'];
$content = $data['content'];
$articleId = $data['news_id'];


$sql = "INSERT INTO comment (user_id, content, news_id) VALUES ('$userId', '$content', '$articleId')";
$result = execSql($sql);
