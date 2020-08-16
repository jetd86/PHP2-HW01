<?php
require_once  __DIR__ . '/autoload.php';


$article = App\Models\Article::getLimitRows(3);


include __DIR__ . '/templates/news_html.php';
include __DIR__ . '/templates/footer_html.php';

