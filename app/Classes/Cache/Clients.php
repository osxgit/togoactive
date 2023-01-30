<?php

namespace App\Src\Cache;

use Illuminate\Support\Facades\Redis;

class ClientsCache{

    private array $clientsArr = array();

    public function __construct(){
        $this->getClientData();
    }
    public function setClientDetails($clientArr) : void{
        $clientKey = $this->checkIfClientExists($clientArr);
        if($clientKey){
            // Delete Client Details
            if(empty($this->clientsArr)){
                $this->getClientData();
            }
            unset($this->clientsArr[$clientKey]);
        }

        // Insert Client Details
        $this->clientsArr[$clientArr['client_id']] = $clientArr['secret_token'];

        Redis::set('clients',json_encode($this->clientsArr));
    }

    public function getClientDetails($clientArr){
        $key = $this->checkIfClientExists($clientArr);
        if($key){
            return $this->clientsArr[$key];
        }
        return array();
    }

    private function checkIfClientExists($clientArr){
        return array_search($clientArr['client_id'], $this->clientsArr);
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