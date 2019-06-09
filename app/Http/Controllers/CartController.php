<?php

namespace App\Http\Controllers;

use App\Http\Services\ProcessOrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            return view('cart.cart', [
                'storedItems' => $cart->storedItems,
                'totalPrice' => $cart->totalPrice,
                'totalItems' => $cart->totalItems
            ]);
        } else {
            return view('cart.cart');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeProduct($id)
    {
        $cart = Session::get('cart');
        $cart->removeProductFromCart($id);
        Session::put('cart', $cart);
        return redirect(route('cart.index'));
    }

    public function processOrder(Request $request)
    {
        $email = $request->get('email');

        $oderService = new ProcessOrderService($email);
        if ($oderService->processOder()) {
            return redirect(route('cart.success'));
        }
        else {
            return redirect('cart.index');
        }
    }

    public function getSuccessPage()
    {
        return view('cart.success');
    }
}
