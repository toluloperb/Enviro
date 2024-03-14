$(function() {
    $('#close_sidebar').click(function() {
        document.getElementById('sidebarContainer').style.display = 'none';
        document.getElementById('open_sidebar').style.display = 'block';
    })

    $('#open_sidebar').click(function() {
        document.getElementById('sidebarContainer').style.display = 'block';
        document.getElementById('open_sidebar').style.display = 'none';
    })

    $('.menu-item a').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    })

    // $("#allsessions").load(" #allsessions > *");
    // var currentUrl = document.getElementById("chathistory").innerHTML = window.location.href;
    // $('#chat_session').load(currentUrl);
    //     setInterval(function() {
    //     $('#chat_session').load(currentUrl);
    // },1000)
});

$(document).ready(function () {
    setInterval(function(){
        $('#chat_history').load(window.location.href + " #chat_history > *");
    }, 1000);

    setInterval(function(){
        $('#allsessions').load(window.location.href + " #allsessions > *");
    }, 1000);
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
