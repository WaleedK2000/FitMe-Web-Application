<!DOCTYPE html>


<head>

</head>

<body>

    <h1>View Plan</h1>

    <?php

    include_once './includes/dbcon.inc.php';

    if (isset($_GET["plan_set"])) {

        $p_id = $_GET["plan_set"];

        $query = "select exercise.exercise_NAME, weekly_exercise_plan.duration, exercise.cal_burn_rate, ( weekly_exercise_plan.duration *  exercise.cal_burn_rate), weekly_exercise_plan.order_allocated, equipment.eq_name
        FROM weekly_exercise_plan
        LEFT OUTER JOIN exercise ON exercise.ex_id  = weekly_exercise_plan.exercise_id
        LEFT OUTER JOIN equipment ON exercise.equipment_id = equipment.eq_id
        WHERE plan_id = :p_id AND day_id = :day 
        ORDER BY weekly_exercise_plan.order_allocated";

        //$query = "SELECT day_id, exercise_id, order_allocated, duration FROM weekly_exercise_plan WHERE plan_id = :p_id AND day_id = :day ORDER BY order_allocated";
        $stid = oci_parse($con, $query);

        if (!$stid) {
            $e = oci_error($conn);  // For oci_parse errors pass the connection handle
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }
        $day = 'MON';
        echo oci_bind_by_name($stid, ":p_id", $p_id);
        echo oci_bind_by_name($stid, ":day", $day);
    } else {

        echo "no";
        header("location: ./plan_s.php");
        exit;
    }

    if (!$stid) {
        $e = oci_error($conn);  // For oci_parse errors pass the connection handle
        trigger_error(htmlentities($e['message']), E_USER_ERROR);
    }
    oci_execute($stid);

    ?>
    <br>
    <input disabled type="text" name="order" value="">
    <input disabled type="text" name="excercise" value="Excercise">
    <input disabled type="text" name="b_rate" value="Calories Burn Rate">
    <input disabled type="text" name="burned" value="Calories Burned">
    <input disabled type="text" name="eq_name" value="Equipment Name">

    <h2>Monday</h2>

    <?
    oci_execute($stid);
    while ($row = oci_fetch_array($stid, OCI_BOTH)) {
    ?>

        <input disabled type="text" name="order_num" value=<? echo $row[4]; ?>>
        <input disabled type="text" name="excercise" value=<? echo $row[0]; ?>>
        <input disabled type="text" name="b_rate" value=<? echo $row[2]; ?>>
        <input disabled type="text" name="burned" value=<? echo $row[3]; ?>>
        <input disabled type="text" name="eq_name" value=<? echo $row[5]; ?>>

        <br>


    <?
    }
    ?>

    <h2>Tuesday</h2>

    <?
    $day = 'TUE';
    oci_execute($stid);
    while ($row = oci_fetch_array($stid, OCI_BOTH)) {
    ?>

        <input disabled type="text" name="plan" value=<? echo $row[4]; ?>>
        <input disabled type="text" name="scale" value=<? echo $row[0]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[2]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[3]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[5]; ?>>

        <br>

    <?
    }
    ?>

    <h2>Wednesday</h2>

    <?
    $day = 'WED';
    oci_execute($stid);
    while ($row = oci_fetch_array($stid, OCI_BOTH)) {
    ?>

        <input disabled type="text" name="plan" value=<? echo $row[4]; ?>>
        <input disabled type="text" name="scale" value=<? echo $row[0]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[2]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[3]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[5]; ?>>

        <br>

    <?
    }
    ?>

    <h2>Thursday</h2>

    <?
    $day = 'THU';
    oci_execute($stid);
    while ($row = oci_fetch_array($stid, OCI_BOTH)) {
    ?>

        <input disabled type="text" name="plan" value=<? echo $row[4]; ?>>
        <input disabled type="text" name="scale" value=<? echo $row[0]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[2]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[3]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[5]; ?>>

        <br>

    <?
    }
    ?>

    <h2>Friday</h2>

    <?
    $day = 'FRI';
    oci_execute($stid);
    while ($row = oci_fetch_array($stid, OCI_BOTH)) {
    ?>

        <input disabled type="text" name="plan" value=<? echo $row[4]; ?>>
        <input disabled type="text" name="scale" value=<? echo $row[0]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[2]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[3]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[5]; ?>>

        <br>

    <?
    }
    ?>

    <h2>Saturday</h2>

    <?
    $day = 'SAT';
    oci_execute($stid);
    while ($row = oci_fetch_array($stid, OCI_BOTH)) {
    ?>

        <input disabled type="text" name="plan" value=<? echo $row[4]; ?>>
        <input disabled type="text" name="scale" value=<? echo $row[0]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[2]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[3]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[5]; ?>>

        <br>

    <?
    }
    ?>

    <h2>Sunday</h2>

    <?
    $day = 'SUN';
    oci_execute($stid);
    while ($row = oci_fetch_array($stid, OCI_BOTH)) {
    ?>

        <input disabled type="text" name="plan" value=<? echo $row[4]; ?>>
        <input disabled type="text" name="scale" value=<? echo $row[0]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[2]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[3]; ?>>
        <input disabled type="text" name="g" value=<? echo $row[5]; ?>>

        <br>

    <?
    }
    ?>

</body>

</html>