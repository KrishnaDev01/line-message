<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 86400");
header("Access-Control-Allow-Methods: GET");

require("lib/classline.php");

function kb_return($status, $message)
{
    if ($status === true) {
        echo json_encode(array("สถานะ" => $status, "ข้อความ" => $message), JSON_UNESCAPED_UNICODE);
        http_response_code(200);
    } else if ($status === false) {
        echo json_encode(array("สถานะ" => $status, "ข้อความ" => $message), JSON_UNESCAPED_UNICODE);
        http_response_code(400);
    }
}

if (isset($_GET["git"])) {
    if ($_GET["git"] == "gitsend") {
        $line = new Gitline();
        $response = $line->Gitsend($_GET["token"], $_GET["message"]);
        
        if ($response["status"] == 200) {
            kb_return(true, "ส่งข้อความสำเร็จแล้ว!");
        } else {
            kb_return(false, "เกิดข้อผิดพลาดในการส่งข้อความ!");
        }
    } else {
        kb_return(false, "ไม่พบจุดสิ้นสุดเอพีไอ!");
    }
} else {
    kb_return(false, "ไม่พบจุดสิ้นสุดเอพีไอ!");
}