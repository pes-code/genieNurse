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
    !isset($_FILES['id_f_img']) || $_FILES['id_f_img'] == '' ||
    !isset($_FILES['id_b_img']) || $_FILES['id_b_img'] == '' ||
    !isset($_POST['advance_license']) || $_POST['advance_license'] == '' ||
    !isset($_POST['office_name']) || $_POST['office_name'] == '' ||
    !isset($_FILES['face_img']) || $_FILES['face_img'] == '' ||
    !isset($_FILES['license_img']) || $_FILES['license_img'] == ''
) {
    echo json_encode(["error_msg" => "no input123"]);
    exit();
}
//$n_id = $_POST["n_id"];
$name = $_POST["name"];
$sex = $_POST["sex"];
$birthday = $_POST["birthday"];
$address = $_POST["address"];
$tel = $_POST["tel"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];
$nurse_number = $_POST["nurse_number"];
$id_f_img = $_FILES["id_f_img"];
$id_b_img = $_FILES["id_b_img"];
$face_img = $_FILES["face_img"];
$license_img = $_FILES["license_img"];
$advance_license = $_POST["advance_license"];
$office_name = $_POST["office_name"];
// $staff = $_POST["staff"];
$link = $_POST["link"];
$appeal = $_POST["appeal"];

//[id_f_img]////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//imgデータのチェック（データがあるか、データにエラーがないか）※正しくデータが送信されていれば，ファイル自体は tmp 領域に保存された状態になっている//
if (isset($_FILES['id_f_img']) && $_FILES['id_f_img']['error'] == 0) {

    //imgデータのファイルを指定の場所に保存するために必要な情報を取得する
    $uploaded_file_name = $_FILES['id_f_img']['name']; //ファイル名
    $temp_path  = $_FILES['id_f_img']['tmp_name']; //一時保存されている場所(=tmp領域)
    $directory_path = 'id_f_upload/'; //保存場所(id_f_upload)の指定
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //ファイル名が重複することを防ぐ//////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION); //ファイルの拡張子の種類を取得する
    $unique_name = date('YmdHis') . md5(session_id()) . '.' . $extension; //ファイルに複雑な名前(日付とsessionIDを利用)をつけて，末尾に.(カンマ)と拡張子を追加する
    $save_path = $directory_path . $unique_name; //指定の保存場所を追加し，保存用のパスを作成（upload/hogehoge.png のような形になる
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //ファイル名の準備ができたら，tmp 領域から指定の保存場所へファイルを移動する(その際に、tmp 領域にファイルが存在しているか&指定のパスでファイルの保存が成功したかをCheckする)
    if (is_uploaded_file($temp_path)) { //tmp 領域にファイルが存在しているか
        if (move_uploaded_file($temp_path, $save_path)) { //指定のパスでファイルの保存が成功したか
            chmod($save_path, 0644);
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


//[id_b_img]////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_FILES['id_b_img']) && $_FILES['id_b_img']['error'] == 0) {

    $uploaded_file_name_1 = $_FILES['id_b_img']['name'];
    $temp_path_1  = $_FILES['id_b_img']['tmp_name'];
    $directory_path_1 = 'id_b_upload/';

    $extension_1 = pathinfo($uploaded_file_name_1, PATHINFO_EXTENSION);
    $unique_name_1 = date('YmdHis') . md5(session_id()) . '.' . $extension_1;
    $save_path_1 = $directory_path_1 . $unique_name_1;

    if (is_uploaded_file($temp_path_1)) {
        if (move_uploaded_file($temp_path_1, $save_path_1)) {
            chmod($save_path_1, 0644);
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


//[license_img]/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_FILES['license_img']) && $_FILES['license_img']['error'] == 0) {

    $uploaded_file_name_2 = $_FILES['license_img']['name'];
    $temp_path_2  = $_FILES['license_img']['tmp_name'];
    $directory_path_2 = 'license_upload/';

    // imgデータのファイル名が重複しないようにする記述
    $extension_2 = pathinfo($uploaded_file_name_2, PATHINFO_EXTENSION);
    $unique_name_2 = date('YmdHis') . md5(session_id()) . '.' . $extension_2;
    $save_path_2 = $directory_path_2 . $unique_name_2;

    if (is_uploaded_file($temp_path_2)) {
        if (move_uploaded_file($temp_path_2, $save_path_2)) {
            chmod($save_path_2, 0644);
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


$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM nurse_table WHERE name=:name AND sex=:sex AND birthday=:birthday AND nurse_number=:nurse_number';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':nurse_number', $nurse_number, PDO::PARAM_STR);

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
//↓後ほどskil[], np[], item[],staffを忘れず入れる
$sql = 'INSERT INTO nurse_table(n_id, name, sex, birthday, address, tel, mail, pass, nurse_number, advance_license, office_name, link, appeal, id_f_img, id_b_img, license_img, face_img, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :name, :sex, :birthday, :address, :tel, :mail, :pass, :nurse_number, :advance_license, :office_name, :link, :appeal, :id_f_img, :id_b_img, :license_img, :face_img, 0, 0, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':nurse_number', $nurse_number, PDO::PARAM_STR);
$stmt->bindValue(':advance_license', $advance_license, PDO::PARAM_STR);
$stmt->bindValue(':office_name', $office_name, PDO::PARAM_STR);
// $stmt->bindValue(':staff', $staff, PDO::PARAM_STR);
$stmt->bindValue(':link', $link, PDO::PARAM_STR);
$stmt->bindValue(':appeal', $appeal, PDO::PARAM_STR);
$stmt->bindValue(':id_f_img', $save_path, PDO::PARAM_STR);
$stmt->bindValue(':id_b_img', $save_path_1, PDO::PARAM_STR);
$stmt->bindValue(':license_img', $save_path_2, PDO::PARAM_STR);
$stmt->bindValue(':face_img', $save_path_3, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:n_login.php");
exit();
