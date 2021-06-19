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


    if (isset($_POST["exercise_name"])) {

        $ex = $_POST["exercise_name"];
        $dur = $_POST["duration"];
        $qa = "INSERT INTO exercise_log (user_id, exercise_id, duration ) VALUES ('" . $username . "'," . $ex . "," . $dur . ")";



        $stid = oci_parse($con, $qa);
        $ex = oci_execute($stid);
        oci_commit($con);
    }

    $stid = oci_parse($con, $query);

    $quer = " SELECT exercise.ex_id,exercise.exercise_name from weekly_exercise_plan
    INNER JOIN exercise ON weekly_exercise_plan.exercise_id = exercise.ex_id
    WHERE weekly_exercise_plan.day_id = :day AND plan_id = :p_id";
    $stid = oci_parse($con, $quer);

    oci_bind_by_name($stid, ":day", $day);
    oci_bind_by_name($stid, ":p_id", $planid);
    $ex = oci_execute($stid);

    echo "plan id" . $planid;

    ?>
    <h1>Daily Logs Exercise</h1>
    <form method="POST">

        <select name="exercise_name">

            <?
            while ($row = oci_fetch_array($stid, OCI_BOTH)) {
            ?>

                <option value="<? echo $row[0] ?>">
                    <? echo $row[1] ?>
                </option>

            <?
            }
            ?>

        </select>
        <br>
        <label>Duration</label>
        <input type="text" name="duration">

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


    <form action="./landing_page.php">
        <button> Go To Home </button>
    </form>


</body>

</html>