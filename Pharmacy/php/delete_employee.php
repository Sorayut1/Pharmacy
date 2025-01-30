<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM ManageEmployees WHERE employee_id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$id])) {
        header("Location: employees.php");
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการลบข้อมูล";
    }
}
?>
