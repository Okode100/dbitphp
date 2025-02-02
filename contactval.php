<html>
<head>
    <title> contact page with validation</title>
    
    <style>
        .error {color: #FF0000;}
    </style> 
    
    <link rel="stylesheet" href="main.css">
    
</head>
    
<body>
    
<?php
include  'db_connect.php'; // Include the database connection file

// Define variables and set empty values
$StudnumErr = $StudnameErr = $deptErr = $emailErr = "";
$StudNum = $StudName = $dept = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["StudNum"])) {
        $StudnumErr = "Student Number is required";
    } else {
        $StudNum = test_input($_POST["StudNum"]);
    }

    if (empty($_POST["StudName"])) {
        $StudnameErr = "Student Name is required";
    } else {
        $StudName = test_input($_POST["StudName"]);
    }

    if (empty($_POST["dept"])) {
        $deptErr = "Department is required";
    } else {
        $dept = test_input($_POST["dept"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = test_input($_POST["email"]);
    }

    // If no errors, insert into database
    if ($StudnumErr == "" && $StudnameErr == "" && $deptErr == "" && $emailErr == "") {
        $sql = "INSERT INTO students (student_number, student_name, department, email) 
                VALUES ('$StudNum', '$StudName', '$dept', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Record added successfully!</p>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<section>
    
<div class="form">
    
    <h3>Contact Form with Validation </h3>
    <p><span class="error">* required field</span></p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

        Student_Number: <input type="text" name="StudNum">
                        <span class="error">* <?php echo $StudnumErr;?></span>
          <br><br>
        Student_Name: <input type="text" name="StudName">
            <span class="error">* <?php echo $StudnameErr;?></span>
          <br><br>
        Department: <input type="text" name="dept">
            <span class="error">* <?php echo $deptErr;?></span>
          <br><br>
        E-mail: <input type="text" name="email">
            <span class="error">* <?php echo $emailErr;?></span>
          <br><br>

        <input type="submit">
        
    </form>

</div>

 <div class="form"> 
     
    <?php
        echo "<h2>Student Details:</h2>";
        echo "Your student Numer is ".$Studnum;
        echo "<br>";
        echo "Your student name is ".$StudName;
        echo "<br>";
        echo "Department is ". $dept;
        echo "<br>";
        echo "Your email is ".$email;
        echo "<br>";

    ?>
</div>
    
</section>
    
</body>
    
</html>
