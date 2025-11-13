    <?php
    echo"<br>Sorting array</br>";
    echo"<br>=====================</br>";
    $stud=array("Nidhi","Sreelakshmi","Agna","Riya","Christy");
    echo"Displaying array using print_r():";
    print_r($stud);
    echo"</br>Array in ascending order: </br>";
    asort($stud);
    print_r($stud);
    echo"<br>Array in descending order: </br>";
    arsort($stud);
    print_r($stud);
    ?>