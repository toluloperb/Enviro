<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        include("includes/navbar.php");
        include("includes/sidebar.php");
        include("../config/dbcon.php");
        if(isset($_GET["q"]))
        {
            $id = $_GET["q"];

            $select = "SELECT * FROM news WHERE id = '$id' LIMIT 1";
            $select_run = mysqli_query($con, $select);

            if($select_run)
            {
                foreach($select_run as $data)
                {
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
                                                <input type="file" name="image" id="" onchange="readURL(this);"/> <span value="<?= $data["image"] ?>"></span> 
                                            </div>

                                            <div src="../uploads/<?= $data["image"] ?>" id="blahs"></div>
                                        </div>
                                        <div class="descPart">
                                            <div>
                                                <label for="">Title</label>
                                                <input type="text" name="title" value="<?= $data["title"] ?>" required>
                                            </div>

                                            <div>
                                                <label for="">Body</label>
                                                <textarea style="height: 300px" id="test" name="description" placeholder="Start Typing..." required><?= $data["story"] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="addProduct" type="submit" name="updateNews">Add new product</button>
                                    <br><br>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
        }

        include("includes/footer.php");
    }
    else
    {
        header("Location: login?error=Login to continue");
        exit();
    }
?>