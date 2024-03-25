<?php
    session_start();
    include ('includes/header.php');
?>

<div class="authContainer">
    <div class="authcontainerForm">
        <a href="../index.php"><img src="../images/fibe logo.png" style="width: 40%; margin-left: 30%;"></a><br><br>
        <h3>Login to your account</h3>
        <p>Insert your Login Credentials</p><br>
        <form class="wrap" id="login" action="../functions/userAuth.php" method="post" autocomplete="off">
            <input class="inputLogin" type="text" name="username" placeholder="Your username" required><br>
            <!-- <input type="text" name="mname" placeholder="Your middle name" required> -->
            <div class="form__input">
                <input class="inputLogin" type="password" name="password" placeholder="Your password" required>
                <span id="p-viewer" class="fa fa-eye"></span>
            </div>
            <button type="submit" name="login_btn" style="width: 100%;">Login</button><br><br>
            <!-- <a href="reset-pass.php" class="forgotPassText">Forgot Password?</a><br> -->
        </form>
    </div>
</div>

<script>
    const triggerPassword = document.querySelector('.fa-eye');

    const showPassword = trigger => {
    trigger.addEventListener('click', () => {
        if(trigger.previousElementSibling.getAttribute('type') === 'password'){
        trigger.previousElementSibling.setAttribute('type', 'text');
        trigger.classList.remove('fa-eye');
        trigger.classList.add('fa-eye-slash');
        }else if(trigger.previousElementSibling.getAttribute('type') === 'text'){
        trigger.previousElementSibling.setAttribute('type', 'password');
        trigger.classList.remove('fa-eye-slash');
        trigger.classList.add('fa-eye');
        }
    });
    }

    showPassword(triggerPassword);
</script>
