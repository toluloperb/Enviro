$(document).ready(function () {
    $('#subscribeNewsletter').click(function (e) { 
        e.preventDefault();

        $.ajax({
            method: "post",
            url: "functions/userFunctions.php",
            data: $('#subscriber').serialize(),
            dataType: "text",
            success: function (response) {

                if (response == "Success") 
                {
                    $('#feedback').text(response);

                    document.getElementById('successmsg').style.display = "block";
                    document.getElementById('email').style.display = "none";
                    document.getElementById('subscribeNewsletter').style.display = "none";

                    setTimeout(function(){
                        $("#successmsg").fadeOut(1000,function () {
                            document.getElementById('email').style.display = "block";
                            document.getElementById('subscribeNewsletter').style.display = "block";
                        })
                    }, 2000)

                    document.getElementById('subscriber').reset();
                } 
                else 
                {
                    document.getElementById('errormsg').style.display = "block";
                    document.getElementById('email').style.display = "none";
                    document.getElementById('subscribeNewsletter').style.display = "none";

                    setTimeout(function(){
                        $("#errormsg").fadeOut(1000,function () {
                            document.getElementById('email').style.display = "block";
                            document.getElementById('subscribeNewsletter').style.display = "block";
                        })
                    }, 2000)
                }
            }
        });
    })
});