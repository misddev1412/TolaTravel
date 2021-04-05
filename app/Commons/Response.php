<?php

namespace App\Commons;


class Response
{
    public function formatResponse($code, $data, $message = '')
    {
        $messageObj = new Message();
        return response()->json([
            "code" => $code,
            "message" => (!$message) ? $messageObj->getMessage($code) : (Message::genErrorMessage($message)),
            "data" => $data
        ]);
    }
}