<?php

namespace App;
class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $price = 0;

    public function __construct($olditem)
    {
        if($olditem){
            $this->items = $olditem->items;
            $this->totalQty = $olditem->totalQty;
            $this->price = $olditem->price;
        }
        
    }

    public function add($product, $id)
    {
        $newItem = ['qty' => 0, 'price' => $product->price, 'item'=> $product];
        if($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                $newItem = $this->items[$id];
            }
        }
        $newItem['qty']++;
        $newItem['price'] =  $product->price * $newItem['qty'];
        $this->totalQty++;
        $this->price += $product->price;
        $this->items[$id] = $newItem;
        request()->session()->put('cart', $this);
        // dd($this->items);
    }
}