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

    //Customize this section to your liking, add custom error handling as you see fit.
    public function customFunction() {

        if ($code != '0') {
            $error_array = array("code" => $code,"message" => $message);
        }else{  
            http_response_code($code);
            $error_array = array("code" => $code,"message" => $message);
        }

        throw new Exception($error_array);

    }
}