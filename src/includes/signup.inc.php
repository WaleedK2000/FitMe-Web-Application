
<?php
// so far this script only prints user email from database. This will redirect to landing page <br>
if (isset($_POST["Login"])) {
    header("location: ../login.php");

    //header("location: ../landing_pag.php");
} else if (isset($_POST["signup"])) {

    //header("location: ../signup.php");

    include_once 'dbcon.inc.php';
    $query = "INSERT INTO user_details (user_id, user_password, first_name, last_name, email, dob, height)
        VALUES(:uidd, :upas, :ufn, :uln, :email, TO_DATE(:dob, 'dd/mm/yyyy'), :ht )";

    $stid = oci_parse($con, $query);

    if (!$stid) {
        $e = oci_error($conn);  // For oci_parse errors pass the connection handle
        trigger_error(htmlentities($e['message']), E_USER_ERROR);
    }

    $username = $_POST["userid"];
    $password = $_POST["pass"];
    $email = $_POST["email"];
    $f_name = $_POST["fname"];
    $l_name = $_POST["lname"];
    $dob = $_POST["b_day"] . '/' . $_POST["b_month"] . '/' . $_POST["b_year"];
    //  $ht = $_POST["us_height"];

    oci_bind_by_name($stid, ":uidd", $username);
    oci_bind_by_name($stid, ":upas", $password);
    oci_bind_by_name($stid, ":ufn", $f_name);
    oci_bind_by_name($stid, ":uln", $l_name);
    oci_bind_by_name($stid, ":email", $email);

    oci_bind_by_name($stid, ":dob", $dob);
    oci_bind_by_name($stid, ":ht", $ht);


    $ex = oci_execute($stid);

    oci_commit($con);

    echo $dob;

    header("location: ../login.php");
} else {
    header("location: ../signup.php");
    //header("location: ../login.php");
}


exit;
