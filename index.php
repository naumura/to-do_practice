<?php
require_once('Models/Task.php');
require_once('function.php');
// 1.データベースからvs codeのindex.phpにデータを引っ張ってくる
// 2.index.phpからデータベースに接続して引っ張ってくるコードを記載(SQL文)
// 3.Select文を使用する
// 4.配列 x foreach文(繰り返し表示が可能)→今回はカード自体を繰り返す

// タスクの一覧表示機能
// ファイルの読み込み

// 1.データベースからvs codeのindex.phpにデータを引っ張ってくる
// データベースとアクセスが必要
// 必ず、require_onceで先に外部ファイル読み込みが必須

$task = new Task();
$tasks = $task->getAll();
// var_dump($tasks);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoアプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container-fulid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-dark bg-dark">
                    <a href="index.php" class="navbar-brand">Todo_practice</a>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link text-light">
                                <!--ユーザーがログインしていればEmailを表示する -->
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="create.php">Create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="signinform.php">Sign in</a>
                        </li>
                        <li class="nav-item">                            
                            <a class="nav-link text-light" href="signout.php">Sign out</a>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="title">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </li>
                    </ul>

                </nav>
            </div>
        </div>

        <div class="row p-3">
        <?php foreach ($tasks as $task) : ?>
            <div class="col-sm-6 col-md-4 col-lg-3 py-3 py-3">
                <div class="card">
                    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= h($task["title"]); ?></h5>
                        <p class="card-text">
                            <?= h($task["contents"]);?></p>
                        <div class="text-right d-flex justify-content-end">
                            <!-- * href内を変更する -->
                            <a href="edit.php" class="btn text-success">EDIT</a>
                            <form action="delete.php" method="post">
                                <!-- * valueの中にtaskのidが入るようにする -->
                                <input type="hidden" name="id" value="">
                                <button type="submit" class="btn text-danger">DELETE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             <?php endforeach; ?>
        </div>
    </div>


</body>

</html>

