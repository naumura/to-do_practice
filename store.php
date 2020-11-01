<?php

// -ファイルの読み込み
// クラスの継承の際に学習したメソッド
require_once('Models/Task.php');


// -データの受け取り
// create.phpのフォームからデータが送られてくる
// formのactionに送信先を記載→今回であればstore.php
// データを受け取る時はスーパーグローバル変数を使用 →今回であればpostで受け取り
// 何属性に基づいてデータが送られるか？→inputのname属性に紐づいている

// inputの中にあるname属性の値が入る→title
$title = $_POST['title'];
$contents = $_POST['contents'];
// date関数(組込関数): 日付を入力する際に使用　
$currentTime = date("Y/m/d H:i:s");

// -DBへのデータ保存
// データを保存するのがゴールである
        // オブジェクト指向の形
        // 設計書(クラス)
        // インスタンス
        // インスタンスのnewの後がクラス名
        // 基本的にクラス名とファイル名が一致する
$task = new Task();
$task->create([$title, $contents, $currentTime]);

// -リダイレクト
// 処理を終えた後に違うページに移行したい場合は、header関数を使用
header('location:index.php');
exit; 

