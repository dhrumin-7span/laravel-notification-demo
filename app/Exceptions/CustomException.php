<?php

namespace App\Exceptions;

use Exception;
use App\Traits\ApiResponser;

class CustomException extends Exception
{
    use ApiResponser;

    public function __construct(public string $messageStr, public int $resCode = 400, public $isCustom = false, public array $errorMsgs = []) {}

    public function report()
    { 
        return '';
    }

    public function render()
    {
        if ($this->isCustom) {
            return $this->error($this->errorMsgs, $this->resCode);
        }

        $data['message'] = $this->messageStr;
        $data['errors']['message'][] = $this->messageStr;

        return $this->error($data, $this->resCode);
    }
}