<?php
require_once __DIR__ . '/Database.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }
$id = (int)($_POST['id'] ?? 0);
if ($id > 0) {
    $db = new Database();
    $db->deleteStudent($id);
}
header('Location: index.php?msg=' . urlencode('Student deleted successfully.')); exit;
