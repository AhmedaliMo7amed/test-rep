<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthSignInController extends Controller
{
    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $credentials = request(['email', 'password']);

        if ($token = auth('api')->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Wrong Email or password'], 401);
    }
    
    public function signinFacebook(Request $request) {
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        
        $findUser = User::where('provider_id', $id)->orWhere('email', $email)->first();

        if($findUser) {
            $token = auth('api')->login($findUser);
            return $this->respondWithToken($token);

        } else {
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->password = bcrypt('12345678');
            $user->email_verified_at = Carbon::now();
            $user->provider = 'facebook';
            $user->provider_id = $id;
            $user->save();
            
            $token = auth('api')->login($user);
            return $this->respondWithToken($token);
        }
    }

    public function signinGoogle(Request $request) {
        $uid = $request->uid;
        $displayName = $request->displayName;
        $email = $request->email;

        $findUser = User::where('provider_id', $uid)->orWhere('email', $email)->first();

        if($findUser) {
            $token = auth('api')->login($findUser);
            return $this->respondWithToken($token);
            
        } else {
            $user = new User;
            $user->name = $displayName;
            $user->email = $email;
            $user->password = bcrypt('12345678');
            $user->email_verified_at = Carbon::now();
            $user->provider = 'google';
            $user->provider_id = $uid;
            $user->save();
            
            $token = auth('api')->login($user);
            return $this->respondWithToken($token);
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 43200,
            'user' => auth('api')->user()
        ]);
    }
}