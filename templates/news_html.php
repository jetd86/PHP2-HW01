<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Главная страница</title>
</head>
<body>
<section class="container-row">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
        <div class="guestbook">
            <?php
            if ($article){
            foreach ($article as $a):?>
                <div class="note">
                    <div class="head"><a
                                href="<?php echo '/article.php?id=' . $a->getID(); ?>"><?php echo $a->getTitle() ?></a>
                    </div>
                    <div class="note">
                        <blockquote><?php echo $a->getContents(); ?></blockquote>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
</section>
    <?php } else {
        echo 'news not found';
    } ?>

