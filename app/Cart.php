<?php

namespace App;


class Cart
{
    public $storedItems = [];
    public $totalPrice = 0;
    public $totalItems = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->storedItems = $oldCart->storedItems;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalItems = $oldCart->totalItems;
        }
    }

    public function addProductToCart($product)
    {
        if (array_key_exists($product->id, $this->storedItems)) {
            $this->storedItems[$product->id]['quantity']++;
            $this->storedItems[$product->id]['value'] = $this->storedItems[$product->id]['quantity'] * $product->price;

            $this->totalPrice += $product->price;
            $this->totalItems++;
        } else {
            $newStoredItem = [
                'quantity' => 1,
                'value' => $product->price,
                'product' => $product
            ];

            $this->storedItems[$product->id] = $newStoredItem;

            $this->totalPrice += $product->price;
            $this->totalItems++;
        }
    }

    public function removeProductFromCart($id)
    {
        if (array_key_exists($id, $this->storedItems)) {
            $this->totalItems--;
            $this->totalPrice -= $this->storedItems[$id]['product']->price;
            if ($this->storedItems[$id]['quantity'] == 1) {
                unset($this->storedItems[$id]);
            } else {
                $this->storedItems[$id]['quantity']--;
                $this->storedItems[$id]['value'] -= $this->storedItems[$id]['product']->price;
            }
        } else {
            throw new \Exception('Wrong index');
        }
    }
}
