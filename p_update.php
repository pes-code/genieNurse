<?php
// ログインしていないときに動いてほしくないPHPファイル
session_start();
include('functions.php');
check_session_id();

//var_dump($_POST);
//exit();


if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['sex']) || $_POST['sex'] == '' ||
    !isset($_POST['birthday']) || $_POST['birthday'] == '' ||
    !isset($_POST['address']) || $_POST['address'] == '' ||
    !isset($_POST['tel']) || $_POST['tel'] == '' ||
    !isset($_POST['mail']) || $_POST['mail'] == '' ||
    !isset($_POST['pass']) || $_POST['pass'] == '' ||
    !isset($_POST['handlename']) || $_POST['handlename'] == '' ||
    !isset($_POST['adl']) || $_POST['adl'] == ''

) {
    exit('paramError');
}

$name = $_POST["name"];
$sex = $_POST["sex"];
$birthday = $_POST["birthday"];
$address = $_POST["address"];
$tel = $_POST["tel"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];
$handlename = $_POST["handlename"];
$adl = $_POST["adl"];
$u_id = $_POST["u_id"];


$pdo = connect_to_db();

$sql = "UPDATE patient_table SET name=:name, sex=:sex, birthday=:birthday, address=:address, tel=:tel, mail=:mail, pass=:pass, handlename=:handlename, adl=:adl, updated_at=now() WHERE u_id=:u_id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
$stmt->bindValue(':handlename', $handlename, PDO::PARAM_STR);
$stmt->bindValue(':adl', $adl, PDO::PARAM_STR);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:p_login.php");
exit();
