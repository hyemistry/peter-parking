<?php

$conn = mysqli_connect('localhost', 'Park', 'Potato', 'park_up');

     if (!$conn){
        echo 'Connection error' . mysqli_connect_error();
    }

?>