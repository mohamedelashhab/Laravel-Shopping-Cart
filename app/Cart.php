<?php

namespace App;
class Cart
{
    protected $items = null;
    protected $totalQty = 0;
    protected $price = 0;

    public function __construct($olditem)
    {
        $this->items = $olditem;
    }

    public function add($product, $id)
    {
        $newItem = ['qty' => 0, 'price' => $product->price, 'item'=> $product];
        if($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                $enwItem = $this->items[$id];
            }
        }

        $newItem['qty']++;
        $newItem['price'] =  $product->price * $newItem['qty'];
        $this->totalQty++;
        $this->price += $product->price;
        $this->items[$id] = $newItem;
        
    }
}