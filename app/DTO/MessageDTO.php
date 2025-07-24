<?php

namespace App\DTO;

class MessageDTO {
    public function __construct(public string $message){
    }

    public function getMessage()
    {
        return $this->message;
    }
}