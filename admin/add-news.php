<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        include("includes/navbar.php");
        include("includes/sidebar.php");

        ?>
                <div class="content">
                    <button id="open_sidebar"><img src="assets/images/open_btn.png" alt=""></button>

                    <div class="then productsThen">
                        <div class="toppings">
                            <div style="display: flex; align-items: center;">
                                <a href="news"><button>Back</button></a>
                                <h3 style="margin-left: 15px">Add News</h3>
                            </div>
                        </div>
                        <?php
                            if(isset($_SESSION['status']))
                            {
                                $response = $_SESSION['status'];
                                if($response)
                                {
                                    ?>
                                        <div class="alert" id="alert" role="alert">
                                            <p><?= $response ?></p>
                                        </div>
                                    <?php
                                    unset($_SESSION['status']);
                                }
                            }
                        ?>

                        <form action="../functions/adminFunction.php" method="post" enctype="multipart/form-data">
                            <div class="addproductForm">
                                <div class="imgPart">
                                    <div>
                                        <label for="">Featured Image</label>
                                        <input type="file" name="image" onchange="readURL(this);" required>
                                    </div>

                                    <div id="blahs"></div>
                                </div>
                                <div class="descPart">
                                    <div>
                                        <label for="">Title</label>
                                        <input type="text" name="title" required>
                                    </div>

                                    <div>
                                        <label for="">Body</label>
                                        <textarea style="height: 300px" id="test" name="description" placeholder="Start Typing..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="addProduct" type="submit" name="addNews">Add new product</button>
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        <?php

        include("includes/footer.php");
    }
    else
    {
        header("Location: login?error=Login to continue");
        exit();
    }
?>