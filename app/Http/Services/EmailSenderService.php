<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 09.06.2019
 * Time: 14:43
 */

namespace App\Http\Services;


use App\Mail\purchaseConfirmation;
use Illuminate\Support\Facades\Mail;

class EmailSenderService
{
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function purchaseConfirmation($keys)
    {
        Mail::to($this->email)->send(new PurchaseConfirmation($keys));
    }
}