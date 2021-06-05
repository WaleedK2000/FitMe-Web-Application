<!DOCTYPE html>


<head>
    <link rel="stylesheet" href="ss/form.css">

</head>

<?php

session_start();

?>


<body>


    <input disabled type="text" name="uid" value=<? echo $_SESSION["email"] ?>>
</body>

</html>