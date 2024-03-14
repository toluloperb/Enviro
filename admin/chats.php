<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("includes/sidebar.php");
    include("../config/dbcon.php");

    ?>
            <div class="content">
                <button id="open_sidebar"><img src="assets/images/open_btn.png" alt=""></button>

                <div class="then">
                    <div class="sessions">
                        <h3>Live Chat Sessions</h3>
                        <div class="allsessions">
                            <?php
                                $select_sessions = "SELECT * FROM user_sessions WHERE session_status = 'New'";
                                $select_sessions_run = mysqli_query($con, $select_sessions);
                                
                                if(mysqli_num_rows($select_sessions_run) > 0)
                                {
                                    foreach($select_sessions_run as $session)
                                    {
                                        ?>
                                            <input type="text" id="session_id" value="<?= $session["session_id"] ?>" hidden>
                                            <a href="chathistory?session=<?= $session["session_id"] ?>"><p><?= $session["session_id"] ?></p></a>
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
                        <div class="tools">

                        </div>
                    </div>
                    <div class="sessions chat_sessions">
                        <h3>Chat History</h3>
                        <div class="chat" id="chat_history">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php

    include("includes/footer.php");
?>