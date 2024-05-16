<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-15 22:19:51
 * @LastEditTime: 2024-05-16 09:33:06
 * @Description: 删除新闻
 */
require_once ("../mysql/mysql.php");
require_once ("../common/utils.php");

CORS();

$body = getRequestBody();

$current = $body["current"];
$size = $body["size"];
$text = $body["content"];

$result = array();

$res = execSql("select * from news where content like '%$text%' or title like '%$text%' ORDER BY date");

if ($res->rows < ($current - 1) * $size) {
  $current = 1;
}

$res->data = array_splice($res->data, ($current - 1) * $size, $size);

$news = array();
foreach ($res->data as $key => $value) {
  $news[$key]['title'] = $value['title'];
  $news[$key]['content'] = $value['content'];
  $news[$key]['date'] = $value['date'];
  $news[$key]['id'] = $value['id'];
  $comments = execSql("SELECT comment.id as id, content, date, username, status from comment left JOIN user on comment.user_id = user.id WHERE news_id = " . $value['id']);
  $news[$key]['comments'] = $comments->data;
}

if ($news == null) {
  $news = array();
}

$result['news'] = $news;
$result['total'] = $res->rows;
$result['current'] = $current;
$result['size'] = $size;

echo json_encode($result);