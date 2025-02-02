<?php
include 'db_connect.php'; // Connect to database

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

echo "<h2>Registered Students</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Student Number</th>
                <th>Student Name</th>
                <th>Department</th>
                <th>Email</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["student_number"]."</td>
                <td>".$row["student_name"]."</td>
                <td>".$row["department"]."</td>
                <td>".$row["email"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
