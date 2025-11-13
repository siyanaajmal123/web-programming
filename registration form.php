
<!DOCTYPE html>
<html>
<head>
    <title>Employee Form</title>
</head>
<body>
    <form method="POST" action="#">
        <label>Enter ID:</label>
        <input type="text" name="eid"><br>

        <label>Enter Name:</label>
        <input type="text" name="ename"><br>

        <label>Enter Department:</label>
        <input type="text" name="dept"><br>

        <label>Enter Salary:</label>
        <input type="text" name="sal"><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "empdb";
$tbname     = "emp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "<br><h2 align='center'>Connected...</h2><br/>";
}

if (isset($_POST['submit'])) {
    $id     = $_POST['eid'];
    $name   = $_POST['ename'];
    $dep    = $_POST['dept'];
    $salary = $_POST['sal'];

    $query = "INSERT INTO emp(eid, ename, dept, sal) 
              VALUES ('$id', '$name', '$dep', '$salary')";

    $res = mysqli_query($conn, $query);

    if ($res) {
        echo "SUBMITTED SUCCESSFULLY!!";
    } else {
        echo "ERROR: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
