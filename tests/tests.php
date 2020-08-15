<?php

use App\Models\Article;

require_once __DIR__ . '/../autoload.php';


//тестировани execute метода
$db = new App\Models\DB;
$sql = "SELECT * FROM `php2_lesson1`.`news` n where n.id = :id";
$params = [ ':id' => 56];
assert(true === $db->execute($sql,$params));


$sql = "UPDATE news SET title=:newTitle, contents=:contents  WHERE id=:id";
$params = [
    ':newTitle' => 'За Беларусь',
    ':id' => 6,
    ':contents' => 'За справедливость',
    ];
assert(true === $db->execute($sql,$params));


$sql = "INSERT INTO news (`title`, `contents`) VALUES (:title, :contents)";
$params = [
    ':title' => 'За правду',
    ':contents' => 'За Справедливые выборы',
];
assert(true === $db->execute($sql,$params));


//тестирование метода findById, если есть запись то возрвращаем ее, если нет то false
$id = '5';
$oneArticle = Article::findById($id);
assert($id === $oneArticle->id);


