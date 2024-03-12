$(document).ready(function () {
    $('#submit').click(function (e) { 
        e.preventDefault();

        $.ajax({
            method: "post",
            url: "chat_function.php",
            data: $('#chat_form').serialize(),
            dataType: "text",
            success: function (response) {
                $('#feedback').text(response);
                document.getElementById('chat_form').reset();
            }
        });
    })
});

			
