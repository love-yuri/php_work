<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-13 19:00:42
 * @LastEditTime: 2024-05-24 21:13:56
 * @Description: mysql 连接
 */

// 处理跨域
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

// MySQL 数据库连接信息
$servername = "10.18.57.16"; // MySQL 服务器地址
$username = "H_092221208"; // MySQL 用户名
$password = "20010512"; // MySQL 密码
$database = "h_092221208"; // 要连接的数据库名

// 创建连接
$conn = new mysqli($servername, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
  die("数据库连接失败: " . $conn->connect_error);
}
$conn->set_charset("utf8");
// echo "数据库连接成功!!!\n";

// 关闭连接
// $conn->close();
