<!DOCTYPE html>


<head>

</head>

<body>

    <?
    session_start();

    $p_id = $_SESSION["plan_id"];

    include_once './includes/dbcon.inc.php';

    if (isset($_POST["day"])) {




        $day = $_POST["day"];
        $plan_id = $p_id; //$_POST["plan_id"];
        $cal = $_POST["cal"];


        echo "<br>";
        echo $ex_id;
        echo "<br>";
        echo "pid ";
        echo $plan_id;




        $sql = "INSERT INTO planned_intake VALUES (:P_ID, :DAY_ID, :cal_A)";
        $stid = oci_parse($con, $sql);
        oci_bind_by_name($stid, ":P_ID", $plan_id);
        oci_bind_by_name($stid, ":DAY_ID", $day);
        oci_bind_by_name($stid, ":cal_A", $cal);

        oci_execute($stid);
        oci_commit($con);
    } else {
        echo "no";
    }

    ?>

    <h1>Add New Excercise to Plan</h1>
    <form method="POST">

        <label>Select Day</label>
        <select name="day" required="required">
            <option value="MON">Monday</option>
            <option value="TUE">Tuesday</option>
            <option value="WED">Wednesday</option>
            <option value="THU">Thursday</option>
            <option value="FRI">Friday</option>
            <option value="SAT">Saturday</option>
            <option value="SUN">Sunday</option>
        </select>

        <br>

        <?

        $querA = "SELECT exercise_name, ex_id FROM exercise";
        $stid = oci_parse($con, $querA);
        $ex = oci_execute($stid);

        ?>


        <br>
        <label>Calories</label> <input type="text" name="cal"> <br>
        <input type="hidden" value="<? $_SESSION["nplan_id"] ?>" name="plan_id">
        <button type="submit">Add</button>

    </form>


    <br>
    <br>

    <?php
    if (true) {



        $query = "SELECT day_id, calorie_assigned FROM planned_intake WHERE plan_id = :p_id";


        $stid = oci_parse($con, $query);

        if (!$stid) {
            $e = oci_error($conn);  // For oci_parse errors pass the connection handle
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }

        echo oci_bind_by_name($stid, ":p_id", $p_id);
    } else {

        echo "no";
        header("location: ./plan_s.php");
        exit;
    }

    if (!$stid) {
        $e = oci_error($conn);  // For oci_parse errors pass the connection handle
        trigger_error(htmlentities($e['message']), E_USER_ERROR);
    }
    //oci_execute($stid);

    ?>
    <br>

    <input disabled type="text" name="excercise" value="Day">
    <input disabled type="text" name="b_rate" value="Planned Calories Intake">
    <br>

    <?
    oci_execute($stid);
    while ($row = oci_fetch_array($stid, OCI_BOTH)) {
    ?>

        <input disabled type="text" name="order_num" value=<? echo $row[0]; ?>>
        <input disabled type="text" name="excercise" value=<? echo $row[1]; ?>>


        <br>


    <?
    }
    ?>

    <form action="./landing_page.php">
        <button>Go to Home</button>
    </form>



</body>

</html>