<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
?>
<section id="footer">
    <div class="inner">
        <h2 class="major">LOGIN NOW</h2>
        <p>The best way to get back your documents and report! This will make it easier!</p>
        <form method="POST">
            <input type="hidden" name="action" value="loginer"/>
            <div class="field">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" maxlength="60" required/>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required/>
                <?php
                if (!empty($_POST)) {
                    $success = $sub->execute();
                    if (is_bool($success) && $success == true) {
                        //$url = $_SESSION['current_page'];
                        App::redirectTo('?profile');
                    }
                }
                ?>
            </div>

            <ul class="actions">
                <li><input type="submit" value="Submit" /></li>
            </ul>
        </form>
    </div>
</section>




