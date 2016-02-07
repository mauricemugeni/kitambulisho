<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
?>
<section id="footer">
    <div class="inner">
        <h2 class="major">SignUp!</h2>
        <p>The best way to get back your documents and report! This will make it easier!</p>
        <form method="POST">
            <!--<input type="hidden" name="action" value="checkUsername"/>-->
            <input type="hidden" name="action" value="confirmUsername"/>
             <?php
                if (!empty($_POST)) {
                    $success = $sub->execute();
                    if (is_bool($success) && $success == true) {
                        //$url = $_SESSION['current_page'];
                        App::redirectTo('?signup');
                    }
                }
            ?>
            <div class="field">
                <label for="username">Username</label>
                <span id="user-result"></span>
                <input type="text" name="username" maxlength="80" id="username" required/>
            </div>

            <ul class="actions">
                <li><input type="submit" value="Submit" /></li>
            </ul>
        </form>
    </div>
</section>
