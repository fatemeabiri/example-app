<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    //
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        //PASSPORT
        $success['token'] = $user->createToken('MyApp')->accessToken;//PASSPORT!
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

//        $this->validate($request,[
//            'email'=>'required|exist:users',
//            'password'=>'required'
//
//        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            //PASSPORT:
//
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;
            return $this->sendResponse($success, 'User login successfully.');


//            //SANCTUM:
//              $success['token']=$user->createToken('ft')->plainTextToken;
//              $success['name'] = $user->name;

            return $this->sendResponse($success, 'User login successfully.');


        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

}
