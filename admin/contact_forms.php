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

                        <div class="sessions chat_sessions">
                            <h3></h3>
                            <div class="chat read_mail" id="read_mail">

                            </div>
                        </div>
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