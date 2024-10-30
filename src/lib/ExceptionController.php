<?php
namespace recurringstack;

class apiException extends \Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, $http_status_code = null, $request = null, $response = null) {

        $this->http_status_code = $http_status_code;
        $this->request = $request;
        $this->response = $response;

        // make sure everything is assigned properly
        parent::__construct($message, $code);
    }

    //Return API exception as an object with the code and message. You could then set your own http header code (Example: http_response_code($e->errorAsArray()->code) or just return the error to the user.
    public function errorAsObject() {
        $ea = (object)array("code" => $this->code,"message" => $this->message);
        return $ea;
    }

    //Return the message only
    public function getExceptionMessage() {
        return $this->message;
    }

    //Return the code only
    public function getExceptionCode() {
        return $this->code;
    }

    //Return the exception, code, request, and the response as an object. This is helpful for debugging your API calls.
    public function debugError() {
        $da = (object)array("http_status_code" => $this->http_status_code,"exception" => array("code" => $this->code,"message" => $this->message),"request" => $this->request,"response" => $this->response);
        return $da;
    }

}
