<?php

namespace App\Models;

class Item
{

    public  static $table = '`php2_lesson1`.items';
    public $title;
    public $price;

    public function __construct($data = [])
    {
        if(!empty($data)){
            $this->id = $data['id'];
            $this->title = $data['title'];
            $this->price  = $data['price'];
        }
    }

}