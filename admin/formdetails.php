<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        include("includes/navbar.php");
        include("includes/sidebar.php");
        include("../config/dbcon.php");

        ?>
                <div class="content">
                    <button id="open_sidebar"><img src="assets/images/open_btn.png" alt=""></button>
                    <div class="then">  
                        <div class="sessions">
                            <h3>Contact Forms</h3>
                            <div class="containerForListings" id="containerForListings">
                                <div class="listings" id="unread">
                                    <?php
                                        $select_sessions = "SELECT * FROM mail ORDER BY id DESC";
                                        $select_sessions_run = mysqli_query($con, $select_sessions);
                                        
                                        if(mysqli_num_rows($select_sessions_run) > 0)
                                        {
                                            foreach($select_sessions_run as $session)
                                            {
                                                ?>
                                                    <input type="text" value="<?= $session["id"] ?>" hidden>
                                                    <a href="formdetails?id=<?= $session["id"] ?>"><p><?= $session["fname"] ?> <?= $session["lname"] ?></p></a>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <p>No one yet!</p>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <?php
                            if(isset($_GET["id"]))
                            {
                                ?>
                                    <div class="sessions chat_sessions">
                                    <h3 style="margin-left: 15px">Details</h3>
                                    <div class="chat read_mail" id="chat_history">
                                    <?php
                                        $id = $_GET["id"];
                                        $select_sessions_details = "SELECT * FROM mail WHERE id = '$id' ORDER BY id DESC";
                                        $select_sessions_details_run = mysqli_query($con, $select_sessions_details);

                                        if($select_sessions_details_run)
                                        {
                                            foreach ($select_sessions_details_run as $data)
                                            {
                                                ?>
                                                    <p>Full Name : <?= $data["fname"] ?> <?= $data["lname"] ?></p>
                                                    <p>Contact Number : <?= $data["tel"] ?></p>
                                                    <p>Email : <?= $data["email"] ?></p>
                                                    <p>Interested In : <?= $data["services"] ?></p>
                                                    <p>Additional Info : <?= $data["additional_info"] ?></p>
                                                    <br><hr><br>
                                                    <p>Date : <?= $data["date"] ?></p>
                                                    <p>Time : <?= $data["time"] ?></p>
                                                <?php
                                            }
                                        }
                                    ?>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        <?php

        include("includes/footer.php");
    }
    else
    {
        header("Location: login?error=Login to continue");
        exit();
    }
?>