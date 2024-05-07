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
                            <h3>Live Chat Sessions</h3>
                            <div class="containerForListings" id="containerForListings">
                                <div class="listings" id="unread">
                                    <?php
                                        $select_sessions = "SELECT * FROM user_sessions WHERE session_status = 'Ended' ORDER BY id DESC";
                                        $select_sessions_run = mysqli_query($con, $select_sessions);
                                        
                                        if(mysqli_num_rows($select_sessions_run) > 0)
                                        {
                                            foreach($select_sessions_run as $session)
                                            {
                                                ?>
                                                    <input type="text" id="session_id" value="<?= $session["session_id"] ?>" hidden>
                                                    <a href="?session=<?= $session["session_id"] ?>"><p><?= $session["session_id"] ?></p></a>
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
                                <div class="emailButtons">
                                    <a href="chats"><button >Unread</button></a>
                                    <a href="readchats"><button >Read</button></a>
                                    <a href="endedchats"><button >Ended</button></a>
                                </div>
                            </div>
                        </div>

                        <?php
                            if(isset($_GET["session"]))
                            {
                                $session_id = $_GET["session"];
                                $update_session_history = "UPDATE user_sessions SET session_status = 'Read' WHERE session_id = '$session_id'";
                                $update_session_history_run = mysqli_query($con, $update_session_history);
                    
                                ?>
                                    <div class="sessions chat_sessions">
                                        <div class="top_top">
                                            <h3>Chat History > <?= $session_id ?></h3>
                                            <form action="../functions/adminFunction.php" method="post" id="session_form_end">
                                                <input type="text" value="<?= $session_id ?>" name="sessionId" hidden>
                                                <button type="submit" name="endSession">End Session</button>
                                            </form>
                                        </div>
                                        <div class="chat" id="chat_history">
                                            <div class="eachchat_cs">
                                                <p>Welcome to Manor Realtors Group (Customer Assistance)</p>
                                            </div>
                                            <div class="eachchat_cs">
                                                <p>Kindly provide us with your email</p>
                                            </div>
                                            <?php
                                                $fetchChatHistory = "SELECT * FROM cs_chats WHERE session_id = '$session_id'";
                                                $fetchChatHistoryRun = mysqli_query($con, $fetchChatHistory);

                                                if(mysqli_num_rows($fetchChatHistoryRun) > 0)
                                                {
                                                    foreach($fetchChatHistoryRun as $chat)
                                                    {
                                                        ?>
                                                            <?php
                                                                $cs = $chat["email"];

                                                                if($cs == 'Admin')
                                                                {
                                                                    ?>
                                                                        <div class="admin_fetched_desktop">
                                                                            <p><?= $chat["messages"]; ?></p>
                                                                        </div>
                                                                    <?php
                                                                }
                                                                else 
                                                                {
                                                                    ?>
                                                                        <div class="fetched_desktop">
                                                                            <p><?= $chat["messages"]; ?></p>
                                                                        </div>
                                                                    <?php    
                                                                }
                                                            ?>

                                                            <?php
                                                                
                                                            ?>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <div class="chat_tools">
                                            <form method="POST" id="chat_form">
                                                <div>
                                                    <input type="text" id="email" name="session_id" value="<?= $session_id ?>" hidden>
                                                    <textarea name="messages" type="text" id="messages" class="chat_tools_input form_data" placeholder="Start Typing..."></textarea>
                                                    <button type="button" name="submit" id="reply" class="">Send</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <div class="sessions chat_sessions">
                                        <h3>Chat History</h3>
                                        <div class="chat" id="chat_history">

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