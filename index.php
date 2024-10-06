<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 86400");
header("Access-Control-Allow-Methods: GET");

require ("lib/classline.php");

if(isset($_GET["git"])){
if($_GET["git"] == "gitsend"){
$line = new Gitline();
$response = $line->Gitsend($_GET["token"], $_GET["message"]);
if($response["status"] == 200){
  echo json_encode(array("สถานะ" => 200, "ข้อความ" => "ส่งข้อความสำเร็จแล้ว!"), JSON_UNESCAPED_UNICODE);
}else{
  echo json_encode(array("สถานะ" => $response["status"], "ข้อความ" => $response["message"]), JSON_UNESCAPED_UNICODE);
  http_response_code(400);
}
}else{
  echo json_encode(array("สถานะ" => 404,"ข้อความ"=> "ไม่พบจุดสิ้นสุดเอพีไอ!"), JSON_UNESCAPED_UNICODE);
  http_response_code(400);
}
}else{
  echo json_encode(array("สถานะ" => 404,"ข้อความ"=> "ไม่พบจุดสิ้นสุดเอพีไอ!"), JSON_UNESCAPED_UNICODE);
  http_response_code(400);
}