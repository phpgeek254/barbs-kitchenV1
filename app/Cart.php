<?php

namespace App;

class Cart
{
	
    public $items = [];
    public $total_quantity = 0;
    public $totalPrice = 0;


    public function __construct($oldCart)
    {
    	if($oldCart)
    	{
    		$this->items = $oldCart->items;
    		$this->total_quantity = $oldCart->total_quantity;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }


    public function add($item, $id)
    {
    	$storedItem = [
            'qty'=>0,
			'price'=>$item->price,
			'item'=>$item
    	];

    	if($this->items){
    	    	if(array_key_exists($id, $this->items))
    	    	{
    	    		$storedItem = $this->items[$id];
    	    	}
    	}
    	$storedItem['qty'] += 1;
    	$storedItem['price'] = $item->price * $storedItem['qty'];
    	$this->items[$id] = $storedItem;

    	$this->total_quantity +=1;
    	$this->totalPrice += $item->price;

    	

    }

    public function reduce_by_one($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->total_quantity--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if($this->items[$id]['qty'] <=0 )
        {
            unset($this->items[$id]);
        }
    }

    public function remove_item($id)
    {
        $this->total_quantity -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }


}
