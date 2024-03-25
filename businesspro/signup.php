<?php
    include("includes/header.php");
    include("includes/navbar.php");

    ?>
        <main>
            <div class="signupContainer">
                <form action="verify" method="post" name="formdeets" enctype="multipart/form-data">
                    <div class="formdeets" >
                        <h3>Get started, Goepreneur</h3>
                        <p>Set up your account in minutes.</p>

                        <div class="theform">
                            <div>
                                <label for="">Business Name</label>
                                <input type="text" name="business_name" required>
                            </div>

                            <div>
                                <label for="">Business Category</label>
                                <input type="text" name="business_cate" required>
                            </div>

                            <div>
                                <label for="">Full Name</label>
                                <input type="text" name="business_rep" required>
                            </div>

                            <div>
                                <label for="">Email</label>
                                <input type="email" name="rep_email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required>
                            </div>

                            <div>
                                <label for="">Contact Number</label>
                                <input type="tel" name="rep_number" required>
                            </div>
                        </div>

                        <h3>Upload a Logo</h3>

                        <div class="uploadArea">
                            <!-- <label for="">Business Representative Contact Number</label> -->
                            <img id="blah" src="" alt="" />
                            <input type='file' name="business_logo" onchange="readURL(this);" />
                        </div>
                    </div>

                    <div class="formImg formdeets">
                        <button style="border:none; background: none;" name="signup" type="submit"><img src="assets/images/img7.png" id="nextform" alt=""></button>
                    </div>
                </form>
            </div>
        </main>
    <?php
?>

<script src="assets/js/main.js"></script>
<script src="assets/js/post.js"></script>