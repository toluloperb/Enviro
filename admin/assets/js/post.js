$(document).ready(function () {
    $('#reply').click(function (e) { 
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

                $("#chat_history").load(" #chat_history > *");
            }
        });
    })
});
