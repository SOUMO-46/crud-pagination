<?php
require_once __DIR__ . '/Database.php';
$db = new Database();

$perPage = 5;
$page = max(1, (int)($_GET['page'] ?? 1));
$search = trim($_GET['search'] ?? '');
$total = $db->countStudents($search);
$totalPages = max(1, (int)ceil($total / $perPage));
if ($page > $totalPages) $page = $totalPages;
$students = $db->getStudents($page, $perPage, $search);

function pageUrl(int $page, string $search): string {
    $params = ['page' => $page];
    if ($search !== '') $params['search'] = $search;
    return '?' . http_build_query($params);
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Student Management</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <header class="topbar">
        <div><span class="eyebrow">PHP OOP CRUD</span><h1>Student Management</h1></div>
        <a class="btn btn-primary" href="form.php">+ Add Student</a>
    </header>

    <?php if ($msg = ($_GET['msg'] ?? '')): ?>
        <div class="alert success"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <section class="card">
        <div class="toolbar">
            <div><h2>Students</h2><p><?= $total ?> record<?= $total === 1 ? '' : 's' ?> found</p></div>
            <form class="search" method="get">
                <input type="search" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search name or city...">
                <button class="btn btn-secondary" type="submit">Search</button>
                <?php if ($search !== ''): ?><a class="clear" href="index.php">Clear</a><?php endif; ?>
            </form>
        </div>

        <div class="table-wrap">
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Age</th><th>City</th><th class="actions">Actions</th></tr></thead>
            <tbody>
            <?php if (!$students): ?>
                <tr><td colspan="5" class="empty">No students found.</td></tr>
            <?php else: foreach ($students as $student): ?>
                <tr>
                    <td>#<?= (int)$student['student_id'] ?></td>
                    <td><strong><?= htmlspecialchars($student['student_name']) ?></strong></td>
                    <td><?= (int)$student['student_age'] ?></td>
                    <td><?= htmlspecialchars($student['city_name']) ?></td>
                    <td class="actions">
                        <a class="btn btn-small" href="form.php?id=<?= (int)$student['student_id'] ?>">Edit</a>
                        <button class="btn btn-small btn-danger delete-btn" data-id="<?= (int)$student['student_id'] ?>" data-name="<?= htmlspecialchars($student['student_name'], ENT_QUOTES) ?>">Delete</button>
                    </td>
                </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
        </div>

        <?php if ($totalPages > 1): ?>
        <nav class="pagination" aria-label="Pagination">
            <?php if ($page > 1): ?><a href="<?= pageUrl($page-1, $search) ?>">&laquo; Prev</a><?php endif; ?>
            <?php
            $start = max(1, $page - 2); $end = min($totalPages, $page + 2);
            for ($i=$start; $i<=$end; $i++):
            ?><a class="<?= $i === $page ? 'active' : '' ?>" href="<?= pageUrl($i, $search) ?>"><?= $i ?></a><?php endfor; ?>
            <?php if ($page < $totalPages): ?><a href="<?= pageUrl($page+1, $search) ?>">Next &raquo;</a><?php endif; ?>
        </nav>
        <?php endif; ?>
    </section>
</div>
<script src="assets/js/app.js"></script>
</body>
</html>
