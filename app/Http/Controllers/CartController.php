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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function processOrder(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->get('email');

        $oderService = new ProcessOrderService($email);
        if ($oderService->processOder()) {
            return view('cart.success', ['email' => $email]);
        }
        else {
            return redirect('cart.index');
        }
    }
}
