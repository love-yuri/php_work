<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-14 08:08:30
 * @LastEditTime: 2024-05-15 08:33:00
 * @Description: 任意接口地址
 */
require_once 'common/ErrorCode.php';

header("Access-Control-Allow-Origin: *");

// 允许的请求方法
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// 允许的请求头
header("Access-Control-Allow-Headers: Content-Type");

// 允许跨域请求携带 Cookie
header("Access-Control-Allow-Credentials: true");

// 设置响应类型为 JSON
header('Content-Type: application/json');
Error(ErrorCode::URL_NOT_FOUND);