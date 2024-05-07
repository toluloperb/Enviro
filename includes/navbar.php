<?php
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        ?>
            <section class="navbar">
                <div class="desktopNav">
                    <li>
                        <a class="links" href="index?id=<?= $id ?>">Home</a>
                        <a class="links" href="products?id=<?= $id ?>">Our services</a>
                        <a class="links" href="news?id=<?= $id ?>">News</a>
                        <a class="links" href="">Buy &amp; Sell</a>
                        <a id="whiteLogo" href="index?id=<?= $id ?>"><img style="height: 40px" src="assets/images/manor-logo-white.png" alt=""></a>
                        <a id="blueLogo" style="display:none" href="index?id=<?= $id ?>"><img style="height: 40px; " src="assets/images/manor-logo.png" alt=""></a>
                        <a class="links" href="index#clients?id=<?= $id ?>">Clients</a>
                        <a class="links" href="">Careers</a>
                        <a class="links" href="contact?id=<?= $id ?>">Contact us</a>
                        <a class="links" href="about?id=<?= $id ?>">About us</a>
                    </li>
                </div>
            </section>

            <div class="mobileNav">
                <a id="blueLogoMobile" href="index"><img style="height: 40px; " src="assets/images/manor-logo.png" alt=""></a>

                <div class="menu_button" id="menu_buttonblue" >
                    <button id="menu_btn_blue"><img src="assets/images/menu.png" alt=""></button>
                    <button id="menu_btn_close_blue" style="display:none"><img src="assets/images/close.png" alt=""></button>
                </div>
            </div>

            <div class="mobile_list" id="mobile_lists">
                <li>
                    <a href="index?id=<?= $id ?>">Home</a>
                    <a href="products?id=<?= $id ?>">Our services</a>
                    <a href="news?id=<?= $id ?>">News</a>
                    <a href="">Buy &amp; Sell</a>
                    <a href="index#clients?id=<?= $id ?>">Clients</a>
                    <a href="">Careers</a>
                    <a href="contact?id=<?= $id ?>">Contact us</a>
                    <a href="about?id=<?= $id ?>">About us</a>
                </li>
            </div>
        <?php
    }
    else
    {
        ?>
            <section class="navbar">
                <div class="desktopNav">
                    <li>
                        <a class="links" href="index">Home</a>
                        <a class="links" href="products">Our services</a>
                        <a class="links" href="news">News</a>
                        <a class="links" href="">Buy &amp; Sell</a>
                        <a id="whiteLogo" href="index"><img style="height: 40px" src="assets/images/manor-logo-white.png" alt=""></a>
                        <a id="blueLogo" style="display:none" href="index"><img style="height: 40px; " src="assets/images/manor-logo.png" alt=""></a>
                        <a class="links" href="index#clients">Clients</a>
                        <a class="links" href="">Careers</a>
                        <a class="links" href="contact">Contact us</a>
                        <a class="links" href="about">About us</a>
                    </li>
                </div>
            </section>

            <div class="mobileNav">
                <a id="blueLogoMobile" href="index"><img style="height: 40px; " src="assets/images/manor-logo.png" alt=""></a>

                <div class="menu_button" id="menu_buttonblue" >
                    <button id="menu_btn_blue"><img src="assets/images/menu.png" alt=""></button>
                    <button id="menu_btn_close_blue" style="display:none"><img src="assets/images/close.png" alt=""></button>
                </div>
            </div>

            <div class="mobile_list" id="mobile_lists">
                <li>
                    <a href="index">Home</a>
                    <a href="products">Our services</a>
                    <a href="news">News</a>
                    <a href="">Buy &amp; Sell</a>
                    <a href="index#clients">Clients</a>
                    <a href="">Careers</a>
                    <a href="contact">Contact us</a>
                    <a href="about">About us</a>
                </li>
            </div>
        <?php
    }
?>
