<?php
require 'db.php';

$sql = "SELECT * FROM ManageEmployees";
$stmt = $conn->prepare($sql);
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h2>จัดการพนักงาน</h2>
        <a href="add_employee.php" class="btn-add">+ เพิ่มพนักงาน</a>
        <table>
            <tr>
                <th>ID</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เบอร์โทร</th>
                <th>Email</th>
                <th>ที่อยู่</th>
                <th>เงินเดือน</th>
                <th>วันที่เพิ่มพนัก</th>
                <th>วันที่แก้ไขข้อมูล</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
            <?php foreach ($employees as $emp): ?>
            <tr>
                <td><?= $emp['employee_id']; ?></td>
                <td><?= $emp['first_name']; ?></td>
                <td><?= $emp['last_name']; ?></td>
                <td><?= $emp['phone']; ?></td>
                <td><?= $emp['email']; ?></td>
                <td><?= $emp['address']; ?></td>
                <td><?= $emp['salary']; ?></td>
                <td><?= $emp['created_at']; ?></td>
                <td><?= $emp['updated_at']; ?></td>
                <td><a href="edit_employee.php?id=<?= $emp['employee_id']; ?>" class="btn-edit">แก้ไข</a></td>
                <td><a href="delete_employee.php?id=<?= $emp['employee_id']; ?>" class="btn-delete" onclick="return confirmDelete()">ลบ</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>
