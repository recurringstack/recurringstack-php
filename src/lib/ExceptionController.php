<?php
namespace recurringstack;

class apiException extends \Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0) {
        // some code

        // make sure everything is assigned properly
        parent::__construct($message, $code);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {

        if ($code != '0') {
            http_response_code($code): 
            throw new Exception($message);
        }else{  
            throw new Exception($message);
        }

    }
}