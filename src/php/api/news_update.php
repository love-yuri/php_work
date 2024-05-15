<?php
require_once ("../mysql/mysql.php");
require_once ("../common/utils.php");

CORS();

$news = getRequestBody();

$id = $news['id'];
$title = $news['title'];
$content = $news['content'];
$currentTime = date('Y-m-d H:i:s');

$sql = "update news set title='$title', content='$content', date = '$currentTime' where id=$id";
execSql($sql);