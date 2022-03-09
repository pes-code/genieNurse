<?php
// レビュー機能中身//

include('functions.php');

if (
    !isset($_POST['u_id']) || $_POST['u_id'] == '' ||
    !isset($_POST['n_id']) || $_POST['n_id'] == '' ||
    !isset($_POST['lamp']) || $_POST['lamp'] == ''

) {
    echo json_encode(["error_msg" => "no inputLAMP"]);
    exit();
}

$u_id = $_POST["u_id"];
$n_id = $_POST["n_id"];
$lamp = $_POST["lamp"];

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM lamp_table WHERE u_id=:u_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);

// var_dump($stmt);
// exit();

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

if ($stmt->fetchColumn() > 0) {
    echo "<p>すでに評価されています．</p>";
    echo '<a href="review_input.php">review</a>';
    exit();
}

$sql = 'INSERT INTO lamp_table(id, u_id, n_id, lamp) VALUES(NULL, :u_id, :n_id, :lamp)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$stmt->bindValue(':n_id', $n_id, PDO::PARAM_INT);
$stmt->bindValue(':lamp', $lamp, PDO::PARAM_INT);


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:review.php");
exit();
