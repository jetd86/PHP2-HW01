<?php
require_once  __DIR__ . '/autoload.php';






$article = new App\Models\Article();
$article->id = 13;
$article->title = 'Tesfasdt';
$article->contents = 'Содержанasd7890fие';
$article->update();


