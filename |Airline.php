<?php
$servername="localhost";
$username="root";
$password="";
$dbname="airdb";
$tbname="air";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
die("Connection failed".mysqli_connect_error());
}
else
{
echo"<br><h2 align=center>FLIGHT DETAILS</h2><br/>";
}
$sql="SELECT*FROM air";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
echo"<table border=2 align=center>";
echo"<tr><th>From</th>";
echo"<th>Airline</th>";
echo"<th>Departure Date</th>";
echo"<th>Arrival Date</th>";
echo"<th>To</th>";
echo"<th>Flight Number</th>";
echo"<th>Terminal</th></tr>";
while($row=mysqli_fetch_assoc($res))
{
echo"<tr><td>$row[from]</td>";
echo"<td>$row[airline]</td>";
echo"<td>$row[dd]</td>";
echo"<td>$row[ad]</td>";
echo"<td>$row[too]</td>";
echo"<td>$row[fn]</td>";
echo"<td>$row[ter]</td></tr>";
}
echo"</table>";
}
else
{
echo"0 results";
}
mysqli_close($conn);
?>
