# Source Folder

This folder contains the source files for the website. 

#### All PHP script files go into includes folder. With names filename.inc.php

#### ALL CSS files go into the SS folder

#### All other website related files are to be put in this folder

# How to connect to oracle Database

    first in the includes folder create a file named "dbcon.inc.php".

    Add the following code with your oracle details

    ```php
        <?php

            $db_sid =  // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 

        $db_user =    // Oracle username e.g "scott"
        $db_pass =    // Password for user e.g "1234"
        $con = oci_connect($db_user, $db_pass, $db_sid);

        if ($con) {
            echo "Oracle Connection Successful.";
        } else {
            die('Could not connect to Oracle: ');
        }

    ```