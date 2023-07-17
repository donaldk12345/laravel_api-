<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserReSource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {

            return response()->json([
                'errors' => $validator->errors()
            ], 401);
        } else {

            return User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
        }
    }

    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Invalid credentials !'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $request['email'])->firstOrFail();


        $token = $user->createToken('token')->plainTextToken;

        return   response([
            'message' => 'success',
            'user' => $user,
            'token' => $token
        ]);
    }

    public function user(Request $request)
    {
        return $request->user();
    }




    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'success'
        ])->withCookie($cookie);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $users = User::with('role')->get();

        $response = [
            'users' => $users
        ];

        if ($response != null) {
            return response()->json($response);
        } else {
            return response([
                'message' => 'Invalid credentials !'
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
    }
}
