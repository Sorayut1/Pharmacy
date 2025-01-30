<?php
$host = "localhost"; // ใช้ localhost สำหรับ XAMPP
$username = "root"; // ค่าเริ่มต้นของ XAMPP
$password = ""; // ค่าเริ่มต้นของ XAMPP ไม่มีรหัสผ่าน
$dbname = "pharmacy"; // ชื่อฐานข้อมูลที่สร้าง


try {
    // สร้างการเชื่อมต่อด้วย PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // ตั้งค่าให้ PDO แสดงข้อผิดพลาดแบบ Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // ทดสอบการเชื่อมต่อ
    // echo "Connected successfully!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
