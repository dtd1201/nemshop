<?php

namespace App\Helper;

use App\Models\Setting;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;
class CartHelper
{
    public $cartItems = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;
    public $totalOldPrice = 0;

    public function __construct()
    {
        // session()->flush();

        $this->cartItems = session()->has('cart') ? session('cart') : [];
        //   $this->cartItems = Session::has('cart') ? Session::session('cart') : [];
        $this->totalQuantity = $this->getTotalQuantity();
        $this->totalPrice = $this->getTotalPrice();
        $this->totalOldPrice = $this->getTotalOldPrice();
    }
    public function add($product, $quantity = 1)
    {
        // dd($product->options);

        // dd($color, $size);
        $option_id = $product->option_id;
        if (!$product->option_id) {
            $option_id = 0;
        }
        // dd($option_id);
        // dd($option_id);

        if (isset($this->cartItems[$product->id . '-' . $option_id])) {
            $this->cartItems[$product->id . '-' . $option_id]['quantity'] +=  $quantity;
            $this->cartItems[$product->id . '-' . $option_id]['totalPriceOneItem'] = $this->getTotalPriceOneItem($this->cartItems[$product->id . '-' . $option_id]);
            $this->cartItems[$product->id . '-' . $option_id]['totalOldPriceOneItem'] = $this->getTotalOldPriceOneItem($this->cartItems[$product->id . '-' . $option_id]);
        } else {

            $link = $product->slug;
            $cartItem = [
                'id' => $product->id,
                'option_id' => $product->option_id,
                'price' => $product->price,
                'old_price' => $product->old_price,
                'sale' => $product->sale,
                'size' => $product->size,
                'name' => $product->name,
                'slug_full' => $link,
                'avatar_path' => $product->avatar_path,
                'quantity' => $quantity,
            ];

            // dd($cartItem);
            $cartItem['totalPriceOneItem'] = $this->getTotalPriceOneItem($cartItem);
            $cartItem['totalOldPriceOneItem'] = $this->getTotalOldPriceOneItem($cartItem);
            $this->cartItems[$product->id . '-' . $option_id] = $cartItem;
        }
        session(['cart' => $this->cartItems]);
    }

    public function remove($id, $option_id = 0)
    {
        if (isset($this->cartItems[$id . '-' . $option_id])) {
            unset($this->cartItems[$id . '-' . $option_id]);
        }
        // Session::put('cart' , $this->cartItems);
        session(['cart' => $this->cartItems]);
    }

    public function update($id, $quantity, $option_id = 0)
    {
        if (isset($this->cartItems[$id . '-' . $option_id])) {
            $this->cartItems[$id . '-' . $option_id]['quantity'] = $quantity;
            $this->cartItems[$id . '-' . $option_id]['totalPriceOneItem'] = $this->getTotalPriceOneItem($this->cartItems[$id . '-' . $option_id]);
            $this->cartItems[$id . '-' . $option_id]['totalOldPriceOneItem'] = $this->getTotalOldPriceOneItem($this->cartItems[$id . '-' . $option_id]);
        }
        //  Session::put('cart' , $this->cartItems);
        session(['cart' => $this->cartItems]);
    }
    public function clear()
    {
        $this->cartItems = [];
        session()->forget('cart');
    }
    public function getTotalPriceOneItem($item)
    {
        $t = 0;
        $t +=  $item['price'] * (100 - $item['sale']) / 100 * $item['quantity'];
        return $t;
    }
    public function getTotalOldPriceOneItem($item)
    {
        $t = 0;
        $t +=  $item['price']  * $item['quantity'];
        return $t;
    }
    public function getTotalPrice()
    {

        //$count = Setting::find(417)->value;

        $tP = 0;
        $tQ = 0;
        if ($this->cartItems) {
            foreach ($this->cartItems as $key => $cartItem) {

                $tQ += $cartItem['quantity'];
                $tP +=  ($cartItem['price'] * (100 - $cartItem['sale']) / 100 * $cartItem['quantity']);
            }
        }

        if ($tQ >= 10) {
            return $tP = $tP - $tP * $count / 100;
        } else {
            return $tP;
        }
    }

    public function getTotalOldPrice()
    {
        $tP = 0;
        if ($this->cartItems) {
            foreach ($this->cartItems as $cartItem) {
                $tP +=  $cartItem['price']  * $cartItem['quantity'];
            }
        }
        return $tP;
    }

    public function getTotalQuantity()
    {
        $tQ = 0;
        foreach ($this->cartItems as $cartItem) {
            $tQ += $cartItem['quantity'];
        }

        return $tQ;
    }
}
