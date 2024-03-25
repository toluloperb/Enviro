<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        include("includes/navbar.php");
        include("includes/sidebar.php");
        include("../config/dbcon.php");

        ?>
            <main>
                <section class="contentContainer">
                    <h3>Hello, dammy</h3>
                    <div class="content" id="content">
                        <!-- Count -->
                        

                        <!-- Content -->
                        <?php
                            $select = "SELECT * FROM subscribers ORDER by id DESC";
                            $select_query = mysqli_query($con, $select);

                            if(mysqli_num_rows($select_query) > 0)
                            {
                                foreach($select_query as $data)
                                {
                                    ?>
                                        <p><?= $data["email"] ?></p>
                                    <?php
                                }
                            }
                        ?>
                    </div>
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