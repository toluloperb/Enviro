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

    $('#stick_livechat_button_close').click(function() {
        document.getElementById('stick_livechat').style.display = 'none';
        document.getElementById('stick_livechat_button').style.display = 'flex';
        document.getElementById('stick_livechat_button_close').style.display = 'none';
    })

    document.getElementById("show_chat_info").onmouseover = function() { $('#chat_note').show(); }
    document.getElementById("show_chat_info").onmouseout  = function() { $('#chat_note').hide(); }

    var out = document.getElementById("chat_history_mobile");
    // allow 1px inaccuracy by adding 1

    $('#mobile_chat_btn').click(function() {
        document.getElementById('livechat_mobile').style.display = 'block';
        var isScrolledToBottom = out.scrollHeight - out.clientHeight <= out.scrollTop + 1;
        document.getElementById('main').style.display = 'none';
        document.getElementById('mobile_chat_btn').style.display = 'none';
    })

    $('#closeChatBtn').click(function() {
        document.getElementById('livechat_mobile').style.display = 'none';
        document.getElementById('main').style.display = 'block';
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