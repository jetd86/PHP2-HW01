<?php
require_once  __DIR__ . '/autoload.php';




//var_dump(App\Models\Article::findById(1));


//Эта методлогия записи данных в базу называется Active Record
//$article = new App\Models\Article();
//$article->title = 'Выборы в Беларуси';
//$article->contents = 'Сегодня проходят выбори в Беларуси, лукашенко побеждает как всегда';
//$article->insert();
//



$singleton = App\Models\SimpleSingleton::getInstance();
$singleton->setTest('test 1');
$singleton2 = \App\Models\SimpleSingleton::getInstance();

$singleton2->setTest('test2');
$singleton3 = \App\Models\SimpleSingleton::getInstance();

var_dump($singleton);
var_dump($singleton2);
var_dump($singleton === $singleton2 && $singleton3 === $singleton2);