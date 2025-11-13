<!DOCTYPE html>
<html>
<head>
    <title>Employee</title>
</head>
<body>
    <form method="POST" action="#">
        Enter ID: <input type="text" name="eid"><br><br>
        Enter Name: <input type="text" name="ename"><br><br>
        Enter Dept: <input type="text" name="dept"><br><br>
        Enter Salary: <input type="text" name="sal"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "empdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("<h3 align='center' style='color:red;'>Connection failed: " . mysqli_connect_error() . "</h3>");
} else {
    echo "<br><h2 align='center' style='color:green;'>Connected successfully...</h2><br/>";
}

// Check if form was submitted
if (isset($_POST['submit'])) {
    $id     = $_POST['eid'];
    $name   = $_POST['ename'];
    $dep    = $_POST['dept'];
    $salary = $_POST['sal'];

    // Prevent SQL injection using prepared statement
    $stmt = $conn->prepare("INSERT INTO emp (eid, ename, dept, sal) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id, $name, $dep, $salary);

    if ($stmt->execute()) {
        echo "<p align='center' style='color:blue;'>SUBMITTED SUCCESSFULLY!</p>";
    } else {
        echo "<p align='center' style='color:red;'>ERROR: " . $stmt->error . "</p>";
    }
    $stmt->close();
}

// Display employee table
echo "<br><h2 align='center'>EMPLOYEE DETAILS</h2><br/>";

$sql = "SELECT * FROM emp";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    echo "<table border='2' align='center' cellpadding='8' cellspacing='0'>";
    echo "<tr style='background-color:lightgray;'>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Department</th>
            <th>Salary</th>
          </tr>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>{$row['eid']}</td>
                <td>{$row['ename']}</td>
                <td>{$row['dept']}</td>
                <td>{$row['sal']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p align='center'>No results found.</p>";
}

mysqli_close($conn);
?>
