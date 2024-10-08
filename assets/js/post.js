$(document).ready(function () {
    $('#submit').click(function (e) { 
        e.preventDefault();

        id = document.getElementById('email').value

        $.ajax({
            method: "post",
            url: "chat_function.php",
            data: $('#chat_form').serialize(),
            dataType: "text",
            success: function (response) {
                $('#feedback').text(response);

                document.getElementById('chat_form').reset();

                document.getElementById('email').value = id;

                $("#chat_history").load(" #chat_history > *");
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

                document.getElementById('email').value = id;

                $("#chat_history_mobile").load(" #chat_history_mobile > *");
            }
        });
    })
});

			
