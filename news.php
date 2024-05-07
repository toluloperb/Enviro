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
                            <div class="contentContainer readStory" id="contentContainer" style="height: auto;">
                                <button style="width: 70px; padding: 7px; border-radius: 7px; 
                                border: 1px solid #e8e8e8; color: #333; margin-bottom: 10px; margin-right: 10px;" onclick="history.go(-1)" style="width: 7%; padding: 5px 5px; margin-bottom: 15px;">&#8592; Back</button>
                                
                                <?php
                                    $select = "SELECT * FROM news WHERE id = '$id'";
                                    $select_query = mysqli_query($con, $select);
                                    if(mysqli_num_rows($select_query) > 0)
                                    {
                                        foreach($select_query as $data)
                                        {
                                            ?>
                                                <div class="updateImg readImg" id="prodImg" style="background: url('uploads/<?= $data["image"] ?>')"></div>
                                                <h3 style="font-size: 20pt; margin-bottom: 0; color: #555;"><?= $data["title"] ?></h3>
                                                <p style="font-size: 9pt; color:#555; margin-top: 4px; margin-bottom: 15px;"><?= $data["date"] ?>, <?= $data["time"] ?></p>
                                                <p><?= nl2br ($data["story"]) ?></p>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No record found";
                                    }
                                ?>
                            </div>
                        <?php     
                    }
                    else
                    {
                        ?>
                            <div class="headerBackground" style="background: url('assets/images/news_bkg.jpg')">
                                <div class="toppings" style="padding-top: 50px;background-color: #00006ed9;">
                                    <h3>Our News</h3>
                                </div>
                            </div>
                            <section class="contentContainer">
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
                                    $record = mysqli_num_rows(mysqli_query($con, "SELECT id, title FROM news"));
                                    $pagi = ceil($record/$per_page);

                                    $select = "SELECT * FROM news ORDER BY id DESC LIMIT $pageno, $per_page";
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
                                                                <a href="?p=<?= $row["id"] ?>"><div class="eachNews">
                                                                    <div class="updateImg" style="background: url('uploads/<?= $row["image"] ?>')">
                                                                    </div>
                                                                    <div class="updateTitle">
                                                                        <h3 style="font-size: 20pt; margin-bottom: 0; color: #555;"><?= $row["title"] ?></h3>
                                                                        <p style="font-size: 9pt; color:#555; margin-top: 4px;"><?= $row["date"] ?>, <?= $row["time"] ?></p>
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

<script>
    $('#nextImage').click(function() {
        var imagesByClass = document.getElementsByClassName('imageClass');
        var image = imagesByClass[0];
        image.src = document.getElementById("nextImage").src;

        function changeImageSrc(newSrc) {
            var image = document.getElementById('prodImg');
            image.src = newSrc;
        }
        // alert("HELLO");
    })
</script>