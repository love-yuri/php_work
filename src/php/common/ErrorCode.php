<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-14 08:09:36
 * @LastEditTime: 2024-05-14 09:39:17
 * @Description: 错误代码
 */
enum ErrorCode: int
{
  const DEFAULT_ERROR = 3000;
  const EMPTY_REQUEST_BODY = 3001;
  const URL_NOT_FOUND = 3002;
  const SQL_ERROR = 3003;
  const PASSWORD_ERROR = 3004;
}

$ErrorMessage = [
  ErrorCode::EMPTY_REQUEST_BODY => "请求体为空!",
  ErrorCode::URL_NOT_FOUND => "URL未找到!",
  ErrorCode::SQL_ERROR => "SQL错误!",
  ErrorCode::PASSWORD_ERROR => "密码错误!",
];

function Error($code)
{
  http_response_code($code);
  header('Content-Type: application/json; charset=utf-8');
  global $ErrorMessage;
  $response = array(
    "errorCode" => $code,
    "errorMessage" => $ErrorMessage[$code]
  );
  die(json_encode($response, JSON_UNESCAPED_UNICODE));
}

function ErrorMessage($code, $message)
{
  http_response_code($code);
  header('Content-Type: application/json; charset=utf-8');
  global $ErrorMessage;
  $response = array(
    "errorCode" => $code,
    "errorMessage" => $message
  );
  die(json_encode($response, JSON_UNESCAPED_UNICODE));
}


function DefaultError($message)
{
  http_response_code(ErrorCode::DEFAULT_ERROR);
  header('Content-Type: application/json; charset=utf-8');
  global $ErrorMessage;
  $response = array(
    "errorCode" => ErrorCode::DEFAULT_ERROR,
    "errorMessage" => $message
  );
  echo json_encode($response, JSON_UNESCAPED_UNICODE);
  exit();
}

