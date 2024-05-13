<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-13 19:00:42
 * @LastEditTime: 2024-05-13 21:41:49
 * @Description: mysql 连接
 */

// 处理跨域
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

// MySQL 数据库连接信息
$servername = "localhost"; // MySQL 服务器地址
$username = "root"; // MySQL 用户名
$password = "yuri"; // MySQL 密码
$database = "php_news"; // 要连接的数据库名

// 创建连接
$conn = new mysqli($servername, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
  die("数据库连接失败: " . $conn->connect_error);
}

// echo "数据库连接成功!!!\n";

// 关闭连接
// $conn->close();
