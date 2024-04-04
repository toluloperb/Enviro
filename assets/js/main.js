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
                document.getElementById('livechat_mobile').style.display = 'block';

                document.getElementById('main').style.display = 'none';

                document.getElementById('mobile_chat_btn').style.display = 'none';
                
                document.getElementById('mobile_chat_form').reset();

                document.getElementById('email').value = id;
                
                window.history.pushState("null", "null", "?id=" + id);

                $("#chat_history_mobile").load(" #chat_history_mobile > *");
            }
        });
    })

    $('#closeChatBtn').click(function() {
        document.getElementById('livechat_mobile').style.display = 'none';
        document.getElementById('main').style.display = 'block';
        document.getElementById('mobile_chat_btn').style.display = 'flex';
    })

    $('#nextImage').click(function() {
        document.getElementById('prodImg').style.display = 'none';
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