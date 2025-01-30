<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM ManageEmployees WHERE employee_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$employee) {
        die("ไม่พบข้อมูลพนักงาน");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "UPDATE ManageEmployees SET first_name=?, last_name=?, phone=?, email=?, address=?, salary=? WHERE employee_id=?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$first_name, $last_name, $phone, $email, $address, $salary, $id])) {
        header("Location: employees.php");
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตข้อมูล";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขพนักงาน</title>
    <link rel="stylesheet" href="../css/edit_employee.css">
</head>
<body>
    <h2>แก้ไขพนักงาน</h2>
    <form method="POST">
        <label>ชื่อ:</label> <input type="text" name="first_name" value="<?= $employee['first_name']; ?>" required><br>
        <label>นามสกุล:</label> <input type="text" name="last_name" value="<?= $employee['last_name']; ?>" required><br>
        <label>เบอร์โทร:</label> <input type="text" name="phone" value="<?= $employee['phone']; ?>" required><br>
        <label>Email:</label> <input type="email" name="email" value="<?= $employee['email']; ?>" required><br>
        <label>ที่อยู่:</label> <input type="text" name="address" value="<?= $employee['address']; ?>" required><br>
        <label>เงินเดือน:</label> <input type="number" name="salary" value="<?= $employee['salary']; ?>" required><br>
        <button type="submit">อัปเดต</button>
    </form>
    <a href="employees.php">กลับ</a>
</body>
</html>
