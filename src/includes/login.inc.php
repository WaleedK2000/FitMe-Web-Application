// so far this script only prints user email from database. This will redirect to landing page <br>
<?php

if (isset($_POST["Login"])) {
    include_once 'dbcon.inc.php';
    $pas = $_POST["pass"];


    $id = $_POST["userid"];
    echo "id "  . $id . "<br>";
    $pas = $_POST["pass"];

    $query = "SELECT user_email FROM login_d WHERE user_login = :userid_bv";
    $stid = oci_parse($con, $query);

    if (!$stid) {
        $e = oci_error($conn);  // For oci_parse errors pass the connection handle
        trigger_error(htmlentities($e['message']), E_USER_ERROR);
    }

    echo oci_bind_by_name($stid, ":userid_bv", $id);
    $ex = oci_execute($stid);

    $row = oci_fetch_array($stid);
    //$rr = oci_fetch_row($stid);

    //echo $rr;
    echo $row[0];
    echo "<br>";
    if ($ex) {
        echo "yes";
    } else {
        echo "no";
    }
    //header("location: ../landing_pag.php");
} else if (isset($_POST["signup"])) {

    header("location: ../signup.php");
} else {

    header("location: ../login.php");
}


exit;
