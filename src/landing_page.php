<!DOCTYPE html>


<head>
    <link rel="stylesheet" href="ss/form.css">

</head>




<body>

    <?php

    session_start();


    echo "in";
    $s = $_POST["sub"];

    if (isset($_POST["view_plan"])) {

        if (isset($_SESSION["plan_id"])) {
            header("location: ./signup.php");
            //view plan
        } else {
            echo "No plan selected <br>";
        }
    } else if (isset($_POST["daily_log"])) {
        //header("location: ./signup.php");
    } else if (isset($_POST["sw_pln"])) {
        header("location: ./signup.php");
    } else if (isset($_POST["n_pln"])) {
        header("location: ./includes/plan.inc.php");
    }


    ?>

    <form method="POST">

        <button name="view_plan" val="a">View Your Plan</button> <br>
        <button name="daily_log" val="b">Enter Daily Log</button> <br>
        <button name="sw_pln" val="c">Switch to Another Existing Plan</button> <br>
        <button name="n_pln" val="d">Create and Switch To New Plan</button> <br>




    </form>


    <input disabled type="text" name="uid" value=<? echo $_SESSION["email"] ?>>
</body>

</html>