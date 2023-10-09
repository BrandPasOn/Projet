<?php

namespace App\Traits;

trait ErrorHandlingTrait
{
    public $error;

    public function getErrorMessage($message)
    {
        $this->error = $message;
        
        return session('error');
    }

    public function hasErrorMessage()
    {
        return session()->has('error');
    }
}
