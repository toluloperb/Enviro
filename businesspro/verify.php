<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");

    if(isset($_POST["signup"]))
    {
        $business_name = $_POST["business_name"];
        $business_cate = $_POST["business_cate"];
        $business_rep = $_POST["business_rep"];
        $rep_email = $_POST["rep_email"];
        $rep_number = $_POST["rep_number"];
        $otp = rand(000000,999999);
        
        $business_logo = $_FILES['business_logo']['name'];

        $Uploadpath = "uploads/";

        $image_ext = pathinfo($business_logo, PATHINFO_EXTENSION);
        $logoname = $business_logo;

        $check_business = "SELECT * FROM users WHERE business_name = '$business_name'";
        $check_business_run = mysqli_query($con, $check_business);

        if(mysqli_num_rows($check_business_run) > 0)
        {
            
        }
        else
        {
            $check_business = "SELECT * FROM users WHERE rep_email = '$rep_email'";
            $check_business_run = mysqli_query($con, $check_business);

            if(mysqli_num_rows($check_business_run) > 0)
            {
                
            }
            else
            {
                $insert = "INSERT into users (business_name,business_cate,business_rep,rep_email,rep_number,otp,business_logo) 
                            VALUES('$business_name','$business_cate','$business_rep','$rep_email','$rep_number','$otp','$logoname')";
                $insert_query = mysqli_query($con, $insert);

                if($insert_query)
                {
                    $move = move_uploaded_file($_FILES['business_logo']['tmp_name'], $Uploadpath.'/'.$logoname);
                }
            }
        }
    }

    ?>
        <main>
            <div class="signupContainer">
                <form action="setpass" method="post" name="formdeets" enctype="multipart/form-data">
                    <div class="formdeets" >
                        <h3>Verify your email, an otp has been sent to your email</h3>

                        <div class="theform">
                            <input type="text" name="rep_email" value="<?= $rep_email ?>" hidden>
                            <div>
                                <label for="">Verification Code</label>
                                <input type="text" name="otp" required>
                            </div>
                        </div>
                    </div>

                    <div class="formImg formdeets">
                        <button style="border:none; background: none;" name="verify" type="submit"><img src="assets/images/img7.png" id="nextform" alt=""></button>
                    </div>
                </form>
            </div>
        </main>
    <?php
?>