<?php

namespace App\Classes\Cache;

use Illuminate\Support\Facades\Redis;

class ClientsCache{

    private array $clientsArr = array();

    public function __construct(){
        $this->getClientData();
    }
    public function setClientDetails($clientArr) : void{
        $clientKey = $this->checkIfClientExists($clientArr['client_id']);
        if($clientKey){
            // Delete Client Details
            if(empty($this->clientsArr)){
                $this->getClientData();
            }
            unset($this->clientsArr[$clientKey]);
        }

        // Insert Client Details
        $this->clientsArr[$clientArr['client_id']] = array('secret_token' => $clientArr['secret_token']);

        Redis::set('clients',json_encode($this->clientsArr));
    }

    public function getClientDetails($clientId) : array{
        //echo "Get Cache";
        $key = $this->checkIfClientExists($clientId);
        if($key){
            return $this->clientsArr[$key];
        }
        return array();
    }

    private function checkIfClientExists($clientId){
        return array_search($clientId, $this->clientsArr);
    }

    private function getClientData() : void{
        $clients = Redis::get('clients');
        if($clients != ''){
            $clientsArr = json_decode($clients,true);
            if(count($clientsArr) > 0){
                $this->clientsArr = $clientsArr;
            }
        }
    }
}