<?php

namespace App\Commons;


class APICode
{
    const SUCCESS = 200;
    const PERMISSION_DENIED = 403;
    const PAGE_NOT_FOUND = 404;
    const FAILURE_SENDING_MAIL = 601;
    const INVALID_MAIL_INFO = 602;
    const FAILURE_CALLING_LMS_API = 603;
    const FAILURE_CALLING_GOLANG_API = 604;
    const CANNOT_CONNECT_API = 999;
    const WRONG_PARAMS = 888;
    const SESSION_EXPIRED = 777;
    const SERVER_CONNECTION_ERROR = 1001;
    const HAS_TRANSFERING_REQUEST = 1002;
    const NOT_ENOUGH_FEE = 1003;
}