<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");
?>

<section id="main">
    <main>
        <?php
            if(isset($_GET["id"]))
            {
                $id = $_GET["id"];
                ?>
                    <div class="stick_livechat" id="stick_livechat">
                        <div class="closeBtn">
                            <button id="closeChatBtn">x</button>
                        </div>
                        <div class="client_info">
                            <div class="a">
                                <img src="assets/images/chat_icon.png"><p>Hello,</p>
                            </div>
                        </div>
                        <div class="session_area">
                            <div class="chat_history" id="chat_history">
                                <div class="eachchat_cs">
                                    <p>Welcome to Manor Realtors Group (Customer Assistance)</p>
                                </div>
                                <div class="eachchat_cs">
                                    <p>Kindly provide us with your email</p>
                                </div>
                                <?php
                                    $fetchChatHistory = "SELECT * FROM cs_chats WHERE session_id = '$id'";
                                    $fetchChatHistoryRun = mysqli_query($con, $fetchChatHistory);

                                    if(mysqli_num_rows($fetchChatHistoryRun) > 0)
                                    {
                                        foreach($fetchChatHistoryRun as $chat)
                                        {
                                            ?>
                                                <?php
                                                    $cs = $chat["email"];

                                                    if($cs == 'Admin')
                                                    {
                                                        ?>
                                                            <div class="admin_fetched_desktop">
                                                                <p><?= $chat["messages"]; ?></p>
                                                            </div>
                                                        <?php
                                                    }
                                                    else 
                                                    {
                                                        ?>
                                                            <div class="fetched_desktop">
                                                                <p><?= $chat["messages"]; ?></p>
                                                            </div>
                                                        <?php    
                                                    }
                                                ?>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                            <div class="chat_tools">
                                <form method="POST" id="chat_form">
                                    <div>
                                        <input type="text" id="email" name="session_id" value="<?= $id ?>" hidden>
                                        <textarea name="messages" type="text" id="messages" class="chat_tools_input form_data" placeholder="Start Typing..."></textarea>
                                        <button type="button" name="submit" id="submit" class="">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
            }
            else
            {
                ?>
                    <div class="stick_livechat" id="stick_livechat">
                        <div class="closeBtn">
                            <button id="closeChatBtn">x</button>
                        </div>
                        <div class="client_info">
                            <div class="a">
                                <img src="assets/images/chat_icon.png"><p>Hello,</p>
                            </div>
                        </div>
                        <div class="session_area">
                            <div class="chat_history" id="chat_history">
                                <div class="eachchat_cs">
                                    <p>Welcome to Manor Realtors Group (Customer Assistance)</p>
                                </div>
                                <div class="eachchat_cs">
                                    <p>Kindly provide us with your email</p>
                                </div>
                                <?php
                                    $fetchChatHistory = "SELECT * FROM cs_chats WHERE session_id = '$id'";
                                    $fetchChatHistoryRun = mysqli_query($con, $fetchChatHistory);

                                    if(mysqli_num_rows($fetchChatHistoryRun) > 0)
                                    {
                                        foreach($fetchChatHistoryRun as $chat)
                                        {
                                            ?>
                                                <?php
                                                    $cs = $chat["email"];

                                                    if($cs == 'Admin')
                                                    {
                                                        ?>
                                                            <div class="admin_fetched_desktop">
                                                                <p><?= $chat["messages"]; ?></p>
                                                            </div>
                                                        <?php
                                                    }
                                                    else 
                                                    {
                                                        ?>
                                                            <div class="fetched_desktop">
                                                                <p><?= $chat["messages"]; ?></p>
                                                            </div>
                                                        <?php    
                                                    }
                                                ?>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                            <div class="chat_tools">
                                <form method="POST" id="chat_form">
                                    <div>
                                        <input type="text" id="email" name="session_id" value=" " hidden>
                                        <textarea name="messages" type="text" id="messages" class="chat_tools_input form_data" placeholder="Start Typing..."></textarea>
                                        <button type="button" name="submit" id="submit" class="">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>

        <div class="stick_livechat chat_note" id="chat_note">
            <div>
                <p class="p1">Need help?</p>
                <p class="p2">Chat with our support team</p>
            </div>
        </div>

        <form action="" method="post" id="start_session_form">
            <?php
                if(isset($_GET["id"]))
                {
                    $id = $_GET["id"];

                    ?>
                        <input type="text" id="session_id" name="session_id" value="<?= $id ?>" hidden>
                        <div class="stick_livechat livechat_button" id="stick_livechat_button">
                                <img src="assets/images/chat.png" id="show_chat_info">
                        </div>
                    <?php
                }
                else 
                {
                    ?>
                        <?php $session_id = rand(000000, 999999) ?>
                        <input type="text" id="session_id" name="session_id" value="<?= $session_id ?>" hidden>
                        <div class="stick_livechat livechat_button" id="stick_livechat_button">
                            <img src="assets/images/chat.png" id="show_chat_info">
                        </div>
                    <?php
                }
            ?>
        </form>

        <form action="" method="post" id="start_session_form">
            <?php
                if(isset($_GET["id"]))
                {
                    $id = $_GET["id"];

                    ?>
                        <a href="live-chat?id=<?= $id ?>"><div class="mobile_chat_btn " id="">
                            <img src="assets/images/chat.png" id="show_chat_info">
                        </div></a>
                    <?php
                }
                else 
                {
                    ?>
                        <?php $session_id = rand(000000, 999999) ?>
                        <a href="live-chat?id=<?= $session_id ?>"><div class="mobile_chat_btn " id="">
                            <img src="assets/images/chat.png" id="show_chat_info">
                        </div></a>
                    <?php
                }
            ?>
        </form>

        <div class="stick_livechat livechat_button" id="stick_livechat_smile">
            <img src="assets/images/chat_smile.png" id="">
        </div>

        <div class="stick_livechat livechat_button_close" id="stick_livechat_button_close">
            <img src="assets/images/chat_close.png" alt="">
        </div>

        <section class="backdrop" id="backdrop">
            <video class="" src="https://cariandbritt.com/wp-content/uploads/2022/05/cari__britt-low-720p.mp4" autoplay="" loop="" muted="muted" playsinline="" controlsList="nodownload"></video>
        </section>

        <section class="explore_prop sec5 show-animate">
            <div class="title">
                <h3 class="animate">Explore Manor Realtors Group</h3>
            </div>
            <div class="products animate">
                <div class="eachproduct" style="background: url(assets/images/home.webp);">
                    <a href=""><div class="overlay"><p>Home</p></div></a>
                </div>

                <div class="eachproduct" style="background: url(assets/images/Residential.jpg);">
                    <a href=""><div class="overlay"><p>Residential</p></div></a>
                </div>

                <div class="eachproduct" style="background: url(assets/images/Commercial.webp);">
                    <a href=""><div class="overlay"><p>Commercial</p></div></a>
                </div>

                <div class="eachproduct" style="background: url(assets/images/LandVendorsDevelopments.png);">
                    <a href=""><div class="overlay"><p>Land Vendors Developments</p></div></a>
                </div>

                <div class="eachproduct" style="background: url(assets/images/Mortgage.jpg);">
                    <a href=""><div class="overlay"><p>Mortgage Facility</p></div></a>
                </div>

                <div class="eachproduct" style="background: url(assets/images/Management.webp);">
                    <a href=""><div class="overlay"><p>Management</p></div></a>
                </div>
            </div>
        </section>
        <br><br>

        <section class="service sec1 show-animate">
            <div class="eachs animate">
                <div class="partImg" style="background: url(assets/images/Picture3.jpg)">

                </div>
                <div class="partdeets">
                    <h3>Agency Leasing </h3>
                    <br>
                    <p>Earning successful returns on leased commercial property means more than filling space. It begins with a firm grasp of what kind of space the most desirable tenants want and what they will pay for it.  And it is followed by a marketing and agency leasing 
                        strategy that we will execute to mix the best tenants at the best lease terms – and retain them for lasting value.
                        <br><br>
                        Whether you’re an investor, developer, property company or public entity, that’s the way we’ll go to work for you, We’ll bring a strategic, proactive leasing approach to your commercial real estate assets so that you can focus on continuous financial growth.
                    </p>
                </div>
            </div>
        </section>

        <section class="service sec2">
            <div class="eachsreversed animate">
                <div class="partImg" style="background: url(assets/images/Picture4.png)">

                </div>
                <div class="partdeets">
                    <h3>Facility Management </h3>
                    <br>
                    <p>In an ideal world, real estate executives manage facilities that operate flawlessly, freeing them to focus on real estate strategies that contribute to broader business and financial goals. 
                        In reality, many spend much of their work day managing routine facility management and maintenance tasks. 
                        <br><br>
                        At Manor Realtors, we know that the ideal can be real. 
                        <br><br>
                        Our facility management services typically show clients a 20 percent or more drop in their overall facility operating 
                        expenses.
                    </p>
                </div>
            </div>
        </section>

        <section class="service sec3">
            <div class="eachs animate">
                <div class="partImg" style="background: url(assets/images/Picture5.png)">

                </div>
                <div class="partdeets">
                    <h3>Tenant Representation / Relocation Management</h3>
                    <br>
                    <p>Whether your organization is relocating a single major office or seeking a consistent strategy to acquire 
                        space and accommodate global expansion, you need a commercial or residential tenant representation firm 
                        that knows the Nigerian territory.
                        <br><br>
                        We serve as your strategic advisor, lowering your real estate costs and occupancy risks while maximizing 
                        workplace flexibility and productivity. We will analyse your business drivers and occupancy needs, identify 
                        and evaluate appropriate options, and manage lease negotiations. In fact, we will be your on-call expert 
                        for all your leasing and lease administration needs. 
                    </p>
                </div>
            </div>
        </section>

        <section class="service sec4">
            <div class="eachsreversed animate">
                <div class="partImg" style="background: url(assets/images/Picture6.png)">

                </div>
                <div class="partdeets">
                    <h3>Energy and Sustainability</h3>
                    <br>
                    <p>Investors and occupiers seem to agree that energy management and sustainability programs benefit their bottom 
                        line as much as they do our planet. But sustainability goals are easier to announce than to achieve. Leverage 
                        on our expertise in providing energy management services and sustainability solutions. 
                        <br><br>
                        We have one of the deepest in-house teams of environmental experts in the real estate industry
                    </p>
                </div>
            </div>
        </section>

        <section class="explore_prop">
            <div class="title" style="padding-top: 0px;">
                <h3 >Latest Listings</h3>
                <p>Explore our newest, luxurious and yet affordable properties.</p>
            </div>
            <div class="products">
                <a href="" class="product_box">
                    <div class="product" style="background: url(assets/images/home.webp);"></div>
                    <div class="detail">
                        <p>4 bedroom semi-detached duplex for sale</p>
                        <h3>NGN150,000,000</h3>
                        <p class="location"><i class="fa-solid fa-location-dot"></i> Ikate, Lekki</p>
                    </div>
                </a>
                <a href="" class="product_box">
                    <div class="product" style="background: url(assets/images/home.webp);"></div>
                    <div class="detail">
                        <p>4 bedroom semi-detached duplex for sale</p>
                        <h3>NGN150,000,000</h3>
                        <p class="location"><i class="fa-solid fa-location-dot"></i> Ikate, Lekki</p>
                    </div>
                </a>
                <a href="" class="product_box">
                    <div class="product" style="background: url(assets/images/home.webp);"></div>
                    <div class="detail">
                        <p>4 bedroom semi-detached duplex for sale</p>
                        <h3>NGN150,000,000</h3>
                        <p class="location"><i class="fa-solid fa-location-dot"></i> Ikate, Lekki</p>
                    </div>
                </a>
                <a href="" class="product_box">
                    <div class="product" style="background: url(assets/images/home.webp);"></div>
                    <div class="detail">
                        <p>4 bedroom semi-detached duplex for sale</p>
                        <h3>NGN150,000,000</h3>
                        <p class="location"><i class="fa-solid fa-location-dot"></i> Ikate, Lekki</p>
                    </div>
                </a>
            </div>
            <div class="learnmoreBtn">
                <a href="products"><button>See more</button></a>
            </div>
        </section>

        <section class="award">
            <div class="illustration_award">

            </div>
            <div class="illustration_award award_details">
                <h3>Over the years, we are improving greatly </h3>
                <p>Yaay🎉🎊 We won. We dedicate our wins to all our esteemed clients. You deserve it, You are the best!</p>
                <hr>
                <div class="award_logo">
                    <img src="assets/images/NRPA-LOGO_light.png" alt="">
                    <img src="assets/images/tags-award.png" alt="">
                </div>
            </div>
        </section>

        <section class="records sec6">
            <div class="recordCover ">
                <h3 class="animate">INSPIRED BY SHEER PERFORMANCE? WE’VE GOT YOUR NUMBERS.</h3>
                <div class="recordContainer animate">
                    <div class="eachRecord">
                        <p><strong>500+</strong></p>
                        <p>Transaction Completed</p>
                    </div>

                    <hr>

                    <div class="eachRecord">
                        <p><strong>10</strong></p>
                        <p>Average days our listings are on the market</p>
                    </div>

                    <hr>

                    <div class="eachRecord">
                        <p><strong>100+</strong></p>
                        <p>Number of 5-star reviews on Google</p>
                    </div>

                    <hr>

                    <div class="eachRecord">
                        <p><strong>70%</strong></p>
                        <p>Percentage of closings that are the direct result of referrals and repeat business</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="explore_prop client_bg" >
            <div class="title" style="padding-top: 0px;">
                <h3 >Our Clients</h3>
            </div>
            <div class="products" id="clients">
                <div class="eachproduct each_client">
                    <a href=""><div class="overlay"><img src="assets/images/sunway logo.png" alt=""></div></a>
                </div>

                <div class="eachproduct each_client">
                    <a href=""><div class="overlay"><img src="assets/images/fibe logo.png" alt=""></div></a>
                </div>

                <div class="eachproduct each_client">
                    <a href=""><div class="overlay"><img src="assets/images/manor-logo.png" alt=""></div></a>
                </div>
            </div>
        </section>
    </main>
</section>

<?php
    include("includes/footer.php");
?>