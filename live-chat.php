<section id="main">
    <main>
        <?php
            if(isset($_GET["id"]))
            {
                $id = $_GET["id"];
                ?>
                    <div class="stick_livechat" id="stick_livechat">
                        <div class="client_info">
                            <div class="a">
                                <img src="assets/images/chat_icon.png"><p>Hello,</p>
                            </div>
                        </div>
                        <div class="session_area">
                            <div class="chat_history" id="chat_history">
                                <div class="eachchat_cs">
                                    <p>Welcome to Manor Realtors Group (Customer Assistance)</p>
                                </div>
                                <div class="eachchat_cs">
                                    <p>Kindly provide us with your email</p>
                                </div>
                                <?php
                                    $fetchChatHistory = "SELECT * FROM cs_chats WHERE session_id = '$id'";
                                    $fetchChatHistoryRun = mysqli_query($con, $fetchChatHistory);

                                    if(mysqli_num_rows($fetchChatHistoryRun) > 0)
                                    {
                                        foreach($fetchChatHistoryRun as $chat)
                                        {
                                            ?>
                                                <?php
                                                    $cs = $chat["email"];

                                                    if($cs == 'Ten')
                                                    {
                                                        ?>
                                                            <div class="eachchat_cs fetched">
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
                                        }
                                    }
                                ?>
                            </div>
                            <div class="chat_tools">
                                <form method="POST" id="chat_form">
                                    <div>
                                        <input type="text" id="email" name="session_id" value="<?= $id ?>" hidden>
                                        <textarea name="messages" type="text" id="messages" class="chat_tools_input form_data" placeholder="Start Typing..."></textarea>
                                        <button type="button" name="submit" id="submit" class="">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
            }
            else
            {
                ?>
                    <div class="stick_livechat" id="stick_livechat">
                        <div class="client_info">
                            <div class="a">
                                <img src="assets/images/chat_icon.png"><p>Hello,</p>
                            </div>
                        </div>
                        <div class="session_area">
                            <div class="chat_history" id="chat_history">
                                <div class="eachchat_cs">
                                    <p>Welcome to Manor Realtors Group (Customer Assistance)</p>
                                </div>
                                <div class="eachchat_cs">
                                    <p>Kindly provide us with your email</p>
                                </div>
                                <div class="eachchat_cs" style="display:none;">
                                    <p id="feedback" ></p>
                                </div>
                            </div>
                            <div class="chat_tools">
                                <form method="POST" id="chat_form">
                                    <div>
                                        <?php $id = rand(000000, 999999) ?>
                                        <input type="text" id="email" name="session_id" value="<?= $id ?>" hidden>
                                        <textarea name="messages" type="text" id="messages" class="chat_tools_input form_data" placeholder="Start Typing..."></textarea>
                                        <button type="button" name="submit" id="submit" class="">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>
    </main>
</section>

<section id="main2">
    <?php
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];

            ?>
                <div class="livechat" id="livechat_mobile">
                    <div class="closeBtn">
                        <button id="closeChatBtn">x</button>
                    </div>
                    <div class="client_info">
                        <div class="a">
                            <img src="assets/images/chat_icon.png" id="chatIcon"><p>Hello,</p>
                        </div>
                    </div>
                    <div class="session_area">
                        <div class="chat_history" id="chat_history_mobile">
                            <div class="eachchat_cs">
                                <p>Welcome to Manor Realtors Group (Customer Assistance)</p>
                            </div>
                            <div class="eachchat_cs">
                                <p>Kindly provide us with your email</p>
                            </div>
                            <?php
                                $fetchChatHistory = "SELECT * FROM cs_chats WHERE session_id = '$id'";
                                $fetchChatHistoryRun = mysqli_query($con, $fetchChatHistory);

                                if(mysqli_num_rows($fetchChatHistoryRun) > 0)
                                {
                                    foreach($fetchChatHistoryRun as $chat)
                                    {
                                        ?>
                                            <?php
                                                $cs = $chat["email"];

                                                if($cs == 'Ten')
                                                {
                                                    ?>
                                                       
                                                            <p class="clientmsg"><?= $chat["messages"]; ?></p>
                                                     
                                                    <?php
                                                }
                                                else 
                                                {
                                                    ?>
                                                        <div class="fetched" id="fetched">
                                                            <p><?= $chat["messages"]; ?></p>
                                                        </div>
                                                    <?php    
                                                }
                                            ?>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="chat_tools">
                            <form method="POST" id="mobile_chat_form">
                                <div>
                                    <input type="text" id="email" name="session_id" value="<?= $id ?>" hidden>
                                    <textarea name="messages" type="text" id="messages" class="chat_tools_input form_data" placeholder="Start Typing..."></textarea>
                                    <button type="button" name="submit" id="mobile_submit" class="">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
        }
        else
        {
            ?>
                <div class="livechat" id="livechat_mobile">
                    <div class="closeBtn">
                        <button id="closeChatBtn">x</button>
                    </div>
                    <div class="client_info">
                        <div class="a">
                            <img src="assets/images/chat_icon.png" id="chatIcon"><p>Hello,</p>
                        </div>
                    </div>
                    <div class="session_area">
                        <div class="chat_history">
                            <div class="eachchat_cs">
                                <p>Welcome to Manor Realtors Group (Customer Assistance)</p>
                            </div>
                            <div class="eachchat_cs">
                                <p>Kindly provide us with your email</p>
                            </div>
                            <div class="eachchat_cs" style="display:none;">
                                <p id="feedback" ></p>
                            </div>
                        </div>
                        <div class="chat_tools">
                            <form method="POST" id="mobile_chat_form">
                                <div>
                                    <?php $id = rand(000000, 999999) ?>
                                    <input type="text" id="email" name="session_id" value="<?= $id ?>" hidden>
                                    <textarea name="messages" type="text" id="messages" class="chat_tools_input form_data" placeholder="Start Typing..."></textarea>
                                    <button type="button" name="submit" id="mobile_submit" class="">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>

    <div class="mobile_chat_btn" id="mobile_chat_btn">
        <img src="assets/images/chat.png" id="show_chat_info">
    </div>
</section>