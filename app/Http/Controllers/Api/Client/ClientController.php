<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Api\Clients;
use App\Traits\Api\SendResponse;

class ClientController extends Controller
{
    use SendResponse;
    public function create(Request $request){

       $client = Clients::create([
            'clientid' => rand(1111111111,9999999999),
            'client_name' => $request->client_name,
            'client_url' => $request->client_url,
            'client_type' => $request->client_type ?? 'web',
            'secret_token' => bin2hex(openssl_random_pseudo_bytes(25)),
            'refresh_token' => bin2hex(openssl_random_pseudo_bytes(21)),
            'role_id' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->setResponseData(array(
            'data' => array(
                'client' => $client
            )
        ));
        return $this->sendAPIResponse();
    }
}
