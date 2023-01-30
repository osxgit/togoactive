<?php

namespace App\Traits\Api;

trait SendResponse{
    protected array $errorMessages = array();
    protected int $errorCode = 200;
    protected array $data = array();

    protected function sendAPIResponse(){
        $responseArray = array(
            'error_message' => $this->errorMessages,
            'response_code' => $this->errorCode,
            'data' => $this->data
        );
        return response()->json($responseArray, $this->errorCode);
    }

    protected function setError(string $errorCode, array $errorMessages){
        $this->errorMessages = $errorMessages;
        $this->errorCode = $errorCode;
    }

    protected function setResponseData(array $data){
        $this->data = (empty($data) ? null : $data);
    }

    protected function setResponseCode($text = 'success') : int{
        return match ($text) {
            "success" => 200,
            "created" => 201,
            "accepted" => 202,
            "bad_request" => 400,
            "unauthorized" => 401,
            "forbidden" => 403,
            "not_found" => 404,
            "not_acceptable" => 406,
            default => 400,
        };
    }
}
