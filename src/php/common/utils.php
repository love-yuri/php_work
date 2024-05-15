<?php
/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-14 08:42:17
 * @LastEditTime: 2024-05-15 21:16:54
 * @Description: 工具类
 */
require_once ('ErrorCode.php');
require_once ('../mysql/mysql.php');

class SqlRes
{
  public $data;
  public $err;
  public $rows;
  public $affected_rows;

  public function __construct($data, $rows, $affected_rows)
  {
    $this->data = $data;
    $this->rows = $rows;
    $this->affected_rows = $affected_rows;
  }

  public function debugString()
  {
    return json_encode(
      array(
        "data" => $this->data,
        "rows" => $this->rows,
        "affected_rows" => $this->affected_rows
      )
    );
  }
}

function getRequestBody()
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postData = file_get_contents('php://input');
    // 处理数据
    if ($postData !== null) {
      return json_decode($postData, true);
    } else {
      Error(ErrorCode::EMPTY_REQUEST_BODY);
    }
  } else {
    Error(ErrorCode::EMPTY_REQUEST_BODY);
  }
}

function CORS()
{
  // 处理跨域
  header("Access-Control-Allow-Origin: *");

  // 允许的请求方法
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

  // 允许的请求头
  header("Access-Control-Allow-Headers: Content-Type");

  // 允许跨域请求携带 Cookie
  header("Access-Control-Allow-Credentials: true");

  // 设置响应类型为 JSON
  header('Content-Type: application/json');

  // 如果是预检请求（OPTIONS方法），直接返回成功状态码
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
  }
}

function execSql($sql): SqlRes
{
  try {
    global $conn;
    $line = 0;
    $result = $conn->query($sql);
    if($result === false) {
      DefaultError('sql执行失败!!');
      exit();
    }

    if($result === true) {
      return new SqlRes(array(), 0, mysqli_affected_rows($conn));
    }

    $js = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $line = $line + 1;
        $js[] = $row;
      }
    }
    return new SqlRes($js, $line, mysqli_affected_rows($conn));
    
  } catch (Exception $e) {
    ErrorMessage(ErrorCode::SQL_ERROR, $e->getMessage());
  }
}