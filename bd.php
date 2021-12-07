<?php
 
    $conn = mysqli_connect("localhost", "root", "", "calc");
    $cursor = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($cursor);
    echo(mysqli_error($conn));
    //var_dump($result);
    mysqli_close($conn);  
?>