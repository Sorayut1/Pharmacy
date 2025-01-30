<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO ManageEmployees (first_name, last_name, phone, email, address, salary) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$first_name, $last_name, $phone, $email, $address, $salary])) {
        header("Location: employees.php");
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มพนักงาน</title>
    <link rel="stylesheet" href="../css/add_employee.css">
</head>
<body>
    <div class="container">
        <h2>เพิ่มพนักงาน</h2>
        <form method="POST" class="form-container">
            <label>ชื่อ:</label> 
            <input type="text" name="first_name" required>
            
            <label>นามสกุล:</label> 
            <input type="text" name="last_name" required>
            
            <label>เบอร์โทร:</label> 
            <input type="text" name="phone" required>
            
            <label>Email:</label> 
            <input type="email" name="email" required>
            
            <label>ที่อยู่:</label> 
            <textarea name="address" required></textarea>
            
            <label>เงินเดือน:</label> 
            <input type="number" name="salary" required>
            
            <button type="submit" class="btn-submit">เพิ่มพนักงาน</button>
            <a href="employees.php" class="btn-back">กลับ</a>
        </form>
    </div>
</body>
</html>
