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