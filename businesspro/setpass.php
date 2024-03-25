<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");

    if(isset($_POST["verify"]))
    {
        $otp = $_POST["otp"];
        $rep_email = $_POST["rep_email"];
        
        $verify = "SELECT * FROM users WHERE rep_email = '$rep_email' ";
        $verify_run = mysqli_query($con, $verify);

        if($verify_run)
        {
            foreach($verify_run as $data)
            {
                $ex_otp = $data["otp"];

                if($otp == $ex_otp)
                {
                    ?>
                        <main>
                            <div class="signupContainer">
                                <form action="functions/dashboardfunc" method="post" name="formdeets" enctype="multipart/form-data">
                                    <div class="formdeets" >
                                        <h3>Set a new password</h3>
                                        <br>

                                        <div class="theform">
                                            <input type="text" name="rep_email" value="<?= $rep_email ?>" hidden>
                                            <div>
                                                <label for="">New Password</label>
                                                <input type="text" name="password" required>
                                            </div>

                                            <div>
                                                <label for="">Confirm New Password</label>
                                                <input type="text" name="cpassword" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="formImg formdeets">
                                        <button style="border:none; background: none;" name="setpass" type="submit"><img src="assets/images/img7.png" id="nextform" alt=""></button>
                                    </div>
                                </form>
                            </div>
                        </main>
                    <?php
                }
                else
                {
                    echo "no";
                }
            }
        }
        else
        {
            echo "no";
        }
    }
?>