<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Redis;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Traits\Api\SendResponse;


class UserController extends Controller
{
    use SendResponse;

    public function create(Request $request){
        try {
            throw new \Exception('Testing my application!!');
        }
        catch(\Throwable $e){
            echo $e->getMessage();
        }


        $validation = Validator::make($request->all(),[
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()]
        ]);

        if($validation->fails()){
            $this->setError($this->setResponseCode('not_acceptable'),array('errors' => $validation->messages()));
        }else{
            $userArr = array(
                'tgp_userid' => $request->tgp_userid ?? 0,
                'fullname' => $request->fullname ?? '',
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'last_logged_in' => date('Y-m-d H:i:s')
            );

            $user = User::create($userArr);
            event(new Registered($user));
            $this->setResponseData(array(
                'data' => array('user' => $user,)
            ));
        }

        return $this->sendAPIResponse();


    }

    /*public function test(Request $request){
        $arr = array("message" => $request->test);

//        Redis::set('client_id',13124,'EX',10);

//        Redis::del('client_id');
//        echo Redis::get('client_id');

        return response()->json($arr, 200);
    }*/
}
