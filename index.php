<?php
    include("includes/header.php");
    include("includes/navbar.php");
?>

<section id="main">
    <main>
        <div class="stick_livechat" id="stick_livechat">
            <div class="client_info">
                <div class="a">
                    <img src="assets/images/chat_icon.png"><p>Hello,</p>
                </div>
            </div>
            <div class="session_area">
                <div class="chat_history">
                    <div class="eachchat_cs">
                        <p>Welcome to Manor Realtors Group (Customer Assistance)</p>
                    </div>
                    <div class="eachchat_cs">
                        <p>Kindly provide us with your email</p>
                    </div>
                    <div class="eachchat_cs" style="display:none;">
                        <p id="feedback" ></p>
                    </div>
                </div>
                <div class="chat_tools">
                    <form method="POST" id="chat_form">
                        <div>
                            <textarea name="messages" type="text" id="messages" class="chat_tools_input form_data" placeholder="Start Typing..."></textarea>
                            <button type="button" name="submit" id="submit" class="">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="stick_livechat chat_note" id="chat_note">
            <div>
                <p class="p1">Need help?</p>
                <p class="p2">Chat with our support team</p>
            </div>
        </div>

        <div class="stick_livechat livechat_button" id="stick_livechat_button">
            <img src="assets/images/chat.png" id="show_chat_info">
        </div>

        <div class="stick_livechat livechat_button" id="stick_livechat_smile">
            <img src="assets/images/chat_smile.png" id="">
        </div>

        <div class="stick_livechat livechat_button_close" id="stick_livechat_button_close">
            <img src="assets/images/chat_close.png" alt="">
        </div>

        <section class="backdrop">
            <video class="" src="https://cariandbritt.com/wp-content/uploads/2022/05/cari__britt-low-720p.mp4" autoplay="" loop="" muted="muted" playsinline="" controlsList="nodownload"></video>
        </section>

        <section class="explore_prop">
            <div class="title">
                <h3>Explore</h3>
            </div>
            <div class="products">
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

        <section class="explore_prop">
            <div class="title" style="padding-top: 0px;">
                <h3 >Featured Properties</h3>
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
                <a href=""><button>See more</button></a>
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

<section id="main2">
    <div class="stick_livechat" id="stick_livechat">
        <div class="client_info">
            <div class="a">
                <img src="assets/images/chat_icon.png"><p>Hello,</p>
            </div>
        </div>
        <div class="session_area">
            <div class="chat_history">
                <div class="eachchat_cs">
                    <p>Welcome to Manor Realtors Group (Customer Assistance)</p>
                </div>
                <div class="eachchat_cs">
                    <p>Kindly provide us with your email</p>
                </div>
                <div class="eachchat_cs" style="display:none;">
                    <p id="feedback" ></p>
                </div>
            </div>
            <div class="chat_tools">
                <form method="POST" id="chat_form">
                    <div>
                        <textarea name="messages" type="text" id="messages" class="chat_tools_input form_data" placeholder="Start Typing..."></textarea>
                        <button type="button" name="submit" id="submit" class="">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="stick_livechat chat_note" id="chat_note">
        <div>
            <p class="p1">Need help?</p>
            <p class="p2">Chat with our support team</p>
        </div>
    </div>

    <div class="stick_livechat livechat_button_mobile" id="livechat_button_mobile">
        <img src="assets/images/chat.png" id="show_chat_info">
    </div>

    <div class="stick_livechat livechat_button_mobile_close" id="livechat_button_mobile_close">
        <img src="assets/images/chat_close.png" alt="">
    </div>
</section>

<?php
    include("includes/footer.php");
?>