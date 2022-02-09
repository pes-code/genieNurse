<?php
include('functions.php');

if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['sex']) || $_POST['sex'] == '' ||
    !isset($_POST['birthday']) || $_POST['birthday'] == '' ||
    !isset($_POST['address']) || $_POST['address'] == '' ||
    !isset($_POST['tel']) || $_POST['tel'] == '' ||
    !isset($_POST['mail']) || $_POST['mail'] == '' ||
    !isset($_POST['pass']) || $_POST['pass'] == '' ||
    !isset($_POST['handlename']) || $_POST['handlename'] == ''
) {
    echo json_encode(["error_msg" => "no input321"]);
    exit();
}

$name = $_POST["name"];
$sex = $_POST["sex"];
$birthday = $_POST["birthday"];
$address = $_POST["address"];
$tel = $_POST["tel"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];
$handlename = $_POST["handlename"];

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM patient_table WHERE name=:name';

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
    echo '<a href="p_login.php">login</a>';
    exit();
}

$sql = 'INSERT INTO patient_table(u_id, name, sex, birthday, address, tel, mail, pass, handlename, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :name, :sex, :birthday, :address, :tel, :mail, :pass, :handlename, 0, 0, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
$stmt->bindValue(':handlename', $handlename, PDO::PARAM_STR);



try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:p_login.php");
exit();
