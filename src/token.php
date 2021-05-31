<html>

<title>

</title>

<body>
    <h1>Fit-me</h1>
    <h2>token</h2>

    <form action="db-lab-proj/src/token.php" method="GET">
        <input type="text">st
        <br>
        <input type="submit" value="Register">
    </form>

    <?
    session_start();
    echo $_SESSION["favcolor"];

    ?>

</body>

</html>