<?php
    include("includes/header.php");
    include("includes/navbar.php");

    ?>
        <main>
            <section class="frontbanner">
                <div class="container fora">
                    <h3>Organize your business like a pro</h3>
                    <p>Customised Business Emails, Customised Invoice and Receipt Generation & Online Business Store.</p>
                    <a href="index#pricing"><button>Get Started</button></a>
                </div>
            </section>
            
            <section class="frontbanner contentPart">
                <div class="container intro">
                    <div class="intro_title">
                        <h3>Send Unlimited Customised Emails, Invoice and Transaction Receipts</h3>
                    </div>
                    <div class="intro_image">

                    </div>
                </div>
            </section>

            <section class="frontbanner contentPart howPart" id="how">
                <div class="container intro how">
                    <div class="intro_title">
                        <h3>How it works</h3>
                        <p>+ Sign up for free <i>(Free usage is valid for a month)</i></p>
                        <p>+ Set up your business portfolio</p>
                        <p>+ Start Enjoying our premium features</p>

                        <br><br>
                        <a href="index#pricing"><button>Get Started</button></a>
                    </div>
                    <div class="intro_image">

                    </div>
                </div>
            </section>

            <section class="frontbanner contentPart" id="pricing">
                <div class="container pricing">
                    <h3>Pricing</h3>
                    <div class="pricing_table">
                        <div class="each_table">
                            <h5>Free</h5>
                            <p>Unlimited access for 1 month</p>
                            <hr>
                            <div class="theListings">
                                <p>+ Customized Business Emails</p>
                                <p>+ Customized Invoice & Transaction Receipt</p>
                                <p>+ Organized Dashboard for keeping tabs on customers</p>
                                <p>+ Unlimited Storage Space</p>
                                <p>+ Real time Customer Support System</p>
                                <a href="signup?t=free"><button>Get Started</button></a>
                            </div>
                        </div>

                        <div class="each_table">
                            <div class="each_table_price">
                                <h5>$2.99/month</h5> 
                                <strike><p style="color: #858585; font-weight: bolder;">$4.10</p></strike>
                            </div>
                            <p>Unlimited access for 1 month</p>
                            <hr>
                            <div class="theListings">
                                <p>+ Customized Business Emails</p>
                                <p>+ Customized Invoice & Transaction Receipt</p>
                                <p>+ Organized Dashboard for keeping tabs on customers</p>
                                <p>+ Unlimited Storage Space</p>
                                <p>+ Real time Customer Support System</p>
                                <a href="signup?t=month"><button>Get Started</button></a>
                            </div>
                        </div>

                        <div class="each_table">
                            <div class="each_table_price">
                                <h5>$24.00/yr</h5> 
                                <strike><p style="color: #858585; font-weight: bolder;">$46.56</p></strike>
                            </div>
                            <p>Unlimited access for 1 year</p>
                            <hr>
                            <div class="theListings">
                                <p>+ Customized Business Emails</p>
                                <p>+ Customized Invoice & Transaction Receipt</p>
                                <p>+ Organized Dashboard for keeping tabs on customers</p>
                                <p>+ Unlimited Storage Space</p>
                                <p>+ Real time Customer Support System</p>
                                <a href="signup?t=year"><button>Get Started</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="frontbanner contentPart" id="testimonials">
                <div class="container pricing testimonials">
                    <h3>Over 300+ Businesses accross the globe use <strong class="specialTxt"> goepreneur </strong></h3>
                    <div class="whyContainer">
                        <div class="contentWhy">
                            <p>+ Available in all Countries</p>
                            <p>+ Accepts all forms of local and International Payment</p>
                            <p>+ 24/7 Real time Customer Support System</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="frontbanner contentPart" id="newsletter">
                <div class="container pricing newsletter">
                    <h3>Don't miss any update!</h3>
                    <p>Subscribe to our newsletter</p>
                    <div class="newsletterFormContainer">
                        <div class="contentWhy newsform">
                            <form id="subscriber" method="post">
                                <input type="email" name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required placeholder="Input your email (Ex: example@email.com)">
                                <input disabled style="border:none; background:green; color: #e8e8e8; display: none;" id="successmsg" type="text" value="&#x2714; You have successfully subscribe to getting our latest update!">
                                <input disabled style="border:none; background:red; color: #e8e8e8; display: none; font-weight:lighter;" id="errormsg" type="text" value="&#x2716; Looks like there was an error, you might have been registered or strings are not valid!">
                                <button id="subscribeNewsletter" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    <?php

    include("includes/footer.php");
?>