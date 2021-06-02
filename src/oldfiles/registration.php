<html>

<title>

</title>

<body>
    <h1>Fit-me</h1>
    <h2>Registration Form</h2>

    <form action="token.php" method="GET">
        <input type="text" name="f_name">
        <br>
        <input type="submit" value="Register">
    </form>

    <?
    session_start();
    $_SESSION["favcolor"] = "4";

    ?>

</body>

</html>