$(document).ready(function () {
    $('#submit').click(function (e) { 
        e.preventDefault();

        id = document.getElementById('email').value

var elem = document.getElementById('chat_history_mobile');

        $.ajax({
            method: "post",
            url: "chat_function.php",
            data: $('#chat_form').serialize(),
            dataType: "text",
            success: function (response) {
                $('#feedback').text(response);
                document.getElementById('chat_form').reset();
                $("#chat_history").load(location.href + " #chat_history " );
                window.history.replaceState(null, null, "?id=" + id);
            }
        });
    })
});

$(document).ready(function () {
    $('#mobile_submit').click(function (e) { 
        e.preventDefault();

        id = document.getElementById('email').value

        $.ajax({
            method: "post",
            url: "chat_function.php",
            data: $('#mobile_chat_form').serialize(),
            dataType: "text",
            success: function (response) {
                $('#feedback').text(response);
                document.getElementById('mobile_chat_form').reset();
                $("#chat_history_mobile").load(" #chat_history_mobile > *");

elem.scrollTop = elem.scrollHeight;
                window.history.replaceState(null, null, "?id=" + id);
            }
        });
    })
});

			
