<!DOCTYPE html>


<head>
    <link rel="stylesheet" href="ss/form.css">

</head>




<body>
    <h1>Report of BMI and Weight Overtime</h1>

    <input disabled type="text" name="excercise" value="Date">
    <input disabled type="text" name="excercise" value="Weight">
    <input disabled type="text" name="excercise" value="Height">



    <?

    include_once './includes/dbcon.inc.php';


    session_start();
    $username = $_SESSION["user_name"];
    $query = "SELECT daily_log.log_date, daily_log.weight, (daily_log.weight/ user_details.height) 
    FROM daily_log
    INNER JOIN user_details ON daily_log.user_id = user_details.user_id 
    WHERE daily_log.user_id = :useid
    ORDER BY log_date";

    $stid = oci_parse($con, $query);
    oci_bind_by_name($stid, ":useid", $username);
    $ex = oci_execute($stid);




    while ($row = oci_fetch_array($stid, OCI_BOTH)) {

    ?>
        <br>
        <input disabled type="text" name="excercise" value=<? echo $row[0]; ?>>
        <input disabled type="text" name="excercise" value=<? echo $row[1]; ?>>
        <input disabled type="text" name="excercise" value=<? echo $row[2]; ?>>
        <br>
    <?
    }
    ?>


</body>

</html>