<?php
include('n_functions.php');
////////////get⇒post//////////
// var_dump($_POST);
// exit();

$n_id = $_POST['n_id'];
$needs_id = $_POST['needs_id'];


$pdo = connect_to_db();

///////////////////////////////////////////////////////////

$sql = 'SELECT COUNT(*) FROM appo_table WHERE n_id=:n_id AND needs_id=:needs_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':n_id', $n_id, PDO::PARAM_STR);
$stmt->bindValue(':needs_id', $needs_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$appo_count = $stmt->fetchColumn();


// var_dump($appo_count);
// exit();

if ($appo_count != 0) {
    // appoされている場合はappoが取り消される
    $sql = 'DELETE FROM appo_table WHERE n_id=:n_id AND needs_id=:needs_id';
} else {
    // appoされてない場合はappoされる
    $sql = 'INSERT INTO appo_table (id, n_id, needs_id, created_at) VALUES (NULL, :n_id, :needs_id, sysdate())';
}

//////////////////////////////////////////////////////////


//$sql = 'INSERT INTO appo_table (id, n_id, needs_id, created_at) VALUES (NULL, :n_id, :needs_id, now())';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':n_id', $n_id, PDO::PARAM_STR);
$stmt->bindValue(':needs_id', $needs_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:needs_browsing.php");
exit();
