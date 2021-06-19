<!DOCTYPE html>


<head>
    <link rel="stylesheet" href="ss/form.css">

</head>




<body>

    <?

    include_once './includes/dbcon.inc.php';


    session_start();
    $query = "SELECT TO_CHAR(SYSDATE,'DY') FROM DUAL";
    $stid = oci_parse($con, $query);
    $ex = oci_execute($stid);

    $rr = oci_fetch_row($stid);
    $day = $rr[0];
    $username = $_SESSION["user_name"];
    $planid = $_SESSION["plan_id"];


    if (isset($_POST["wt"])) {
        $wt = $_POST["wt"];
        $intk = $_POST["n_intk"];
        $qur = "INSERT INTO daily_log (user_id, weight, intake) VALUES ( '" . $username . "'," . $wt . "," . $intk . ")";
        $stid = oci_parse($con, $qur);
        $ex = oci_execute($stid);
        oci_commit($con);

        header("location: ./daily_log_ex.php");
    }




    ?>
    <h1>Daily Logs</h1>
    <form method="POST">
        <label>Todays Nutrition Intake</label>
        <input type="text" name="n_intk">
        <br>
        <label>Todays Weight</label>
        <input type="text" name="wt">

        <button type="submit"> Submit </button>

    </form>




    <h2>
        Todays Planned nutritional intake
    </h2>

    <?

    $query = "SELECT calorie_assigned FROM planned_intake WHERE plan_id = :p_id AND day_id = :day";
    $stida = oci_parse($con, $add);

    oci_bind_by_name($stida, ":day", $day);
    oci_bind_by_name($stida, ":p_id", $plan);
    oci_execute($stida);



    while ($rowa = oci_fetch_array($stid, OCI_BOTH)) {
    ?>

        <input disabled type="text" name="plan" value=<? echo $rowa[0]; ?>>

    <?
    }
    ?>





</body>

</html>