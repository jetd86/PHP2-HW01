<?php
require_once  __DIR__ . '/autoload.php';


$article = App\Models\Article::findById($_GET['id']);


include __DIR__ . '/templates/article_html.php';
include __DIR__ . '/templates/footer_html.php';