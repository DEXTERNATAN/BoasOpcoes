<?php
    $mysqli = new mysqli('mysql07.redehost.com.br', 'Wp274776', 'n$&12OmR','Wp274776');
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>