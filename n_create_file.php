<?php
session_start();
include("n_functions.php");
check_session_id();

if (
    //  !isset($_FILES['license_img']) || $_FILES['license_img'] == '' ||
    !isset($_POST['office_name']) || $_POST['office_name'] == '' ||
    !isset($_POST['title']) || $_POST['title'] == '' ||
    !isset($_POST['reward']) || $_POST['reward'] == '' ||
    !isset($_POST['comment']) || $_POST['comment'] == '' ||
    !isset($_POST['link']) || $_POST['link'] == '' ||
    !isset($_POST['tel']) || $_POST['tel'] == '' ||
    !isset($_POST['mail']) || $_POST['mail'] == ''
) {
    echo json_encode(["error_msg" => "no input_nurse"]);
    exit();
}

//var_dump($_POST);
//exit();

$n_id = $_POST['n_id'];
$face_img = $_SESSION['face_img'];
$office_name = $_POST['office_name'];
$title = $_POST['title'];
$reward = $_POST['reward'];
$comment = $_POST['comment'];
$link = $_POST['link'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];

// var_dump($_SESSION);
// exit();


// ファイル保存処理など
$pdo = connect_to_db();

$sql = 'INSERT INTO nurse_service(id, n_id, office_name, title, reward, comment, link, tel, mail, face_img, created_at, updated_at) VALUES(NULL, :n_id, :office_name, :title, :reward, :comment, :link, :tel, :mail, :face_img, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':n_id', $n_id, PDO::PARAM_STR);
$stmt->bindValue(':office_name', $office_name, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':reward', $reward, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':link', $link, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':face_img', $face_img, PDO::PARAM_STR);  //$save_path_3


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// var_dump($_SESSION);
// exit();

header("Location:service_input.php");
exit();
