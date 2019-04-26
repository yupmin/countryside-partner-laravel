<?php

namespace App\Exceptions;

use Exception;

class MeteoException extends Exception
{
    //
    private $exceptionInfo = [];


    /**
     * MeteoException constructor.
     * @param Int $code
     * @param String $message
     * @param Exception|null $previous
     */
    public function __construct(Int $code = 999, String $message = "", Exception $previous = null){

        $this->customExceptionCode($code, $message);

        parent::__construct( $this->exceptionInfo['message'], $this->exceptionInfo['code'], $previous );

    }


    /**
     * @param Int $code         들어오는 코드와 부합하지 않을 시 999 호출
     * @param String $message
     */
    private function customExceptionCode(Int $code, String $message){

        switch($code) {

            case 1 :

                $this->exceptionInfo['code'] = $code;
                $this->exceptionInfo['message'] = '알 수 없는 회원 입니다.';
                break;


            default :

                $this->exceptionInfo['code'] = 999;
                $this->exceptionInfo['message'] = '알 수 없는 에러입니다.';
                break;
        }

        if(!empty($message)) $this->exceptionInfo['message'] = $message;
    }
}
