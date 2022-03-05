<?php
session_start();
include("functions.php");

$pdo = connect_to_db();

$name = $_POST["name"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];

$sql = 'SELECT * FROM patient_table WHERE name=:name AND mail=:mail AND pass=:pass AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
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
    echo '<a href="p_edit_login.php">編集ログイン画面へ</a>';
    exit();
} else { //上記データがある場合はセッション変数にデータを入れる。
    $_SESSION = array(); //一旦セッション変数を空にする。
    $_SESSION["session_id"] = session_id();

    $_SESSION["u_id"] = $val["u_id"];
    $_SESSION["name"] = $val["name"];
    $_SESSION["sex"] = $val["sex"];
    $_SESSION["birthday"] = $val["birthday"];
    $_SESSION["address"] = $val["address"];
    $_SESSION["tel"] = $val["tel"];
    $_SESSION["mail"] = $val["mail"];
    $_SESSION["pass"] = $val["pass"];
    $_SESSION["handlename"] = $val["handlename"];
    $_SESSION["adl"] = $val["adl"];

    header("Location:p_edit.php");
    exit();
}
