<?php
    session_start();
        include("includes/header.php");
        include("includes/navbar.php");
        include("config/dbcon.php");

        ?>
            <main>
                <?php
                    if(isset($_GET["p"]))
                    {
                        $id = $_GET["p"];

                        ?>
                            <div class="contentContainer readStory" style="height: auto;">
                                <button style="width: 70px; padding: 7px; border-radius: 7px; 
                                border: 1px solid #e8e8e8; color: #333; margin-bottom: 10px; margin-right: 10px;" onclick="history.go(-1)" style="width: 7%; padding: 5px 5px; margin-bottom: 15px;">&#8592; Back</button>

                                <div class="imgRow">
                                    <div class="pcsImgs">
                                        <?php
                                            $select = "SELECT * FROM products WHERE product_id = '$id'";
                                            $select_query = mysqli_query($con, $select);
                                            if(mysqli_num_rows($select_query) > 0)
                                            {
                                                foreach($select_query as $data)
                                                {
                                                    ?>
                                                        <a href="?id=<?= $data["id"] ?>"><img id="nextImage" src="<?php echo 'uploads/'. $data["images"] ?>" /></a>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "No record found";
                                            }
                                        ?>
                                    </div>

                                    <div class="updateImg readImg" id="prodImg" style="background: url('uploads/<?= $data["images"] ?>')"></div>
                                </div>

                                <h3 style="font-size: 20pt; margin-bottom: 0; color: #555;"><?= $data["title"] ?></h3>
                                <h3 style="font-size: 20pt; margin-top: 0; margin-bottom: 0; color: var(--main);">NGN<?= $data["price"] ?></h3>
                                <p style="font-size: 9pt; color:#555; margin-top: 4px; margin-bottom: 15px;"><?= $data["address"] ?>, <?= $data["city"] ?></p>
                                <p><?= nl2br ($data["description"]) ?></p>
                            </div>
                        <?php     
                    }
                    else
                    {
                        ?>
                            <section class="contentContainer">
                                <div class="toppings">
                                    <h3>Products</h3>
                                    <?php
                                        if(isset($_SESSION['status']))
                                        {
                                            ?>
                                                <div class="alert" id="alert" role="alert">
                                                    <p><?= $_SESSION['status'] ?></p>
                                                </div>
                                            <?php
                                            unset($_SESSION['status']);
                                        }
                                    ?>
                                </div>

                                <?php
                                    $per_page = 6;
                                    $pageno = 0;
                                    $currentpage = 1;
                                    if(isset($_GET['pageno']))
                                    {
                                        $pageno = $_GET['pageno'];
                                        if($pageno <= 0)
                                        {
                                            $pageno = 0;
                                            $currentpage = 1;
                                        }
                                        else
                                        {
                                            $currentpage = $pageno;
                                            $pageno--;
                                            $pageno = $pageno * $per_page;
                                        }
                                    }
                                    $record = mysqli_num_rows(mysqli_query($con, "SELECT id, title FROM productsfamily"));
                                    $pagi = ceil($record/$per_page);

                                    $select = "SELECT * FROM productsfamily ORDER BY id DESC LIMIT $pageno, $per_page";
                                    $select_query = mysqli_query($con, $select);

                                    ?>
                                        <div class="content updatesContainer">
                                            <?php
                                                if(mysqli_num_rows($select_query) > 0)
                                                {
                                                    while($row=mysqli_fetch_assoc($select_query))
                                                    {
                                                        ?>
                                                            <div class="eachNewsContainer">
                                                                <a href="?p=<?= $row["product_id"] ?>"><div class="eachNews">
                                                                    <?php
                                                                        $product_id = $row["product_id"];
                                                                        $selectprodImg = "SELECT * FROM products WHERE product_id = $product_id ORDER BY id DESC LIMIT 1";
                                                                        $selectprodImgRun = mysqli_query($con, $selectprodImg);

                                                                        if($selectprodImgRun)
                                                                        {
                                                                            foreach ($selectprodImgRun as $imgstuffs)
                                                                            ?>
                                                                                <div class="updateImg" style="background: url('uploads/<?= $imgstuffs["images"] ?>')">
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                    <div class="updateTitle">
                                                                        <h3><?= $row["title"] ?></h3>
                                                                        <h3 style="font-size: 20pt; margin-top: 0; color: var(--main);">NGN<?= $imgstuffs["price"] ?></h3>
                                                                        <p style="font-size: 9pt; color:#555; margin-top: 4px;"><?= $imgstuffs["address"] ?>, <?= $imgstuffs["city"] ?></p>
                                                                    </div>
                                                                </div></a>
                                                            </div>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?> <p style="height: 100vh">No records</p> <?php
                                                }
                                            ?>
                                        </div>
                                    <?php
                                ?>

                                <div class="toppings pagiButtons">
                                    <?php
                                        for($i = 1; $i <= $pagi; $i++)
                                        {
                                            $class = '';
                                            if($currentpage == $i)
                                            {
                                                $class = "activePgClass";
                                                ?>
                                                    <div class="buttons">
                                                        <a href="javascript:void(0)"><button id="<?= $class ?>"><?= $i ?></button></a>
                                                    </div>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                    <div class="buttons">
                                                        <a href="?pageno=<?= $i ?>"><button><?= $i ?></button></a>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </section>
                        <?php
                    }
                ?>
            </main>
        <?php

        include("includes/footer.php");
?>