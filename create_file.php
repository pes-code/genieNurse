<?php
session_start();
include("functions.php");
check_session_id();

if (
    !isset($_POST['handlename']) || $_POST['handlename'] == '' ||
    !isset($_POST['sex']) || $_POST['sex'] == '' ||
    !isset($_POST['need_title']) || $_POST['need_title'] == '' ||
    !isset($_POST['comment']) || $_POST['comment'] == '' ||
    !isset($_POST['reward']) || $_POST['reward'] == '' ||
    !isset($_POST['deadline']) || $_POST['deadline'] == '' ||
    !isset($_POST['needs_category']) || $_POST['needs_category'] == '' ||
    !isset($_POST['mail']) || $_POST['mail'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$u_id = $_POST['u_id'];
$handlename = $_POST['handlename'];
$sex = $_POST['sex'];
$need_title = $_POST['need_title'];
$comment = $_POST['comment'];
$reward = $_POST['reward'];
$deadline = $_POST['deadline'];
$needs_category = $_POST['needs_category'];
$mail = $_POST['mail'];

// var_dump($_POST);
// exit();

// ファイル保存処理など
$pdo = connect_to_db();

$sql = 'INSERT INTO patient_needs(id, u_id, handlename, sex, need_title, comment, reward, deadline, needs_category, mail, created_at, updated_at) VALUES(null, :u_id, :handlename, :sex, :need_title, :comment, :reward, :deadline, :needs_category, :mail, now(), now())';

$stmt = $pdo->prepare($sql);

/////////////////////////////////////////////////////////////
// $stmt->bindValue(':needs_id', $needs_id, PDO::PARAM_STR);
/////////////////////////////////////////////////////////////

$stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);
$stmt->bindValue(':handlename', $handlename, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':need_title', $need_title, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':reward', $reward, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':needs_category', $needs_category, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// var_dump($_POST);
// exit();

header("Location:needs_input.php");
exit();
