<?php
// No closing tag for php scrips required
// Takes input from previous form. Inserts data into dept table
if (isset($_POST["Login"])) {
    include_once 'dbcon.inc.php';



    $pas = $_POST["pass"];

    //$pas_n = $_POST["pass"]; // password_hash($_POST["pass"], PASSWORD_DEFAULT);

    $id = $_POST["userid"];
    $pas = $_POST["pass"];
    //:dnum_bv act as placeholders
    $query = "INSERT INTO dept (deptno,dname,loc) VALUES(:dnum_bv,:dname_bv,:loc_bv)";

    $stid = oci_parse($con, $query);

    if (!$stid) {
        $e = oci_error($conn);  // For oci_parse errors pass the connection handle
        trigger_error(htmlentities($e['message']), E_USER_ERROR);
    }
    //following functions used to replace placeholders in $query
    echo oci_bind_by_name($stid, ":dnum_bv", $id);
    echo oci_bind_by_name($stid, ":dname_bv", $pas);
    echo oci_bind_by_name($stid, ":loc_bv", $pas_n);



    $ex = oci_execute($stid);
    echo $ex;
    if ($ex) {
        echo "yes";
    } else {
        echo "no";
    }
} else if (isset($_POST["signup"])) {




    header("location: ../signup.php");
} else {

    header("location: ../login.php");
}


exit;
