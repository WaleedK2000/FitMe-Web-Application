
<?php
// so far this script only prints user email from database. This will redirect to landing page <br>
if (isset($_POST["Login"])) {
    include_once 'dbcon.inc.php';
    $pas = $_POST["pass"];


    $id = $_POST["userid"];
    echo "id "  . $id . "<br>";
    $pas = $_POST["pass"];

    $query = "SELECT user_email FROM login_d WHERE user_login = :userid_bv";

    $query = "SELECT * FROM user_details WHERE user_id = :bv_login AND user_password = :bv_pass";

    $stid = oci_parse($con, $query);

    if (!$stid) {
        $e = oci_error($conn);  // For oci_parse errors pass the connection handle
        trigger_error(htmlentities($e['message']), E_USER_ERROR);
    }

    echo oci_bind_by_name($stid, ":bv_login", $id);
    echo oci_bind_by_name($stid, ":bv_pass", $pas);
    $ex = oci_execute($stid);



    //echo oci_fetch_all($stid, $row);
    $rr = oci_fetch_row($stid);

    if ($rr) {

        echo $rr[4];

        session_start();
        $_SESSION["user_name"] = $rr[0];
        $_SESSION["f_name"] = $rr[2];
        $_SESSION["l_name"] = $rr[3];
        $_SESSION["email"] = $rr[4];
        $_SESSION["telnum"] = $rr[5];
        $_SESSION["dob"] = $rr[6];
        $_SESSION["weight"] = $rr[8];
        $_SESSION["height"] = $rr[7];
        $_SESSION["plan_id"] = $rr[9];

        header("location: ../landing_page.php");
    } else {
        echo '<h1>NOT FOUND!</h1> <br>';
    }


    //echo $rr;
    echo $id;
    echo " ";
    echo $pas;
    echo "<br>";

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
