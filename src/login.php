<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="ss/form.css">
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
        <section class=" formLogin formdiv">
            <form action="./includes/login.inc.php" method="POST">

                <h1 class="formh1">Fit-me</h1> <br>

                <div id="over">
                    <img src=" pic/logo.png" height="60px" width="120" alt="logo">
                </div>

                <h1 class="formh2">Sign into your Fit-me account</h1> <br>

                <div class="outerdiv" style="padding-top: 20px;">
                    <div class="innerdiv">
                        <label class="formlabel">Name</label>
                    </div>
                    <div class="innerdiv_label"><input type="text" name="userid"></div>
                </div>

                <div class="outerdiv">
                    <div class="innerdiv">
                        <label class="formlabel">Password</label>
                    </div>
                    <div class="innerdiv_label">
                        <input type="password" name="pass">
                    </div>
                </div>

                <div class="outerdiv">

                </div>
                <div class="outerdiv">

                </div>

                <div class="outerdiv" style="padding-left: 70px;">

                    <div class="innerdiv">
                        <input class="button" name="Login" type="submit" value="Login">
                    </div>
                    <div class="innerdiv">
                        <input class=" button1" name="signup" type="submit" value="Sign-Up">
                    </div>
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