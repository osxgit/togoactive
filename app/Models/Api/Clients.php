<?php

namespace App\Models\Api;

use http\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Classes\Cache\ClientsCache;

class Clients extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected ClientsCache $clientCache;
    protected int $clientId;

    protected $fillable = [
        'clientid',
        'client_name',
        'client_url',
        'client_type',
        'secret_token',
        'refresh_token',
        'role_id',
        'created_at',
        'modified_at'
    ];

    public function validateAPIToken(string $hashedToken,int $token, int $clientId) : bool{
        if($hashedToken == '' || $token == '' || $clientId <= 0){
            return false;
        }
        return true;
    }

    public function getClientFromHashedToken(string $hashed_token,int $token,int $clientId,string $client_type = 'web'){


        //return $this->sha1_multiple(1,2,3);

        $secret_token = $this->getClientSecretToken($clientId, $client_type);

        if($secret_token){
            $shaVal = $this->sha1_multiple($clientId,$secret_token,$token);

            if($shaVal == $hashed_token){
                $this->clientId = $clientId;
                return $this->clientId;
            }
        }

        return false;
    }

    private function getClientSecretToken($clientId,$client_type){
        if(!isset($this->clientCache)){
            $this->clientCache = new ClientsCache();
        }

        $clientDetails = $this->clientCache->getClientDetails($clientId);

        if(!empty($clientDetails)){
            return $clientDetails['secret_token'];
        }

        $client = self::where('clientid',$clientId)->where('client_type',$client_type)->first();

        if($client && $client->secret_token != ''){
            $this->clientCache->setClientDetails(
                    array('client_id' => $clientId, 'secret_token' => $client->secret_token)
            );

            return $client->secret_token;
        }
        return false;
    }

    protected function sha1_multiple(){
        $args = func_get_args();
        return sha1(serialize($args));
    }
}
