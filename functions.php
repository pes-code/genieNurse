<?php
//DBに接続する関数
function connect_to_db()
{


    // $dbn = 'mysql:dbname=genienurse;charset=utf8mb4;port=3306;host=localhost';
    // $user = 'root';
    // $pwd = '';

    $dbn = 'mysql:dbname=genienurse_db;charset=utf8mb4;port=3309;host=localhost';
    $user = 'root';
    $pwd = '';


    // $dbn = 'mysql:dbname=heroku_13302bc9a14c02b;charset=utf8mb4;port=3306;host=us-cdbr-east-05.cleardb.net';
    // $user = 'b03cb806d86b33';
    // $pwd = '6e567253';

    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
}


//正しい方法でloginしているかCheckする関数
function check_session_id()
{
    if (
        !isset($_SESSION["session_id"]) ||
        $_SESSION["session_id"] != session_id()
    ) {
        header("Location:p_login.php");
    } else {
        session_regenerate_id(true);
        $_SESSION["session_id"] = session_id();
    }
}
