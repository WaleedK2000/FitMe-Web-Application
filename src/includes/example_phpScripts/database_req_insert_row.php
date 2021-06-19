<?php
// No closing tag for php scrips required
// Takes input from previous form. Inserts data into dept table
//below condition checks if the used moved to this page using a submitted form. if not the script doesnt execute
if (isset($_POST["Login"])) {
    include_once 'dbcon.inc.php';



    $pas = $_POST["pass"];



    $id = $_POST["userid"];
    $pas = $_POST["pass"];
    //:dnum_bv act as placeholders. To create a placeholder use :your_var_name
    $query = "INSERT INTO dept (deptno,dname,loc) VALUES(:dnum_bv,:dname_bv,:loc_bv)";

    $stid = oci_parse($con, $query);

    if (!$stid) {
        $e = oci_error($conn);  // For oci_parse errors pass the connection handle
        trigger_error(htmlentities($e['message']), E_USER_ERROR);
    }
    //following functions used to replace/bind placeholders in $query. It joins php variable with the placeholder defined in the above query.
    // You can change the value of variable even after binding and it would update in query 
    echo oci_bind_by_name($stid, ":dnum_bv", $id);
    echo oci_bind_by_name($stid, ":dname_bv", $pas);
    echo oci_bind_by_name($stid, ":loc_bv", $pas_n);
    //execute query
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
