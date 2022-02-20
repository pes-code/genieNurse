<?php
session_start();
include("n_functions.php");

$pdo = connect_to_db();

$office_name = $_POST["office_name"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];

$sql = 'SELECT * FROM nurse_table WHERE office_name=:office_name AND mail=:mail AND pass=:pass AND is_deleted=0';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':office_name', $office_name, PDO::PARAM_STR);
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
    echo '<a href="n_login.php">ログイン画面へ</a>';
    exit();
} else { //上記データがある場合はセッション変数にデータを入れる。


    $_SESSION = array(); //一旦セッション変数を空にする。
    $_SESSION["session_id"] = session_id();

    $_SESSION["n_id"] = $val["n_id"];
    $_SESSION["office_name"] = $val["office_name"];


    // var_dump($_SESSION);
    // exit();



    /////↓ログインに成功したらDBから該当データを取得してくる////
    $_SESSION["is_admin"] = $val["is_admin"];
    $_SESSION["advance_license"] = $val["advance_license"];
    $_SESSION["link"] = $val["link"];
    $_SESSION["tel"] = $val["tel"];
    $_SESSION["mail"] = $val["mail"];
    $_SESSION["face_img"] = $val["face_img"];
    //////////////////////////////////////////////////////////

    //var_dump($_SESSION);
    //exit();

    header("Location:service_input.php");
    exit();
}
