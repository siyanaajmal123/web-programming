.  <html>
    <body>
        <h1>Electricity Bill</h1>
        <form method="post" action="#">
            consumer ID: <input type="number" name="id"/><br/><br/>
            Name:<input type="text" name="name"/><br/><br/>
            previous reading:<input type="number" name="prev"/><br/><br/>
            present reading:<input type="number" name="pres"/><br/><br/>
            <input type="submit">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
               $id=$_POST["id"];
               $name=$_POST["name"];
                $prev=$_POST["prev"];
                $pres=$_POST["pres"];
                $units=$pres-$prev;
                echo"--------------------------------------------------------------------------------------";
                echo"<h3>Kerala State Electricity Board</h3>";
                echo"<br><br>";
                echo"Consumer ID:".$id."<br>";
                echo"consumer Name:".$name."<br>";
                echo"Units Consumed:".$units."<br>";
                if($units<=100){
                    $amt=$units*3;
                }
                elseif($unit>100&&$units<=200){
                    $amt=$units*4;
                }
                elseif($units>200&&$units<=300){
                    $amt=$units*5;
                }
                else{
                    $amt=$units*6;
                }
                echo"<h4>Total Rs:".($amt)."</h4><br>";
                echo"--------------------------------------------------------------------------------------";
            }
            ?>



        </form>
    </body>

</html>
