<?php
session_start();
include("functions.php");

$pdo = connect_to_db();

// $name = $_POST["name"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];

$sql = 'SELECT * FROM patient_table WHERE mail=:mail AND pass=:pass AND is_deleted=0';

$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$val = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$val) { //$val(=name,mail,passのデータ)があるかチェック
    echo "<p>ログイン情報に誤りがあります．</p>";
    echo '<a href="p_login.php">ログイン画面へ</a>';
    exit();
} else { //上記データがある場合はセッション変数にデータを入れる。
    $_SESSION = array(); //一旦セッション変数を空にする。
    $_SESSION["session_id"] = session_id();

    $_SESSION["u_id"] = $val["u_id"];
    $_SESSION["name"] = $val["name"];
    $_SESSION["birthday"] = $val["birthday"];

    $_SESSION["is_admin"] = $val["is_admin"];
    $_SESSION["mail"] = $val["mail"]; ////【試行】mailで個別的なデータの参照処理をする

    //////////////////////////////////////////////
    $_SESSION["sex"] = $val["sex"];
    $_SESSION["handlename"] = $val["handlename"];
    //////////////////////////////////////////////

    // var_dump($_SESSION);
    // exit();

    header("Location:needs_input.php");
    exit();
}
