<?php

namespace App\Models;

use App\Model;

class Article extends Model
{
    public static $table = "news";
    public $title;
    public $contents;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}