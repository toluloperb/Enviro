<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        include("includes/navbar.php");
        include("includes/sidebar.php");
        include("../config/dbcon.php");

        ?>
            <main>
                <section class="contentContainer">
                    <?php
                        if(isset($_SESSION['status']))
                        {
                            $response = $_SESSION['status'];
                            if($response == "Success0.5")
                            {
                                ?>
                                    <div class="alert" id="alert" role="alert" style="background: red;">
                                        <p><i class="fas fa-exclamation-triangle"></i> Email Saved but not sent!</p>
                                    </div>
                                <?php
                                unset($_SESSION['status']);
                            }
                            else if($response == "Success")
                            {
                                ?>
                                    <div class="alert" id="alert" role="alert">
                                        <p><i class="fa fa-check_circle"></i> Successful</p>
                                    </div>
                                <?php
                                unset($_SESSION['status']);
                            }
                            else if($response == "Error")
                            {
                                ?>
                                    <div class="alert" id="alert" role="alert" style="background: red;">
                                        <p>Error</p>
                                    </div>
                                <?php
                                unset($_SESSION['status']);
                            }
                        }
                    ?>
                    <div class="toppings">
                        <h3>My Customers</h3>
                        <div class="toppingsPro" style="display: flex; flex-direction:row;">
                            <button id="addnewCustomer">+ Add New</button>
                            <button id="sendBulkEmail" style="background: red;"><i class="fas fa-mail-bulk"></i> Send Bulk Email</button>
                            <button id="sendBulkSMS" style="background: blue;">Send Bulk SMS</button>
                        </div>
                    </div>

                    <!-- Add New Customer -->
                    <div class="addnewForm" id="addnewForm">
                        <form action="../functions/dashboardfunc" method="post">
                            <button id="closeFormBtn" style="display: none;"><i class="fas fa-times-circle"></i> Close</button>
                            <h3 class="addnewFormTitle">Add New Customer</h3>
                            <div class="inputContainer">
                                <div>
                                    <label for="">Full Names</label>
                                    <input type="text" name="fullname" required>
                                </div>

                                <div>
                                    <label for="">Email</label>
                                    <input type="email" name="email" required>
                                </div>

                                <div>
                                    <label for="">Phone Number</label>
                                    <input type="tel" name="phone" required>
                                </div>

                                <input type="text" name="business_id" value="<?= $_SESSION['auth_user']['user_id'] ?>" hidden required>
                            </div>
                            <button type="submit" name="addCustomer">Add</button>
                        </form>
                    </div>

                    <!-- Send bulk Email -->
                    <div class="addnewForm" id="sendBulkEmailForm">
                        <form action="../functions/dashboardfunc" method="post">
                            <button id="closeEmailFormBtn" style="display: none;"><i class="fas fa-times-circle"></i> Close</button>
                            <h3 class="addnewFormTitle">Send Bulk Email</h3>
                            <!-- Subject -->
                            <div class="inputContainer">
                                <div class="columnType">
                                    <div>
                                        <label for="">Subject</label>
                                        <input type="text" name="subject" required>
                                    </div>

                                    <!-- Recipients -->
                                    <label for="" width="100%" style="margin-left:7px">All Recepients</label>
                                    <div class="inputContainer">
                                        <div style="border-radius: 5px; height: 100px; margin: 0; overflow: auto; padding: 15px; display:flex; flex-direction:row; flex-wrap:wrap; background: #fff">
                                            
                                            
                                            <?php
                                                    $id = $_SESSION['auth_user']['user_id'];
                                                    $select = "SELECT * FROM customers WHERE business_id = '$id' ORDER BY id DESC";
                                                    $select_query = mysqli_query($con, $select);
            
                                                    if(mysqli_num_rows($select_query) > 0)
                                                    {
                                                        foreach($select_query as $cust)
                                                        {
                                                            ?>
                                                                <p style="border-radius: 5px; font-size: 10pt; background: #e8e8e8; padding: 6px 10px; margin: 3px; color: #333;"><?= $cust["email"]; ?></p>
                                                            <?php
                                                        }
                                                    }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sender ID -->
                                <input type="text" name="business_id" value="<?= $_SESSION['auth_user']['user_id'] ?>" hidden required>

                                <!-- Messages -->
                                <div class="inputContainer">
                                    <div>
                                        <label for="">Message</label>
                                        <textarea name="message" id="" rows="8"></textarea>
                                    </div>
                                </div>

                                <?php 
                                    $virtualurl = $_SESSION['auth_user']['business_name'];
                                    $newurl = str_replace(' ', '', $virtualurl);
                                ?>
                                <input hidden type="text" name="sender" value="<?= strtolower($newurl) ?>" readonly required>
                            </div>

                            <button type="submit" style="background:red;" name="bulkEmail">Send</button>
                        </form>
                    </div>

                    <div class="content">
                        <div class="contentlist">
                            <?php
                                $business_id = $_SESSION['auth_user']['user_id'];
                                $select = "SELECT * FROM customers WHERE business_id = '$business_id' ORDER by id DESC";
                                $select_query = mysqli_query($con, $select);

                                if(mysqli_num_rows($select_query) > 0)
                                {
                                    foreach($select_query as $data)
                                    {
                                        ?>
                                            <a href="?id=<?= $data["id"] ?>"><div class="eachRecord">
                                                <p><i class="fa fa-check" style="color: green"></i> <?= $data["fullname"] ?></p>
                                                <?php 
                                                    $date = strtotime($data["date"]); 
                                                    $day = date('l', $date);
                                                    $newdate = date('jS', $date);
                                                    $month = date('F', $date);
                                                    $year = date('Y', $date);
                                                ?>
                                                <p style="font-size: 9pt; margin-top: 4px; margin-left: 20px;"><?= $day ?> <?= $newdate ?>, <?= $month ?> <?= $year ?></p>
                                            </div></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>

                        <div id="d" class="contentlist" style="">
                            <div class="detailsofCust" id="detailsofCust">
                                <?php
                                    if(isset($_GET["id"]))
                                    {
                                        $id = $_GET["id"];
                                        $select = "SELECT * FROM customers WHERE id = '$id' LIMIT 1";
                                        $select_query = mysqli_query($con, $select);

                                        if(mysqli_num_rows($select_query) > 0)
                                        {
                                            foreach($select_query as $cust)
                                            {
                                                ?>
                                                    <h3 style="color: #333">Details</i></h3>
                                                    <br>
                                                    <p style="margin-bottom: 5px">Full Name: <?= $cust["fullname"] ?></p>
                                                    <p style="margin-bottom: 5px">Email: <?= $cust["email"] ?></p>
                                                    <p style="margin-bottom: 5px">Contact Number: <?= $cust["phone"] ?></p>
                                                    <br><br>
                                                    <div class="buttons">
                                                        <button id="sendEmail">Send Email</button>
                                                        <button id="sendSMS" style="background: blue;">Send SMS</button>
                                                        <a href="tel:+<?= $cust["phone"] ?>"><button id="" style="background: green;">Make a Call</button></a>
                                                    </div>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <h3 style="color: #333"><i class="fa fa-close"></i></h3>
                                                <br>
                                                <p>Error</p>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <h3 style="color: #333"><i class="fa fa-server"></i></h3>
                                            <br>
                                            <p>Customer Details will appear here</p>
                                            <p>Click on a customer</p>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <!-- Email Box -->
                        <div class="detailsofCust emailBox" id="emailBox" style="display:none;">
                            <form action="../functions/dashboardfunc" method="post">

                                <button id="specialBtnSingle" style=""><i class="fas fa-times-circle"></i> CLOSE</button>

                                <div>
                                    <label for="">Subject *</label>
                                    <input type="text" name="subject" required>
                                </div>

                                <div>
                                    <label for="">Recepient</label>
                                    <input type="text" name="recepient_email" value="<?= $cust["email"] ?>" readonly required>
                                </div>

                                <div>
                                    <label for="">Message</label>
                                    <textarea name="message" id="" cols="30" rows="10" placeholder="Start typing..."></textarea>
                                </div>

                                <div>
                                    <label for="">Sender</label>
                                    <?php 
                                        $virtualurl = $_SESSION['auth_user']['business_name'];
                                        $newurl = str_replace(' ', '', $virtualurl);
                                    ?>
                                    <input type="text" name="sender" value="<?= strtolower($newurl) ?>" readonly required>
                                </div>

                                <input type="text" name="business_id" value="<?= $_SESSION['auth_user']['user_id'] ?>" hidden required>
                                
                                <div class="buttons">
                                    <button name="sendEmail" style="background: var(--main); margin: 0;">Send <i class="fas fa-paper-plane"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </main>
        <?php

        include("includes/footer.php");
    }
    else
    {
        header("Location: login?error=Login to continue");
        exit();
    }
?>