<?php
namespace App\Repositories;

use App\Http\Controllers\Admin\SendMailController;
use App\Repositories\Interfaces\SendMailRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Mail\SendEmail;

class SendMailRepository implements SendMailRepositoryInterface
{

    public function new()
    {
        return new SendMailController;
    }
}
