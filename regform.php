<html>
    <head>
        <title>
            Registration form
        </title>
    </head>
    <body>
        <form method="POST" action="#">
            enter id:<input type="text" name="eid"/><br/><br/>
            enter name:<input type="text" name="ename"/><br/><br/>
            enter dept:<input type="text" name="dept"/><br/><br/>
            enter salary:<input type="text" name="sal"/><br/><br/>
            <input type="submit" name="submit"/>
        </form>
    </body>
</html>

<?php
$servername="localhost";
$username= "root";
$password="";
$dbname="empdb";
$tbname="emp";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
    {
    die("connection failed:".mysqli_connect_error());
}
else
    {
    echo"<br><h2 align=center>Connected....</h2><br/>";
}
$id=$_POST['eid'];
$name=$_POST['ename'];
$dep=$_POST['dept'];
$salary=$_POST['sal'];
$query="INSERT INTO emp(eid,ename,dept,sal) VALUES('".$id."','".$name."','".$dep."','".$salary."')";
$res=mysqli_query($conn,$query);
if($res)
{
echo"submitted successfully";
}
else
{
echo"error";
}
mysqli_close($conn);
?>