document.getElementById("addEmployeeForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch("../php/add_employee.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert("เพิ่มพนักงานสำเร็จ!");
        window.location.reload();  // รีเฟรชหน้า
    })
    .catch(error => console.error("Error:", error));
});

function confirmDelete() {
    return confirm("คุณต้องการลบพนักงานนี้ใช่หรือไม่?");
}
