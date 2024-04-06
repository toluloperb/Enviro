<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        include("includes/navbar.php");
        include("includes/sidebar.php");
        include("../config/dbcon.php");

        ?>
            <div class="content">
                <button id="open_sidebar"><img src="assets/images/open_btn.png" alt=""></button>

                <div class="then productsThen">
                    <div class="toppings">
                        <h3>News</h3>
                        <a href="add-news"><button>Add New</button></a>
                    </div>

                    <div class="list-table">
                        <table>
                            <tr>
                                <th class="table_sn">S/N</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            
                                <?php
                                    $select_properties = "SELECT * FROM news";
                                    $select_properties_run = mysqli_query($con, $select_properties);

                                    if(mysqli_num_rows($select_properties_run) > 0)
                                    {
                                        foreach($select_properties_run as $data)
                                        {
                                            ?>
                                                <tr>
                                                    <td><?= $data["id"] ?></td>
                                                    <td><?= $data["title"] ?></td>
                                                    <td><?= $data["date"] ?></td>
                                                    <td><a href="editnews?q=<?= $data["id"] ?>"><button style="padding: 4px 9px 4px 9px;">Edit</button></a></td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            
                        </table>
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