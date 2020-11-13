<?php

class DbManager
{
    public $dbh;

    public function connect()
    {
        //DBに接続(自分のPC上)
        // $host = "localhost";
        // データベース名を変えた場合はこちらを変更する（$dbname = "データベース名"）
        // $dbname = "todo";
        // $charset = "utf8mb4";
        // $user = 'root';
        // $password = '';

        //DBに接続(Heroku内)       
        $host = getenv('host'); //MySQLがインストールされてるコンピュータ
        $dbname = getenv('dbname'); //使用するDB
        $charset = "utf8"; //文字コード
        $user = getenv('username'); //MySQLにログインするユーザー名
        $password = getenv('password'); //ユーザーのパスワード
        
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        try {
            $this->dbh = new PDO($dsn, $user, $password, $options);
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
            exit;
        }

    }
}

// dbconnect.php → データベースへのアクセスコード