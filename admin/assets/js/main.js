$(function() {
    $('#close_sidebar').click(function() {
        document.getElementById('sidebarContainer').style.display = 'none';
        document.getElementById('open_sidebar').style.display = 'block';
    })

    $('#open_sidebar').click(function() {
        document.getElementById('sidebarContainer').style.display = 'block';
        document.getElementById('open_sidebar').style.display = 'none';
    })

    $('#read_btn').click(function() {
        document.getElementById('read').style.display = 'block';
        document.getElementById('unread').style.display = 'none';
        document.getElementById('ended').style.display = 'none';
    })

    $('#unread_btn').click(function() {
        document.getElementById('unread').style.display = 'block';
        document.getElementById('read').style.display = 'none';
        document.getElementById('ended').style.display = 'none';
    })

    $('#ended_btn').click(function() {
        document.getElementById('ended').style.display = 'block';
        document.getElementById('read').style.display = 'none';
        document.getElementById('unread').style.display = 'none';
    })

    $('.menu-item a').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    })

    setTimeout(function(){
        $("#alert").fadeOut(3000)
    }, 2000)

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
    }, 2000);

    setInterval(function(){
        $('#unread').load(window.location.href + " #unread > *");
        $('#read').load(window.location.href + " #read > *");
        $('#ended').load(window.location.href + " #ended > *");
    }, 2000);
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

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blahs')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

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
