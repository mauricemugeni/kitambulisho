<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
?>
<!--Script to send mail-->


<section id = "footer">
    <div class = "inner">
        <h2 class = "major">Let's Help!</h2>
        <p>It doesn't matter what your query is, we will answer back.</p>
        <form method = "POST">
            <input type="hidden" name="action" value="contact"/>
            <div class = "field">
                <label for = "name">Name</label>
                <input type="text" class="letterInput" maxlength="100" name="name" id="item_type" placeholder="how to address you" required/>
            </div>
            <div class = "field">
                <label for = "email">Email</label>
                <input type="email" name="email" id="email" maxlength="100" placeholder="WHO TO REPLY TO" required/>
            </div>
            <div class = "field">
                <label for = "message">Message</label>
                <textarea name = "message" maxlength="799" id = "message" rows = "4"></textarea>
                <?php
                if (!empty($_POST)) {
                    $success = $sub->execute();
                    if (is_bool($success) && $success == true) {
                        if (isset($_POST['email'])) {
                            //send email
                            $email = $_POST['email'];
                            $subject = 'INQUIRY FROM WEBSITE';
                            $message = $_POST['message'];
                            $receiver = "info@reflexconcepts.co.ke";
                            $mail = mail($receiver, "Subject: $subject", $message, "From: $email");
                            //echo '<center style="color: #009933">Thank you for contacting us. We will get back to you as soon as possible.</center>';
                            if ($mail) {
                                echo '<p class="link_to"> Message Sent! Getting back to you shortly.</p>';
                            }else {
                                echo '<p class="warning"> Message not sent!</p>';
                            }
                        }
                    }
                }
                ?>

            </div>
            <ul class = "actions">
                <li><input type = "submit" value = "Send Message" /></li>
            </ul>

        </form>
        <ul class = "contact">
            <li class = "fa-home">
                <a target="_blank" href="https://www.google.co.ke/maps/place/REFLEX CONCEPTS LTD">REFLEX CONCEPTS LTD</a><br />
                SUITE 4 1ST FLR. RENTFORD HSE, NRB<br />
                25663 - 00100 NRB.
            </li>
            <li class = "fa-phone"><a href="tel:(+254) 710 534 013">(+254) 710 534 013</a></li>
            <li class = "fa-envelope"><a href="mailto:info@kitambulisho.com">info@kitambulisho.com</a></li>
            
        </ul>
</section>
