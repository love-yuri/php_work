<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-15 10:34:49
 * @LastEditTime: 2024-05-15 23:03:43
 * @Description: 
 */
require_once ("../mysql/mysql.php");
require_once ("../common/utils.php");

CORS();

$res = execSql("select * from news");
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

echo json_encode($news);