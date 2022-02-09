<?php
session_start();
include("n_functions.php");
check_session_id();

if (
    !isset($_POST['office_name']) || $_POST['office_name'] == '' ||
    !isset($_POST['comment']) || $_POST['comment'] == '' ||
    !isset($_POST['link']) || $_POST['link'] == '' ||
    !isset($_POST['tel']) || $_POST['tel'] == '' ||
    !isset($_POST['mail']) || $_POST['mail'] == ''
) {
    echo json_encode(["error_msg" => "no input_nurse"]);
    exit();
}

$n_id = $_POST['n_id'];
$office_name = $_POST['office_name'];
$comment = $_POST['comment'];
$link = $_POST['link'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];

//var_dump($_POST);
//exit();

// ここからファイルアップロード&DB登録の処理を追加しよう！！！
// データの確認
//if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
// // 情報の取得
// $uploaded_file_name = $_FILES['upfile']['name'];
// $temp_path = $_FILES['upfile']['tmp_name'];
// $directory_path = 'upload/';
// // ファイル名の準備
// $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
// $unique_name = date('YmdHis') . md5(session_id()) . '.' . $extension;
// $save_path = $directory_path . $unique_name;
// // 今回は画面に表示しないので権限の変更までで終了
// if (is_uploaded_file($temp_path)) {
// if (move_uploaded_file($temp_path, $save_path)) {
// chmod($save_path, 0644);
// } else {
// exit('Error:アップロードできませんでした');
// }
// } else {
// exit('Error:画像がありません');
// }
//} else {
// exit('Error:画像が送信されていません');
//}

// ファイル保存処理など
$pdo = connect_to_db();

$sql = 'INSERT INTO nurse_service(id, n_id, office_name, comment, link, tel, mail, created_at, updated_at) VALUES(NULL, :n_id, :office_name, :comment, :link, :tel, :mail, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':n_id', $n_id, PDO::PARAM_STR);
$stmt->bindValue(':office_name', $office_name, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':link', $link, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:service_input.php");
exit();
