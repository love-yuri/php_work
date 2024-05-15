<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-13 21:56:21
 * @LastEditTime: 2024-05-15 09:05:11
 * @Description: 登录接口 - 只处理post请求
 */

require_once ("../mysql/mysql.php");
require_once ("../common/utils.php");

CORS();

$data = getRequestBody();

$username = $data['username'];
$password = $data['password'];

$result = execSql("SELECT * FROM user where username = '$username'");

if ($result->rows === 0) {
  DefaultError("用户不存在");
} else {
  $user = $result->data[0];
  if ($user['password'] !== $password) {
    DefaultError("密码错误");
  }
}