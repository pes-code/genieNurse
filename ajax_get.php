<?php
// var_dump($_GET);
// exit();


// ファイル読み込み，DB接続処理など
include("functions.php");

$search_word = $_GET["searchword"];

$pdo = connect_to_db();

$sql = "SELECT * FROM patient_needs  WHERE needs_category LIKE :search_word";

$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':search_word', "%{$search_word}%", PDO::PARAM_STR);
$stmt->bindValue(':search_word', $search_word, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);
// exit();

echo json_encode($result);
exit();
