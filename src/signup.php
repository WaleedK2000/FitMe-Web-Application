<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <link rel="stylesheet" href="ss/signup.css">
    <style>
        .center {
            display: block;
            height: 25;
            width: 55;
            box-sizing: border-box;
            display: inline-block;
        }

        .page {
            margin: auto;
            background-color: grey;
        }
    </style>
</head>

<body>
    <div>
        <section class=" formSignup formdiv">
            <form action="./includes/signup.inc.php" method="POST">
                <h1 class="formh1">Fit-me</h1>
                <br>
                <div id="over"> <img src="pic/logo.png" alt="logo" height="60px" width="120">
                </div>
                <div class="outerdiv" style="padding-top: 20px;">
                    <div class="innerdiv"> <label class="formlabel">Username</label> </div>
                    <div class="innerdiv_label"><input name="userid" type="text"></div>
                </div>
                <div class="outerdiv">
                    <div class="innerdiv"> <label class="formlabel">Password</label> </div>
                    <div class="innerdiv_label"> <input name="pass" type="password"> </div>
                </div>
                <div class="outerdiv">
                    <div class="innerdiv"> <label class="formlabel">email</label> </div>
                    <div class="innerdiv_label"> <input name="email" type="text"> </div>
                </div>
                <div class="outerdiv">
                    <div class="innerdiv"> <label class="formlabel">First Name</label>
                    </div>
                    <div class="innerdiv_label"> <input name="fname" type="text"> </div>
                </div>
                <div class="outerdiv">
                    <div class="innerdiv"> <label class="formlabel">Last Name</label> </div>
                    <div class="innerdiv_label"> <input name="lname" type="text"> </div>
                </div>

                <div class="outerdiv">
                    <div class="innerdiv"> <label class="formlabel">Date of Birth</label> </div>
                    <div class="innerdiv_label">
                        <input name="b_day" type="text" style="width:25px;">
                        <input name="b_month" type="text" style="width:25px;">
                        <input name="b_year" type="text" style="width:55px;">
                    </div>
                </div>
                <div class="outerdiv">
                    <div class="innerdiv"> <label class="formlabel">Height</label> </div>
                    <div class="innerdiv_label"> <input name="us_height" type="text" style="width:25px"> <label class="formlabel">c.m</label> </div>
                </div>

                <div class="outerdiv" style="padding-left: 70px;">

                    <div class="innerdiv"> <input class=" button1" name="signup" value="Sign-Up" type="submit"> </div>
                    <div class="innerdiv"> <input class="button" name="Login" value="Login" type="submit"> </div>
                </div>
            </form>
        </section>
        <section>
            <h2>welcome To Fit-me</h2>
            <p>We cant wait for you to enjoy all the latest featuers</p>
        </section>
    </div>
</body>

</html>