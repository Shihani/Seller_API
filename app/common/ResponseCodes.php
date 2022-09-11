<?php

namespace App\common;

use Illuminate\Http\Response;

/**
 *
 */
class ResponseCodes extends Response
{

    //Common error codes
    const ERROR_VALIDATION_FAILED = 500;
    const SOMETHING_WENT_WRONG =403 ;
    const NOT_FOUND=404;
    const AUTH_FAILED=401;
    const HTTP_OK=200;

    private static $messages = [
        500 => 'Validation failed',
        403=>'Exception occurred',
        200 => 'OK',
        404=>'Not found',
       401=>'Authentication Failed'   ,
       ];

    public static function getMessage($code)
    {
        self::$statusTexts = self::$statusTexts + self::$messages;
        return \Arr::get(self::$statusTexts, $code, '');
    }
}
