<?

include_once 'dbcon.inc.php';
$queA = "INSERT INTO plan (created_by) VALUES (:u_id)";
session_start();
$username = $_SESSION["user_name"];

echo "user_id == ";
echo $username;
echo "<br>";

$stid = oci_parse($con, $queA);
echo oci_bind_by_name($stid, ":u_id", $username);
$ex = oci_execute($stid);
oci_commit($con);

$queA = "SELECT plan_seq.currval FROM dual";
$stid = oci_parse($con, $queA);
$ex = oci_execute($stid);

$p_id = oci_fetch_row($stid);
echo "p id";
echo "<br>";
echo $p_id[0];

$planid = $p_id[0];

$que = "UPDATE user_details SET plan_id = :new_p_id WHERE user_id =:user_id";
$stida = oci_parse($con, $que);
oci_bind_by_name($stida, ":new_p_id", $planid);
oci_bind_by_name($stida, ":user_id", $username);
echo $ex = oci_execute($stida);
oci_commit($con);

echo "pid";
echo $planid;

$_SESSION["plan_id"] = $planid;
header("location: ../new_ex_plan.php");
exit;
