<?php
require_once  __DIR__ . '/autoload.php';




var_dump(App\Models\Article::findById(1));



$article = new App\Models\Article();
$article->title = 'Test';
$article->contents = 'Содержание';
$article->insert();



