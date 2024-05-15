<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-15 21:19:26
 * @LastEditTime: 2024-05-15 21:21:12
 * @Description: 更新评论
 */
require_once ("../mysql/mysql.php");
require_once ("../common/utils.php");

CORS();

$comment = getRequestBody();

$id = $comment['id'];
$status = $comment['status'];

if($status != 0) {
  DefaultError('该评论已经是审核通过状态!');
}

$sql = "UPDATE comment SET status = 1 WHERE id = $id";
execSql($sql);
