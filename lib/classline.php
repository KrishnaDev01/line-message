<?php
class Gitline
{
    function Gitsend($token, $message)
    {
        $endpoint = "https://notify-api.line.me/api/notify";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $endpoint);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         
        $headers = [
            "Authorization: Bearer $token",
            "Content-Type: application/x-www-form-urlencoded",
        ];
        $data = [
          "message" => $message
        ];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($resp, true);
        return $response;
    }
}
