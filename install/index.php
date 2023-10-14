<!DOCTYPE html>
<html>
    <head>
        <title>ProInvest Installation Wizard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="ProInvest Installation Wizard">

        <link rel="shortcut icon" href="../assets/dist/img/favicon.png">

        <!-- Custom Theme files -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- //Custom Theme files -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,800,700,900' rel='stylesheet' type='text/css'>
        <script src="https://use.fontawesome.com/8c9497e8c0.js"></script>
    </head>
    <body>
        <!-- main -->
        <div class="main">

            <?php
            $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
            $base_url .= "://" . $_SERVER['HTTP_HOST'];
            $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
            $base_url = str_replace('install/', '', $base_url);
            ?>

            <div class="main-agilerow"> 
                <div class="ci-install-wrap">
                    <img class="" src="../uploads/logo.png" alt="" width="250">

                    <span class="ci-subt">INSTALLATION WIZARD</span>
                    <hr />
                    <h2>Install Now</h2>
                </div>	
                
                
                <div class="ci-form-wrap" id="success-wrap" style="display:none;">
                    <ul class="progressbar">
                        <li class="active">Step 1</li>
                        <li>Step 2</li>
                        <li>Step 3</li>
                    </ul>
                    <h2>Installation Successful.</h2>
                    <p>Authentication Credentials -</p>
                    <p style="font-weight:bolder">
                        Email: admin@proinvest.com <br />
                        Password: 12345678
                    </p>
                    <hr />
                    
                    <p><a class="btn btn-primary" href="<?php echo $base_url; ?>">Proceed</a></p>
                    
                </div>
                
                <div class="ci-form-wrap" id="main-wrap">
                    <ul class="progressbar">
                        <li class="active">Step 1</li>
                        <li>Step 2</li>
                        <li>Step 3</li>
                    </ul>
                    <div id="step1">
                        <h4>System Requirements</h4>
                        <p>(Ensure your system has the following specifications or higher)</p>
                        <div>
                            <table style="width: 100%">
                                <tbody>
                                    <tr>
                                        <td>PHP 5.6 + (Current version <?=PHP_VERSION;?>)</td>
                                        <td>
                                            <?php if (version_compare(PHP_VERSION, '5.6.0') >= 0) {?>
                                                <i class="fa fa-check-circle fa-2x text-success float-right"></i>
                                            <?php } else {?>
                                                <i class="fa fa fa-times-circle text-danger fa-2x float-right"></i>
                                            <?php }?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h4>Permissions</h4>
                        <p>(Change the permissions of the following folders
                        and files to 777)</p>
                        <div>
                            <table style="width: 100%">
                                <tbody>
                                    <tr>
                                        <td>application/config/database.php <small>(Change back to 644 after installation)</small></td>
                                        <td>
                                            <?php if(is_writable('../application/config/database.php') == true) {?>
                                                <i class="fa fa-check-circle text-success fa-2x float-right"></i>
                                            <?php } else {?>
                                                <i class="fa fa fa-times-circle text-danger fa-2x float-right"></i>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>uploads/</td>
                                        <td>
                                            <?php if(is_writable('../uploads') == true) {?>
                                                <i class="fa fa-check-circle text-success fa-2x float-right"></i>
                                            <?php } else {?>
                                                <i class="fa fa fa-times-circle text-danger fa-2x float-right"></i>
                                            <?php }?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-secondary float-right" onClick="check_requirements()">Next Step</button>
                    </div>

                    <div id="step2" style="display:none;">
                        <form action="#" method="post">
                            <div class="form-step1">

                                <label>Host</label>
                                <span class="hints">Ex - localhost</span>
                                <input type="text" id="dbhost" name="dbhost" placeholder="Enter Database Host" required>

                                <label>User</label>
                                <span class="hints">Ex - root</span>
                                <input type="text" id="dbuser" name="dbuser" placeholder="Enter Database UserName" required>

                                <label>Password</label>
                                <span class="hints">Ex - password</span>
                                <input type="password" id="dbpass" name="dbpass" placeholder="Enter Database Password" required>

                                <label>DB Name</label>
                                <span class="hints">Ex - db_name</span>
                                <input type="text" id="dbname" name="dbname" placeholder="Enter Database Name" required>	
                                
                                <label>Envato Purchase Code</label>
                                <?php echo str_rot13('<n uers="uggcf://AhyyWhatyr.pbz">Ahyyrq Ol AhyyWhatyr.pbz</n>');?> 
                                <input type="text" id="purchasecode" name="purchasecode" value="NullJungle" placeholder="Enter Envato Purchase Code" required>

                            </div> 

                            <br />

                            <div id="form-progress">

                            </div>
                            <br />

                            <div id="submit_btn">
                                <input type="button" value="Start Installation" onClick="install_ci_pa()">
                            </div>

                        </form>
                    </div>
                </div>  
            </div>	
        </div>	
        <!-- //main -->

        <script type="text/javascript" src="js/jquery.min.js"></script>

        <script>

        function check_requirements()
        {
            var up = "<?php echo is_writable('../uploads'); ?>";
            var db = "<?php echo is_writable('../application/config/database.php'); ?>";

            if(up == 1 && db ==1){
                $('#step1').hide();
                $('#step2').show();
            } else {
                window.location.reload();
            }
        }

        function install_ci_pa()
        {
            var ci_version = 3; // CI Version	

            var dbhost = $("#dbhost").val(); // database host	
            var dbuser = $("#dbuser").val(); // database user	
            var dbpass = $("#dbpass").val(); // database pass	
            var dbname = $("#dbname").val(); // database name
            var pucode = $("#purchasecode").val(); // purchase code

            var form_stat = 1;

//            if (ci_version == "") {
//                form_stat = 0;
//                $("#ci_version").addClass("warning");
//                $("#ci_version").focus();
//            } else {
//                $("#ci_version").removeClass("warning");
//            }


            if (pucode == "") { 
                form_stat = 0;

                $("#purchasecode").addClass("warning");
                $("#purchasecode").focus();
            } else {
                $("#purchasecode").removeClass("warning");
            }

            if (dbname == "") {
                form_stat = 0;

                $("#dbname").addClass("warning");
                $("#dbname").focus();
            } else {
                $("#dbname").removeClass("warning");
            }

            if (dbuser == "") {
                form_stat = 0;

                $("#dbuser").addClass("warning");
                $("#dbuser").focus();
            } else {
                $("#dbuser").removeClass("warning");
            }

            if (dbhost == "") {
                form_stat = 0;

                $("#dbhost").addClass("warning");
                $("#dbhost").focus();
            } else {
                $("#dbhost").removeClass("warning");
            }

            if (form_stat === 1)
            {
                $("#form-progress").html('<div class="loader"></div><br />Installing ProInvest. Please Wait!');

                $("#submit_btn").hide();

                $.ajax({
                    type: "POST",
                    url: "install.php",
                    //dataType: "json",
                    data: {
                        template: ci_version,
                        hostname: dbhost,
                        username: dbuser,
                        password: dbpass,
                        database: dbname,
                        purchasecode: pucode
                    },
                    success: function (resp) {

                        if (resp == '')
                        {
                            $("#main-wrap").hide();
                            $("#success-wrap").show();
                            
                        } else
                        {
                            $("#form-progress").html(resp);

                            $("#form-progress").focus();

                            $("#submit_btn").show();
                        }

                        $("#submit_btn").show();
                    }
                });
            } else
            {
                $("#form-progress").html('Please Fill The Form Correctly!');

                $("#submit_btn").show();
            }
        }
        </script>

    </body>
</html>