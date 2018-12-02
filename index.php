<?php

require __DIR__ . '/vendor/autoload.php';

/* PHP dotenv library. Loads environment variables from .env to getenv() */
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER'])->notEmpty();
$dotenv->required(['DB_PASSWORD']);


/* DB examples */

// http://phpfaq.ru/pdo/pdo_wrapper

$posts = App\DB::run("SELECT title FROM posts")->fetchAll();

foreach ($posts as $post) {
    echo $post->title . "<br>";
}

$post = App\DB::run(
    "SELECT * FROM posts WHERE id = :id",
    ['id' => 1]
)->fetch();

echo "<br><br>" . $post->author . "<br>" . $post->title . "<br>" . $post->body . "<br>";