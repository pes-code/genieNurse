<?php
// ログインしていないときに動いてほしくないPHPファイル
session_start();
include('n_functions.php');
check_session_id();

// var_dump($_POST);
// exit();

if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['sex']) || $_POST['sex'] == '' ||
    !isset($_POST['birthday']) || $_POST['birthday'] == '' ||
    !isset($_POST['address']) || $_POST['address'] == '' ||
    !isset($_POST['tel']) || $_POST['tel'] == '' ||
    !isset($_POST['mail']) || $_POST['mail'] == '' ||
    !isset($_POST['pass']) || $_POST['pass'] == '' ||
    !isset($_POST['office_name']) || $_POST['office_name'] == '' ||
    !isset($_POST['link']) || $_POST['link'] == '' ||
    !isset($_POST['appeal']) || $_POST['appeal'] == '' ||
    !isset($_POST['advance_license']) || $_POST['advance_license'] == ''
) {
    exit('paramError123');
}

$n_id = $_POST["n_id"];
$name = $_POST["name"];
$sex = $_POST["sex"];
$birthday = $_POST["birthday"];
$address = $_POST["address"];
$tel = $_POST["tel"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];
$office_name = $_POST["office_name"];
$link = $_POST["link"];
$appeal = $_POST["appeal"];
$advance_license = $_POST["advance_license"];
$face_img = $_FILES["face_img"];

// var_dump($_POST);
// var_dump($_FILES);
// exit();

$pdo = connect_to_db();

// var_dump($_FILES);
// exit();

//[face_img]////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_FILES['face_img']) && $_FILES['face_img']['error'] == 0) {
    $uploaded_file_name_3 = $_FILES['face_img']['name'];
    $temp_path_3 = $_FILES['face_img']['tmp_name'];
    $directory_path_3 = 'face_upload/';

    $extension_3 = pathinfo($uploaded_file_name_3, PATHINFO_EXTENSION);
    $unique_name_3 = date('YmdHis') . md5(session_id()) . '.' . $extension_3;
    $save_path_3 = $directory_path_3 . $unique_name_3;

    if (is_uploaded_file($temp_path_3)) {
        if (move_uploaded_file($temp_path_3, $save_path_3)) {
            chmod($save_path_3, 0644);
        } else {
            exit('Error:アップロードできませんでした');
        }
    } else {
        exit('Error:画像がありません');
    }
} else {
    exit('Error:画像が送信されていません');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// var_dump($_POST);
// var_dump($_FILES);
// var_dump($save_path_3);
// exit();

$sql = "UPDATE nurse_table SET name=:name, sex=:sex, birthday=:birthday, address=:address, tel=:tel, mail=:mail, pass=:pass, office_name=:office_name, link=:link, appeal=:appeal, advance_license=:advance_license, face_img=:face_img, updated_at=now() WHERE n_id=:n_id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
$stmt->bindValue(':office_name', $office_name, PDO::PARAM_STR);
$stmt->bindValue(':link', $link, PDO::PARAM_STR);
$stmt->bindValue(':appeal', $appeal, PDO::PARAM_STR);
$stmt->bindValue(':advance_license', $advance_license, PDO::PARAM_STR);
$stmt->bindValue(':face_img', $save_path_3, PDO::PARAM_STR);
$stmt->bindValue(':n_id', $n_id, PDO::PARAM_INT);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// var_dump($sql);
// exit();

// var_dump($save_path_3);
// var_dump($_POST);
// var_dump($_FILES);
// exit();

header("Location:n_login.php");
exit();
