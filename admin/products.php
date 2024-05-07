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
                        <h3>Products</h3>
                        <a href="add-product"><button>Add New</button></a>
                    </div>

                    <div class="list-table">
                        <table>
                            <tr>
                                <th class="table_sn">S/N</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            
                                <?php
                                    $select_properties = "SELECT * FROM productsfamily";
                                    $select_properties_run = mysqli_query($con, $select_properties);

                                    if(mysqli_num_rows($select_properties_run) > 0)
                                    {
                                        foreach($select_properties_run as $data)
                                        {
                                            ?>
                                                <tr>
                                                    <td><?= $data["id"] ?></td>
                                                    <td><?= $data["title"] ?></td>
                                                    <?php
                                                        $product_id = $data["product_id"];
                                                        $select_properties_main = "SELECT * FROM products WHERE product_id = '$product_id' LIMIT 1";
                                                        $select_properties_main_run = mysqli_query($con, $select_properties_main);

                                                        if(mysqli_num_rows($select_properties_main_run) > 0)
                                                        {
                                                            foreach($select_properties_main_run as $maindata)
                                                            {
                                                                ?>
                                                                    <td><?= $maindata["price"] ?></td>
                                                                    <td><?= $maindata["address"] ?>, <?= $maindata["city"] ?></td>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                    <td></td>
                                                    <td><a href="editproperty?prod_id=<?= $data["product_id"] ?>"><button style="padding: 4px 9px 4px 9px;">Edit</button></a></td>
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