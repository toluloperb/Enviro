<?php
    include("includes/header.php");
    include("includes/navbar.php");

    ?>
        <section class="contactContainer">
            <div class="container">
                <div class="side_a">
                    <h1>Contact Us</h1>
                    <p>Need to get in touch? We’d love to hear from you using any of the means below.</p>
                    <div class="contactBtns">
                        <a href=""><button style="background: #0000A8">Live Chat</button></a>
                        <a href="tel:+"><button style="background: green">Call</button></a>
                    </div>
                </div>
                <div class="side_b">
                    <form action="" method="post">
                        <div class="single_row">
                            <div>
                                <label for="">First Name</label>
                                <input type="text" name="fname" required>
                            </div>
                            <div>
                                <label for="">Last Name</label>
                                <input type="text" name="lname" required>
                            </div>
                        </div>

                        <div class="single_row">
                            <div>
                                <label for="">Phone Number</label>
                                <input type="tel" name="tel" required>
                            </div>
                            <div>
                                <label for="">Email</label>
                                <input type="email" name="email" required>
                            </div>
                        </div>

                        <div class="single">
                            <label for="">What service are you interesed in?</label>
                            <select name="service" id="">
                                <option value="" selected disabled>Select</option>
                                <option value="Housing">Rent</option>
                                <option value="Sale of Properties">Sale of Properties</option>
                                <option value="Land Purchase">Land Purchase</option>
                                <option value="Mortgage">Mortgage</option>
                            </select>
                        </div>

                        <div class="single">
                            <label for="">Additional Info</label>
                            <textarea name="comment" id="" cols="30" rows="10"></textarea>
                        </div>

                        <div class="contactBtns">
                            <button type="submit" style="background: #0000A8">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <?php
    include("includes/footer.php");
?>