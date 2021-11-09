<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use App\Repositories\SendMailRepository;

class SendMail extends FormRequest
{

    public function __construct( SendMailRepository $sendEmail)
    {
            $this->sendEmail = $sendEmail;
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(User $user)
    {
        return (Gate::allows('send', $this->sendEmail->new() ) ) ? true : false;
       // return (Gate::allows('send', new SendMail()) ) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required'
        ];
    }
}
