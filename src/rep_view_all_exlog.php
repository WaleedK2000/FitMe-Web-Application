<!DOCTYPE html>


<head>
    <link rel="stylesheet" href="ss/form.css">

</head>




<body>
    <h1>Daily Logs Exercise</h1>
    <?

    include_once './includes/dbcon.inc.php';


    session_start();
    $username = $_SESSION["user_name"];
    $query = "SELECT SUM(intake) FROM daily_log WHERE user_id = :useid";

    $stid = oci_parse($con, $query);
    oci_bind_by_name($stid, ":useid", $username);
    $ex = oci_execute($stid);

    $row = oci_fetch_array($stid, OCI_BOTH);


    ?>

    <label>Calories Consumed</label>
    <input disabled type="text" name="excercise" value=<? echo $row[0]; ?>>
    <label>Calories Burned</label>



</body>

</html>