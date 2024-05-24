<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-15 22:19:51
 * @LastEditTime: 2024-05-15 22:20:08
 * @Description: 删除新闻
 */
require_once ("../mysql/mysql.php");
require_once ("../common/utils.php");

CORS();
$news = getRequestBody();

$id = $news['id'];

$sql = "delete from news WHERE id = $id";
execSql($sql);
