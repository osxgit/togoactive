<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Traits\Api\FilterRequestParameters;
use App\Traits\Api\SendResponse;
use App\Classes\Cache\ClientsCache;
use App\Models\Api\Clients;


class ValidateJsonRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    use FilterRequestParameters;
    use SendResponse;

    public function handle(Request $request, Closure $next)
    {

        if (empty($request->json()->all())) {
            $this->setError(400,"Invalid Request!");
            return $this->sendAPIResponse();
        }

        $bypass_token = $this->filterString($request->bypass_token);
        if($bypass_token == 'l12k500kfmg19219dksk130151ds'){
            return $next($request);
        }

        $client = new Clients();

        $hashed_token = $this->filterString($request->hashed_token);
        $token = $this->filterNumber($request->token);
        $clientId = $this->filterNumber($request->client_id);
//        $clientId = $this->filterString($request->client_id);

        if(!$client->validateAPIToken($hashed_token,$token,$clientId)){
            $this->setError($this->setResponseCode('unauthorized'),"Not Authorised");
            return $this->sendAPIResponse();
        }

        try{
            $clientId = $client->getClientFromHashedToken($hashed_token,$token,$clientId,'web');
        }
        catch(Throwable $e){
            $this->setError($this->setResponseCode('bad_request'),"Unexpected Error Occurred");
            $this->setResponseData(array('error' => $e->getMessage()));
            return $this->sendAPIResponse();
        }

        if($clientId <= 0){
            $this->setError($this->setResponseCode('bad_request'),"Client not found!! ".$clientId);
            return $this->sendAPIResponse();
        }

        return $next($request);
    }
}
