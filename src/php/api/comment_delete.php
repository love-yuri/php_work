<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-15 21:19:26
 * @LastEditTime: 2024-05-15 21:58:59
 * @Description: 更新评论
 */
require_once ("../mysql/mysql.php");
require_once ("../common/utils.php");

CORS();

$comment = getRequestBody();

$id = $comment['id'];

$sql = "delete from comment WHERE id = $id";
execSql($sql);
