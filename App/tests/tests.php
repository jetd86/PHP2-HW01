<?php

use App\Models\Article;

require_once  __DIR__ . '/../../autoload.php';




$id = 6;
$oneArticle = Article::findById($id);


$article = Article::findById($id);
assert($article instanceof Article);
assert($id === $article->id);