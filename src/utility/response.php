<?php

namespace App\Utility;

class ResponseUtility
{
    public static function sendJsonResponse($data, $status_code = 200, $prettyPrint = false)
    {
        header('Content-Type: application/json');
        http_response_code($status_code);
        $jsonOptions = $prettyPrint ? JSON_PRETTY_PRINT : 0;
        echo json_encode($data, $jsonOptions);
    }
}
