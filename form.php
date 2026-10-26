<?php
require_once __DIR__ . '/Database.php';
$db = new Database();
$id = (int)($_GET['id'] ?? 0);
$student = $id ? $db->getStudent($id) : null;
if ($id && !$student) { header('Location: index.php?msg=' . urlencode('Student not found.')); exit; }
$cities = $db->getCities();
$isEdit = (bool)$student;
?>
<!doctype html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $isEdit ? 'Edit' : 'Add' ?> Student</title><link rel="stylesheet" href="assets/css/style.css"></head>
<body><div class="container narrow">
<header class="topbar"><div><span class="eyebrow">PHP OOP CRUD</span><h1><?= $isEdit ? 'Edit Student' : 'Add Student' ?></h1></div><a class="btn" href="index.php">← Back</a></header>
<section class="card form-card">
<form action="save_data.php" method="post" id="studentForm" novalidate>
<input type="hidden" name="id" value="<?= $id ?>">
<label>Full Name<input type="text" name="name" required maxlength="100" value="<?= htmlspecialchars($student['student_name'] ?? '') ?>" placeholder="Enter student name"></label>
<label>Age<input type="number" name="age" required min="1" max="120" value="<?= htmlspecialchars($student['student_age'] ?? '') ?>" placeholder="Enter age"></label>
<label>City<select name="S_city" required><option value="">Select city</option>
<?php foreach ($cities as $city): ?><option value="<?= (int)$city['c_id'] ?>" <?= (($student['student_city'] ?? '') == $city['c_id']) ? 'selected' : '' ?>><?= htmlspecialchars($city['c_name']) ?></option><?php endforeach; ?>
</select></label>
<div class="form-actions"><a class="btn" href="index.php">Cancel</a><button class="btn btn-primary" type="submit"><?= $isEdit ? 'Update Student' : 'Save Student' ?></button></div>
</form></section></div><script src="assets/js/app.js"></script></body></html>
