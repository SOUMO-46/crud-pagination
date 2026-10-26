<?php
require_once __DIR__ . '/config.php';

class Database
{
    private mysqli $mysqli;

    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $this->mysqli->set_charset('utf8mb4');
        } catch (mysqli_sql_exception $e) {
            die('Database connection failed. Please check config.php and import database.sql.');
        }
    }

    public function getStudents(int $page, int $perPage, string $search = ''): array
    {
        $offset = ($page - 1) * $perPage;
        $like = '%' . $search . '%';

        $sql = "SELECT s.student_id, s.student_name, s.student_age, s.student_city,
                       c.c_name AS city_name
                FROM student s
                INNER JOIN city_id c ON s.student_city = c.c_id
                WHERE s.student_name LIKE ? OR c.c_name LIKE ?
                ORDER BY s.student_id DESC
                LIMIT ? OFFSET ?";

        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('ssii', $like, $like, $perPage, $offset);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function countStudents(string $search = ''): int
    {
        $like = '%' . $search . '%';
        $stmt = $this->mysqli->prepare(
            'SELECT COUNT(*) AS total FROM student s INNER JOIN city_id c ON s.student_city = c.c_id
             WHERE s.student_name LIKE ? OR c.c_name LIKE ?'
        );
        $stmt->bind_param('ss', $like, $like);
        $stmt->execute();
        return (int) $stmt->get_result()->fetch_assoc()['total'];
    }

    public function getCities(): array
    {
        $result = $this->mysqli->query('SELECT c_id, c_name FROM city_id ORDER BY c_name ASC');
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getStudent(int $id): ?array
    {
        $stmt = $this->mysqli->prepare('SELECT student_id, student_name, student_age, student_city FROM student WHERE student_id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }

    public function createStudent(string $name, int $age, int $city): bool
    {
        $stmt = $this->mysqli->prepare('INSERT INTO student (student_name, student_age, student_city) VALUES (?, ?, ?)');
        $stmt->bind_param('sii', $name, $age, $city);
        return $stmt->execute();
    }

    public function updateStudent(int $id, string $name, int $age, int $city): bool
    {
        $stmt = $this->mysqli->prepare('UPDATE student SET student_name = ?, student_age = ?, student_city = ? WHERE student_id = ?');
        $stmt->bind_param('siii', $name, $age, $city, $id);
        return $stmt->execute();
    }

    public function deleteStudent(int $id): bool
    {
        $stmt = $this->mysqli->prepare('DELETE FROM student WHERE student_id = ?');
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
