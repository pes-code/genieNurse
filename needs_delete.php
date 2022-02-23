<?php
session_start();
include("functions.php");
check_session_id();

$needs_id = $_GET["needs_id"];

$pdo = connect_to_db();

$sql = "DELETE FROM patient_needs WHERE needs_id=:needs_id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':needs_id', $needs_id, PDO::PARAM_INT);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:needs_read.php");
exit();
