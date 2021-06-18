<!DOCTYPE html>







<body>

    <?php

    include_once './includes/dbcon.inc.php';

    if (isset($_GET["uid"])) {
        echo "here";
        $uid = $_GET["uid"];
        $query = "SELECT plan_id, user_id FROM plan WHERE user_id = :userid";
        $stid = oci_parse($con, $query);
        oci_bind_by_name($stid, ":userid", $uid);
    } else {
        $query = "SELECT plan_id, user_id FROM plan";
        $stid = oci_parse($con, $query);
    }



    if (!$stid) {
        $e = oci_error($conn);  // For oci_parse errors pass the connection handle
        trigger_error(htmlentities($e['message']), E_USER_ERROR);
    }
    oci_execute($stid);

    ?>

    <h1>View Plans</h1>

    <form method="$_GET">
        <input type="text" name="uid" placeholder="Search by User_id">
        <button type="submit" value="user_id">Search</button>

    </form>


    <br>
    <br>

    <form>

        <?
        while ($row = oci_fetch_array($stid, OCI_BOTH)) {
        ?>

            <input disabled type="text" name="name" value=<? echo $row[0]; ?>>
            <input disabled type="text" name="scale" value=<? echo $row[1]; ?>>
            <button type="submit" value="plan_id"> view </button>

        <?
        }
        ?>
    </form>

</body>

</html>