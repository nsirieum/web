<?php

    $pages= $_GET['pages'];
    if(isset($pages)){
        include($pages); // LFI
    }else{
        $echo = "Welcome <a href = 'find.php?pages=login.php'> login </a> ";
    }

    
    // $allowed_files = ['login.php', 'showing.php', 'concert_detail.php']\;

    // if (isset($file)) {
        //if (in_array($pages, $allowed_files)) {
            // include($pages);
        //} else {
            // echo "<h3 style='color:red;'>Access Denied: You cannot view this file!</h3>";
        //}
    //}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>nvjvj </h1>
</body>
</html>