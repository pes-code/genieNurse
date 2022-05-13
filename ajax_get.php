<?php
// var_dump($_GET);
// exit();


// ファイル読み込み，DB接続処理など
include("functions.php");

$search_word = $_GET["searchword"];

$pdo = connect_to_db();

// $sql = "SELECT * FROM patient_needs  WHERE needs_category LIKE :search_word";
// $sql = 'SELECT handlename, u_id, sex, need_title, comment, reward, deadline, needs_category, mail, n_id, patient_needs.needs_id AS needs_id,COUNT(appo_table.id) AS appo_count FROM patient_needs LEFT OUTER JOIN appo_table ON patient_needs.needs_id = appo_table.needs_id GROUP BY patient_needs.needs_id';
// $sql = "SELECT * FROM patient_needs LEFT OUTER JOIN ( SELECT needs_id, COUNT(id) AS like_count FROM appo_table GROUP BY needs_id ) AS result_table ON patient_needs.needs_id = result_table.needs_id WHERE needs_category LIKE :search_word";
$sql = "SELECT * FROM patient_needs LEFT OUTER JOIN ( SELECT needs_id, COUNT(id) AS appo_count FROM appo_table GROUP BY needs_id ) AS result_table ON patient_needs.needs_id = result_table.needs_id WHERE needs_category LIKE :search_word";


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
