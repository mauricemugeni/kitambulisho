<?php
require WPATH . "modules/process/ad_processor/ad_processor.php";
$admin = new Admin_Process;
?>
<section id="footer">
    <div class="inner">
        <h2 class="major">ADMIN LOGIN</h2>
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
                    $success = $admin->execute();
                    if (is_bool($success) && $success == true) {
                        App::redirectTo('?ad_profile');
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




