<!DOCTYPE html>


<head>
    <link rel="stylesheet" href="ss/form.css">

</head>




<body>

    <?php

    session_start();

    echo $_SESSION["user_name"];


    echo "in";
    $s = $_POST["sub"];

    if (isset($_POST["view_plan"])) {

        if (isset($_SESSION["plan_id"])) {

            $nam = "location: ./plan_det.php?plan_set=" . $_SESSION["plan_id"];

            echo $nam;

            header($nam);
            //view plan
        } else {
            echo "No plan selected <br>";
        }
    } else if (isset($_POST["daily_log"])) {
        header("location: ./daily_log.php");

        //header("location: ./signup.php");
    } else if (isset($_POST["sw_pln"])) {

        header("location: ./plan_sw_exit.php");


        //header("location: ./signup.php");
    } else if (isset($_POST["n_pln"])) {
        header("location: ./includes/plan.inc.php");
    } else if (isset($_POST["cal_con"])) {
        header("location: ./rep_view_all_exlog.php");
    } else if (isset($_POST["abc"])) {
        header("location: ./rep_bmi.php");
    }


    ?>

    <input disabled type="text" name="uid" value=<? echo $_SESSION["email"] ?>>


    <form method="POST">

        <button name="view_plan" val="a">View Your Plan</button> <br>
        <button name="daily_log" val="b">Enter Daily Log</button> <br>
        <button name="sw_pln" val="c">Switch to Another Existing Plan</button> <br>
        <button name="n_pln" val="d">Create and Switch To New Plan</button> <br>
        <button name="cal_con" val="d">View Calories Consumed</button> <br>
        <button name="abc" val="d">View BMI Report</button> <br>

    </form>

    <h2>Todays Planned Exercises</h2> <br>

    <input disabled type="text" name="order" value="">
    <input disabled type="text" name="excercise" value="Excercise">
    <input disabled type="text" name="b_rate" value="Calories Burn Rate">
    <input disabled type="text" name="burned" value="Calories Burned">
    <input disabled type="text" name="burned" value="Duration (seconds)">

    <input disabled type="text" name="eq_name" value="Equipment Name">

    <?
    include_once './includes/dbcon.inc.php';
    echo "<br>";

    $plan = $_SESSION["plan_id"];
    $query = "SELECT TO_CHAR(SYSDATE,'DY') FROM DUAL";
    $stid = oci_parse($con, $query);
    $ex = oci_execute($stid);

    $rr = oci_fetch_row($stid);
    $day = $rr[0];

    $add = "SELECT exercise.exercise_NAME, weekly_exercise_plan.duration, exercise.cal_burn_rate, ( weekly_exercise_plan.duration *  exercise.cal_burn_rate), weekly_exercise_plan.order_allocated, equipment.eq_name
    FROM weekly_exercise_plan
    LEFT OUTER JOIN exercise ON exercise.ex_id  = weekly_exercise_plan.exercise_id
    LEFT OUTER JOIN equipment ON exercise.equipment_id = equipment.eq_id
    WHERE plan_id = :p_id AND day_id = :day 
    ORDER BY weekly_exercise_plan.order_allocated";
    $stid = oci_parse($con, $add);

    //$day = 'MON';
    oci_bind_by_name($stid, ":day", $day);
    oci_bind_by_name($stid, ":p_id", $plan);

    oci_execute($stid);
    ?>
    <br>

    <?

    while ($row = oci_fetch_array($stid, OCI_BOTH)) {
    ?>

        <input disabled type="text" name="plan" value=<? echo $row[4]; ?>>
        <input disabled type="text" name="scale" value=<? echo $row[0]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[2]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[3]; ?>>
        <input disabled type="text" name="burned" value=<? echo $row[1]; ?>>

        <input disabled type="text" name="g" value=<? echo $row[5]; ?>>

        <br>

    <?
    }

    echo "Your Plan ID: ";
    echo $_SESSION["plan_id"];
    ?>

    <h2>
        Todays nutritional intake
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