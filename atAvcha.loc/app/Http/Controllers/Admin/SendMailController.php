<?php

namespace App\Http\Controllers\Admin;

use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessMail;
use App\Http\Requests\SendMail;

class SendMailController extends Controller
{

    public function store(SendMail $request)
    {

        $data = $request->all();
        /*
                $message = Mail::send(env('THEME').'.admin.mail.letter', ['data'=>$data], function ($message) use ($data) {
                    $mail_admin = env('MAIL_ADMIN');
                    $message->from( $mail_admin, $data['name']);
                    $message->to($data['email'])->subject('Тема сообщения');
                });
        */
        ProcessMail::dispatch($data);//->delay(now()->addMinutes(5));

        return response()->json('Письмо отправленно!');


    }
}
