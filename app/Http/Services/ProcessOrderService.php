<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 09.06.2019
 * Time: 14:39
 */

namespace App\Http\Services;


use Illuminate\Support\Facades\Session;

class ProcessOrderService
{
    private $cart;
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function processOder()
    {

        if (!Session::has('cart')) {
            return redirect('index');
        }

        $this->cart = Session::get('cart');

        if (count($this->cart->storedItems) > 0) {
            $paymentService = new PaymentService($this->cart->totalPrice);
            if ($paymentService->finalizePayment()) {
                $keys = $this->getKeys($this->cart->storedItems);
                $emailSenderService = new EmailSenderService($this->email);
                $emailSenderService->purchaseConfirmation($keys);

                Session::forget('cart');
                return true;
            }
        }

    }


    public function getKeys($items)
    {
        $keys = [];
        foreach ($items as $item) {
            for ($i=0; $i<$item['quantity']; $i++){
                $newKey = bin2hex(random_bytes(16));
                $keyRecord = [
                    'title' => $item['product']->title,
                    'key' => $newKey
                ];
                array_push($keys, $keyRecord);
            }
        }

        return $keys;
    }
}