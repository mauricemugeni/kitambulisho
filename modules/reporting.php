<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
if(isset($_SESSION['user'])){
    $username = $_SESSION['user'];
    $details = $sub->fetchDetails($username);
}
if (!isset($_SESSION['item_type'])) {
    App::redirectTo("?report");
} else {
    
    if (!empty($_POST)) {
        $success = $sub->execute();
        if (is_bool($success) && $success == true) {
            App::redirectTo("?thanks");
        }
    }
}
?>
<section id="banner">

</section>
<section id="footer">
    <div class="inner">
        <h2 class="major">Report Lost &AMP; Found</h2>
        <p>Ensure you indicate clearly where you have dropped the lost &AMP; found document. E.g. Central Police Station reception</p>
        <form method="POST">
            <input type="hidden" name="action" value="reporting"/>
            <div class="field">
                <label for="item_type"> Picked Document Type</label>
                <input type="text" name="item_type" id="item_type" value="<?php
                if (isset($_SESSION['item_type'])) {
                    echo $_SESSION['item_type'];
                } else
                    echo 'Session Unset';
                ?>" readonly/>
            </div>
            <?php if (!isset($_SESSION['user'])) { ?>
                <div class="field">
                    <label for="item_no">DOCUMENT No.</label>
                    <input type="tel" name="item_no" id="item_no" maxlength="20" class="numberInput" placeholder="E.g. the ID No" required/>
                </div>
                <div class="field">
                    <label for="name">Holder's Names</label>
                    <input type="text" name="name" id="inputTextBox" maxlength="120" placeholder="E.g. Kamau Ngau Kamau" required/>
                </div>
                <div class="field">
                    <label for="drop_point">Drop Point</label>
                    <input type="text" name="drop_point" id="drop_point" maxlength="120" placeholder="E.g. Buru Buru Police St." required/>
                </div>
                <div class="field">
                    <label for="reporter">Your Name</label>
                    <input type="text" name="reporter" id="inputTextBox2" maxlength="80" placeholder="E.g. Joseph Kamini" required/>
                </div>
                <div class="field">
                    <label for="tel">Tel.</label>
                    <input type="tel" name="tel" id="tel" onkeypress="return isNumberKey(event)" maxlength="10" placeholder="E.g. 0700123456" required/>
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" maxlength="100" placeholder="E.g. *****@gmail.com" required/>
                </div>

            <?php } else { ?>
                <div class="field">
                    <label for="item_no">DOCUMENT No.</label>
                    <input type="tel" name="item_no" id="item_no" maxlength="20" class="numberInput" placeholder="E.g. the ID No" required/>
                </div>
                <div class="field">
                    <label for="name">Holder's Names</label>
                    <input type="text" name="name" id="inputTextBox" maxlength="120" placeholder="E.g. Kamau Ngau Kamau" required/>
                </div>
                <div class="field">
                    <label for="drop_point">Drop Point</label>
                    <input type="text" name="drop_point" id="drop_point" maxlength="120" placeholder="E.g. Buru Buru Police St." required/>
                </div>
                <!-- Hidden fields -->
                <input type="hidden" name="reporter" id="reporter" value="<?php echo $details['name']; ?>"/>
                <input type="hidden" name="tel" id="tel" class="numberInput" maxlength="10" value="<?php echo $details['tel']; ?>"/>
                <input type="hidden" name="email" id="email" maxlength="100" value="<?php echo $details['email']; ?>"/>
                <!-- Hidden fields END -->
            <?php } ?>
            <ul class="actions">
                <li><input type="submit" value="Submit" /></li>

            </ul>
        </form>
    </div>
</section>

