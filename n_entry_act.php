<?php
include('n_functions.php');

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
    !isset($_POST['nurse_number']) || $_POST['nurse_number'] == '' ||
    //!isset($_FILES['license_img']) || $_FILES['license_img'] == '' ||
    !isset($_POST['advance_license']) || $_POST['advance_license'] == '' ||
    !isset($_POST['office_name']) || $_POST['office_name'] == '' ||
    // !isset($_POST['skil1']) || $_POST['skil1'] == '' ||
    // !isset($_POST['skil2']) || $_POST['skil2'] == '' ||
    // !isset($_POST['skil3']) || $_POST['skil3'] == '' ||
    // !isset($_POST['skil4']) || $_POST['skil4'] == '' ||
    // !isset($_POST['skil5']) || $_POST['skil5'] == '' ||
    // !isset($_POST['skil6']) || $_POST['skil6'] == '' ||
    // !isset($_POST['skil7']) || $_POST['skil7'] == '' ||
    // !isset($_POST['skil8']) || $_POST['skil8'] == '' ||
    // !isset($_POST['np1']) || $_POST['np1'] == '' ||
    // !isset($_POST['np2']) || $_POST['np2'] == '' ||
    // !isset($_POST['np3']) || $_POST['np3'] == '' ||
    // !isset($_POST['np4']) || $_POST['np4'] == '' ||
    // !isset($_POST['np5']) || $_POST['np5'] == '' ||
    // !isset($_POST['np6']) || $_POST['np6'] == '' ||
    // !isset($_POST['np7']) || $_POST['np7'] == '' ||
    // !isset($_POST['np8']) || $_POST['np8'] == '' ||
    // !isset($_POST['item1']) || $_POST['item1'] == '' ||
    // !isset($_POST['item2']) || $_POST['item2'] == '' ||
    // !isset($_POST['item3']) || $_POST['item3'] == '' ||
    // !isset($_POST['item4']) || $_POST['item4'] == '' ||
    // !isset($_POST['item_other']) || $_POST['item_other'] == '' ||
    // !isset($_POST['staff']) || $_POST['staff'] == '' ||
    !isset($_POST['link']) || $_POST['link'] == '' ||
    !isset($_POST['appeal']) || $_POST['appeal'] == ''
) {
    echo json_encode(["error_msg" => "no input123"]);
    exit();
}

$name = $_POST["name"];
$sex = $_POST["sex"];
$birthday = $_POST["birthday"];
$address = $_POST["address"];
$tel = $_POST["tel"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];
$nurse_number = $_POST["nurse_number"];
//$license_img = $_FILES["license_img"];
$advance_license = $_POST["advance_license"];
$office_name = $_POST["office_name"];
// $skil1 = $_POST["skil1"];
// $skil2 = $_POST["skil2"];
// $skil3 = $_POST["skil3"];
// $skil4 = $_POST["skil4"];
// $skil5 = $_POST["skil5"];
// $skil6 = $_POST["skil6"];
// $skil7 = $_POST["skil7"];
// $skil8 = $_POST["skil8"];
// $np1 = $_POST["np1"];
// $np2 = $_POST["np2"];
// $np3 = $_POST["np3"];
// $np4 = $_POST["np4"];
// $np5 = $_POST["np5"];
// $np6 = $_POST["np6"];
// $np7 = $_POST["np7"];
// $np8 = $_POST["np8"];
// $item1 = $_POST["item1"];
// $item2 = $_POST["item2"];
// $item3 = $_POST["item3"];
// $item4 = $_POST["item4"];
// $item_other = $_POST["item_other"];
// $staff = $_POST["staff"];
$link = $_POST["link"];
$appeal = $_POST["appeal"];

//imgデータのチェック
//if (isset($_FILES['license_img']) && $_FILES['license_img']['error'] == 0) {
// 情報の取得
//    $uploaded_file_name = $_FILES['license_img']['name'];
//    $temp_path  = $_FILES['license_img']['tmp_name'];
//    $directory_path = 'nurseupload/';

// imgデータのファイル名が重複しないようにする記述
//   $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
//    $unique_name = date('YmdHis') . md5(session_id()) . '.' . $extension;
//    $save_path = $directory_path . $unique_name;

//    if (is_uploaded_file($temp_path)) {
//        if (move_uploaded_file($temp_path, $save_path)) {
//            chmod($save_path, 0644);
//        } else {
//            exit('Error:アップロードできませんでした');
//        }
//    } else {
//        exit('Error:画像がありません');
//    }
//} else {
//    exit('Error:画像が送信されていません');
//}
///////////////////////////////////////////////////

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM nurse_table WHERE name=:name';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

if ($stmt->fetchColumn() > 0) {
    echo "<p>すでに登録されているユーザです．</p>";
    echo '<a href="n_login.php">login</a>';
    exit();
}
//↓後ほどlicense_img,と:license_img, skil[], np[], item[],を忘れず入れる
$sql = 'INSERT INTO nurse_table(id, name, sex, birthday, address, tel, mail, pass, nurse_number, advance_license, office_name, link, appeal, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :name, :sex, :birthday, :address, :tel, :mail, :pass, :nurse_number, :advance_license, :office_name, :link, :appeal, 0, 0, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':nurse_number', $nurse_number, PDO::PARAM_STR);
//$stmt->bindValue(':license_img', $save_path, PDO::PARAM_STR);
$stmt->bindValue(':advance_license', $advance_license, PDO::PARAM_STR);
$stmt->bindValue(':office_name', $office_name, PDO::PARAM_STR);
// $stmt->bindValue(':skil1', $skil1, PDO::PARAM_STR);
// $stmt->bindValue(':skil2', $skil2, PDO::PARAM_STR);
// $stmt->bindValue(':skil3', $skil3, PDO::PARAM_STR);
// $stmt->bindValue(':skil4', $skil4, PDO::PARAM_STR);
// $stmt->bindValue(':skil5', $skil5, PDO::PARAM_STR);
// $stmt->bindValue(':skil6', $skil6, PDO::PARAM_STR);
// $stmt->bindValue(':skil7', $skil7, PDO::PARAM_STR);
// $stmt->bindValue(':skil8', $skil8, PDO::PARAM_STR);
// $stmt->bindValue(':np1', $np1, PDO::PARAM_STR);
// $stmt->bindValue(':np2', $np2, PDO::PARAM_STR);
// $stmt->bindValue(':np3', $np3, PDO::PARAM_STR);
// $stmt->bindValue(':np4', $np4, PDO::PARAM_STR);
// $stmt->bindValue(':np5', $np5, PDO::PARAM_STR);
// $stmt->bindValue(':np6', $np6, PDO::PARAM_STR);
// $stmt->bindValue(':np7', $np7, PDO::PARAM_STR);
// $stmt->bindValue(':np8', $np8, PDO::PARAM_STR);
// $stmt->bindValue(':item1', $item1, PDO::PARAM_STR);
// $stmt->bindValue(':item2', $item2, PDO::PARAM_STR);
// $stmt->bindValue(':item3', $item3, PDO::PARAM_STR);
// $stmt->bindValue(':item4', $item4, PDO::PARAM_STR);
// $stmt->bindValue(':item_other', $item_other, PDO::PARAM_STR);
// $stmt->bindValue(':staff', $staff, PDO::PARAM_STR);
$stmt->bindValue(':link', $link, PDO::PARAM_STR);
$stmt->bindValue(':appeal', $appeal, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:n_login.php");
exit();
