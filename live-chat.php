<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];

        ?>
            <div class="chatBody">
                <div class="chatArea">
                    <div class="chat_history livechatHistory" id="chat_history">
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
                                }
                            }
                        ?>
                    </div>

                    <div class="chat_tools livechat_tools">
                        <form method="POST" id="livechatform">
                            <div>
                                <input type="text" id="email" name="session_id" value="<?= $id ?>" hidden>
                                <textarea name="message" type="text" id="messages" class="chat_tools_input form_data" placeholder="Start Typing..."></textarea>
                                <button type="button" name="submit" id="sendChat" class="">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
    }
?>

<script>
    $(function() {
        $('#menu_btn').click(function() {
            document.getElementById('mobile_lists').style.display = 'block';
            document.getElementById('menu_btn_close').style.display = 'block';
            document.getElementById('menu_btn').style.display = 'none';
            document.getElementById('stick_livechat').style.display = 'none';
            document.getElementById('stick_livechat_button').style.display = 'none';
            document.getElementById('stick_livechat_button_close').style.display = 'none';
        })

        $('#menu_btn_close').click(function() {
            document.getElementById('mobile_lists').style.display = 'none';
            document.getElementById('menu_btn_close').style.display = 'none';
            document.getElementById('menu_btn').style.display = 'block';
            document.getElementById('stick_livechat').style.display = 'none';
            document.getElementById('stick_livechat_button').style.display = 'flex';
        })

        $('#menu_btn_blue').click(function() {
            document.getElementById('mobile_lists').style.display = 'block';
            document.getElementById('menu_btn_close_blue').style.display = 'block';
            document.getElementById('menu_btn_blue').style.display = 'none';
            document.getElementById('stick_livechat').style.display = 'none';
            document.getElementById('stick_livechat_button').style.display = 'none';
            document.getElementById('stick_livechat_button_close').style.display = 'none';
        })

        $('#menu_btn_close_blue').click(function() {
            document.getElementById('mobile_lists').style.display = 'none';
            document.getElementById('menu_btn_close_blue').style.display = 'none';
            document.getElementById('menu_btn_blue').style.display = 'block';
            document.getElementById('stick_livechat').style.display = 'none';
            document.getElementById('stick_livechat_button').style.display = 'flex';
        })

        $('#stick_livechat_button').click(function() {
            document.getElementById('stick_livechat').style.display = 'block';
            document.getElementById('stick_livechat_button').style.display = 'none';
            document.getElementById('stick_livechat_button_close').style.display = 'flex';
        })

        $('#stick_livechat_button').click(function() {

            id = document.getElementById('session_id').value

            $.ajax({
                method: "post",
                url: "session.php",
                data: $('#start_session_form').serialize(),
                dataType: "text",
                success: function (response) {
                    document.getElementById('stick_livechat').style.display = 'block';

                    document.getElementById('stick_livechat_button').style.display = 'none';

                    document.getElementById('stick_livechat_button_close').style.display = 'flex';
                    
                    document.getElementById('chat_form').reset();

                    document.getElementById('email').value = id;

                    window.history.pushState("null", "null", "?id=" + id);

                    $("#chat_history").load(" #chat_history > *");
                }
            });
        })

        $('#stick_livechat_button_close').click(function() {
            document.getElementById('stick_livechat').style.display = 'none';
            document.getElementById('stick_livechat_button').style.display = 'flex';
            document.getElementById('stick_livechat_button_close').style.display = 'none';
        })

        document.getElementById("show_chat_info").onmouseover = function() { $('#chat_note').show(); }
        document.getElementById("show_chat_info").onmouseout  = function() { $('#chat_note').hide(); }

        $('#mobile_chat_btn').click(function() {

            id = document.getElementById('session_id').value

            $.ajax({
                method: "post",
                url: "session.php",
                data: $('#start_session_form').serialize(),
                dataType: "text",
                success: function (response) {
                    document.getElementById('backdrop').style.display = 'none';

                    document.getElementById('mobile_chat_btn').style.display = 'none';

                    document.getElementById('stick_livechat').style.display = 'block';

                    document.getElementById('stick_livechat_button').style.display = 'none';

                    document.getElementById('stick_livechat_button_close').style.display = 'flex';
                    
                    document.getElementById('chat_form').reset();

                    document.getElementById('email').value = id;

                    window.history.pushState("null", "null", "?id=" + id);

                    $("#chat_history").load(" #chat_history > *");
                }
            });
        })

        $('#closeChatBtn').click(function() {
            document.getElementById('stick_livechat').style.display = 'none';
            document.getElementById('backdrop').style.display = 'block';
            document.getElementById('mobile_chat_btn').style.display = 'flex';
        })

        $(window).resize(function() {
            document.getElementById('mobile_lists').style.display = 'none';
            document.getElementById('menu_btn_close').style.display = 'none';
            document.getElementById('menu_btn').style.display = 'block';
            document.getElementById('stick_livechat').style.display = 'none';
            document.getElementById('stick_livechat_button_close').style.display = 'none';
            document.getElementById('mobile_chat_btn').style.display = 'none';
        });
    });

    $(document).ready(function () {
        setInterval(function(){
            $('#chat_history_mobile').load(window.location.href + " #chat_history_mobile > *");
        }, 1000);

        setInterval(function(){
            $('#chat_history').load(window.location.href + " #chat_history > *");
        }, 1000);
    });

    document.addEventListener('DOMContentLoaded', function() {
    
        const chatWindow = document.getElementById('chat_history_mobile');
        let isScrolledToBottom = true;
        let timeout = null;

        // Throttled scroll event handler
        function throttledScroll() {
            if (timeout) {
                clearTimeout(timeout);  
            }

            timeout = setTimeout(() => {
                isScrolledToBottom = chatWindow.scrollHeight - chatWindow.clientHeight <= chatWindow.scrollTop + 1;
            }, 100);
        }

        // Attach the throttled scroll event listener
        chatWindow.addEventListener('scroll', throttledScroll);

        // Function to add a message to the chat
        function addMessage() {
            const message = document.createElement('p');
            if (isScrolledToBottom) {
                chatWindow.scrollTop = chatWindow.scrollHeight;
            }
        }

        // Add a message every 2 seconds
        setInterval(addMessage, 1000);
    });

    document.addEventListener('DOMContentLoaded', function() {
    
        const chatWindow = document.getElementById('chat_history');
        let isScrolledToBottom = true;
        let timeout = null;

        // Throttled scroll event handler
        function throttledScroll() {
            if (timeout) {
                clearTimeout(timeout);  
            }

            timeout = setTimeout(() => {
                isScrolledToBottom = chatWindow.scrollHeight - chatWindow.clientHeight <= chatWindow.scrollTop + 1;
            }, 100);
        }

        // Attach the throttled scroll event listener
        chatWindow.addEventListener('scroll', throttledScroll);

        // Function to add a message to the chat
        function addMessage() {
            const message = document.createElement('p');
            if (isScrolledToBottom) {
                chatWindow.scrollTop = chatWindow.scrollHeight;
            }
        }

        // Add a message every 2 seconds
        setInterval(addMessage, 1000);
    });

    function InsertBreak(e){
        //check for return key=13
        if (parseInt(e.keyCode)==13) {
            //get textarea object
            var objTxtArea;
            objTxtArea = document.getElementById("test");
            
            //insert the existing text with the <br>
            objTxtArea.innerText=objTxtArea.value+"<br>";
        }

    }

    $(document).ready(function(){
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if (scroll > 80) {
                $(".navbar").css("background" , "#fff");
                $(".links").css("color" , "#0000A8");
                document.getElementById('blueLogo').style.display = 'block';
                document.getElementById('whiteLogo').style.display = 'none';
            }

            else {
                $(".navbar").css("background" , "000");
                $(".links").css("color" , "#fff");
                document.getElementById('blueLogo').style.display = 'none';
                document.getElementById('whiteLogo').style.display = 'block';
            }
        })
    });

    let sections = document.querySelectorAll('section');

    window.onscroll = () => {
        sections.forEach(sec => {
            let top = window.scrollY;
            let offset = sec.offsetTop - 250;
            let height = sec.offsetHeight;

            if(top >= offset && top < offset + height) {
                sec.classList.add('show-animate');
            }
            else
            {
                sec.classList.remove('show-animate')
            }
        })
    }
</script>

<script>
    // this is the id of the submit button
    $("#sendChat").click(function() {

    var url = "functions/sendChat.php"; // the script where you handle the form input.

    $.ajax({
        type: "POST",
        url: url,
        data: $("#livechatform").serialize(), // serializes the form's elements.
        success: function(data)
        {
            document.getElementById('livechatform').reset();

            document.getElementById('email').value = id;

            $("#chat_history").load(" #chat_history > *");
        }
        });

        return false; // avoid to execute the actual submit of the form.
    });
</script>