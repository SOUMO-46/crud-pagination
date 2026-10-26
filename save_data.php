<?php
require_once __DIR__ . '/Database.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }
$db = new Database();
$id = (int)($_POST['id'] ?? 0);
$name = trim($_POST['name'] ?? '');
$age = (int)($_POST['age'] ?? 0);
$city = (int)($_POST['S_city'] ?? 0);

if ($name === '' || mb_strlen($name) > 100 || $age < 1 || $age > 120 || $city < 1) {
    header('Location: form.php' . ($id ? '?id='.$id : '') . '&error=' . urlencode('Please enter valid student details.')); exit;
}

if ($id) { $db->updateStudent($id, $name, $age, $city); $message = 'Student updated successfully.'; }
else { $db->createStudent($name, $age, $city); $message = 'Student added successfully.'; }
header('Location: index.php?msg=' . urlencode($message)); exit;
