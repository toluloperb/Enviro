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
                        <h3>Products</h3>

                        <form action="" method="post">
                            <div class="addproductForm">
                                <div class="imgPart">

                                </div>
                                <div class="descPart">
                                    <div>
                                        <label for="">Title</label>
                                        <input type="text" name="title" required>
                                    </div>

                                    <div>
                                        <label for="">Categories</label>
                                        <select name="category" id="" required>
                                            <option value="" selected disabled>Select</option>
                                            <option value="1 Bedroom Apartment">1 Bedroom Apartment</option>
                                            <option value="2 Bedroom Apartment">2 Bedroom Apartment</option>
                                            <option value="3 Bedroom Apartment">3 Bedroom Apartment</option>
                                            <option value="4 Bedroom Apartment">4 Bedroom Apartment</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="">Description</label>
                                        <textarea name="description" placeholder="Start Typing" required></textarea>
                                    </div>

                                    <div>
                                        <label for="">Price</label>
                                        <input type="text" name="price" required>
                                    </div>

                                    <div>
                                        <label for="">Address</label>
                                        <input type="text" name="address" required>
                                    </div>

                                    <div style="margin-bottom: 0px;">
                                        <label for="">City</label>
                                        <input type="text" name="city" required>
                                    </div>
                                </div>
                            </div>
                            <button class="addProduct" type="submit" name="addProduct">Add new product</button>
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