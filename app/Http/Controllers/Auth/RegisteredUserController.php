<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|max:255|email|regex:/(.*)@togoparts\.com/i|unique:users',
            'password' => 'required|min:8',
        ])->validate();
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'username' => ['required', 'string', 'max:255','unique:'.User::class],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', Rules\Password::defaults()],
        // ]);
        // |regex:/(.*)@myemail\.com/i|unique:users


        $user = User::create([
            'fullname' => $request->name ?? '',
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'last_logged_in' => date('Y-m-d H:i:s')
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
