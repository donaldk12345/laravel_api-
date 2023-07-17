<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ForgotRequest;
use App\Mail\VerifyEmail;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class ForgotController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgotten(Request $request)
    {

        $email = $request->input('email');
        $request->validate([
            "email" => "required|email"
        ]);
        $user = User::where("email", $email)->first();


        if (!$user) {
            return response([
                'message' => ' User don\'t exist !',
                'email' => $email
            ], 404);
        }

        $token = Str::random(60);

        if ($user != null) {
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token
            ]);

            Mail::to('email.verify', ['token' => $token], function (Message $message) use ($email) {
                $message->to($email);
                $message->subject('Reset your password !');
            });

            return response([
                'message' => 'check your email'
            ]);
        } else {
            return response([
                'message' => "error"
            ], 400);
        }
    }
}
