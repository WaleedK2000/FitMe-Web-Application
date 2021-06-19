<!DOCTYPE html>


<head>

</head>

<body>

    <?php

    session_start();
    $username = $_SESSION["user_name"];
    include_once './includes/dbcon.inc.php';


    if (isset($_POST["plan_set"])) {

        $pid = $_POST["plan_set"];
        $query = "UPDATE user_details SET plan_id = :npid WHERE user_id = :usr";
        $stid = oci_parse($con, $query);
        oci_bind_by_name($stid, ":npid", $pid);
        oci_bind_by_name($stid, ":usr", $username);


        $_SESSION["plan_id"] = $pid;
        oci_execute($stid);

        oci_commit($con);

        header("location: ./landing_page.php");


        exit;
    }


    if (isset($_GET["uid"])) {
        echo "here";
        $uid = $_GET["uid"];
        $query = "SELECT plan_id, created_by FROM plan WHERE created_by = :userid";
        $stid = oci_parse($con, $query);
        oci_bind_by_name($stid, ":userid", $uid);
    } else {
        $query = "SELECT plan_id, created_by FROM plan";
        $stid = oci_parse($con, $query);
    }



    if (!$stid) {
        $e = oci_error($conn);  // For oci_parse errors pass the connection handle
        trigger_error(htmlentities($e['message']), E_USER_ERROR);
    }
    oci_execute($stid);

    ?>

    <h1>View Plans</h1>

    <form method="GET">
        <input type="text" name="uid" placeholder="Search by User_id">
        <button type="submit" value="user_id">Search</button>

    </form>


    <br>
    <br>



    <?
    while ($row = oci_fetch_array($stid, OCI_BOTH)) {
    ?>

        <form method="POST">
            <input disabled type="text" name="acd" value=<? echo $row[0]; ?>>
            <input disabled type="text" name="by_uid" value=<? echo $row[1]; ?>>
            <button type="submit" value=<? echo $row[0] ?> name="plan_set"> select </button>
        </form>

    <?
    }
    ?>


</body>

</html>