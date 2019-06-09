<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 09.06.2019
 * Time: 14:41
 */

namespace App\Http\Services;


class PaymentService
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function finalizePayment()
    {
        /** optional payment logic */
        return true;
    }
}