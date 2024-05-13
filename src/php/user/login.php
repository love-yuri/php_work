<?php
require_once ("../mysql/mysql.php");

class MyException extends Exception
{
  public function errorMessage()
  {
    // 错误信息
    $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
      . ': ' . $this->getMessage();
    return $errorMsg;
  }
}

// 检查是否有 POST 数据被提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $response = array(
    "errorCode" => 555,
    "errorMessage" => "Incorrect password"
  );
http_response_code(555);
echo json_encode($response);
  exit();
  $postData = file_get_contents('php://input');
  echo $postData;

  // // 处理数据
  // if ($dataArray !== null) {
  //   echo $dataArray;
  // } else {
  //   // 处理解析失败的情况
  //   echo "Failed to parse JSON data from POST request.";
  // }

  $sql = "SELECT * FROM user";
  $result = $conn->query($sql);

  $js = array();
  if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
      $js[] = $row;
    }
  }

  echo json_encode($js);
} else {
  // 没有 POST 请求被提交
  echo "No POST request submitted" . "<br>";
}


