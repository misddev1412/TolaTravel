<?php

namespace App\Commons;


class Message
{
    private $mesages = [
        APICode::SUCCESS => 'success',
        APICode::PAGE_NOT_FOUND => 'Not found',
        APICode::SERVER_CONNECTION_ERROR => 'cannot connect to database',
        APICode::HAS_TRANSFERING_REQUEST => 'please complete your tuition transfer before request ones',
        APICode::FAILURE_SENDING_MAIL => 'mail has not been sent',
        APICode::INVALID_MAIL_INFO => 'invalid mail info',
        APICode::PERMISSION_DENIED => 'permission denied',
        APICode::NOT_ENOUGH_FEE => 'not enough fee',
        APICode::FAILURE_CALLING_LMS_API => 'can\'t call lms api',
        APICode::FAILURE_CALLING_GOLANG_API => 'can\'t call golang api',
        APICode::CANNOT_CONNECT_API => 'can\'t connect to api',
        APICode::WRONG_PARAMS => 'something wrong with parameter',
        APICode::SESSION_EXPIRED => 'session expired. please logout and login again'
    ];

    public function getMessage($code)
    {
        return $this->mesages[$code];
    }

    public static function genErrorMessage($messages)
    {
        $msg = '';
        if (!is_object($messages)) {
            $msg = $messages;
        } else {
            $messageArray = json_decode(json_encode($messages), true);

            foreach ($messageArray as $message) {
                if (is_array($message)) {
                    foreach ($message as $m) {
                        $msg .= "$m\n";
                    }
                } else {
                    $msg .= "$message\n";
                }
            }
        }

        return $msg;
    }
}