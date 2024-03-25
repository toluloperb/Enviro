<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        include("includes/navbar.php");
        include("includes/sidebar.php");

        ?>
            <main>
                <section class="contentContainer">
                    <h3>My Dashboard</h3>
                    <?php
                        if(isset($_SESSION['status']))
                        {
                            $response = $_SESSION['status'];
                            if($response == "Success0.5")
                            {
                                ?>
                                    <div class="alert" id="alert" role="alert" style="background: red;">
                                        <p><i class="fas fa-exclamation-triangle"></i> Email Saved but not sent!</p>
                                    </div>
                                <?php
                                unset($_SESSION['status']);
                            }
                            else if($response == "Success")
                            {
                                ?>
                                    <div class="alert" id="alert" role="alert">
                                        <p><i class="fa fa-check_circle"></i> Successful</p>
                                    </div>
                                <?php
                                unset($_SESSION['status']);
                            }
                            else if($response == "Error")
                            {
                                ?>
                                    <div class="alert" id="alert" role="alert" style="background: red;">
                                        <p>Error</p>
                                    </div>
                                <?php
                                unset($_SESSION['status']);
                            }
                        }
                    ?>
                </section>
            </main>
        <?php

        include("includes/footer.php");
    }
    else
    {
        header("Location: login?error=Login to continue");
        exit();
    }
?>