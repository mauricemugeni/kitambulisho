<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
if (!isset($_SESSION['username'])) {
    App::redirectTo("?signing");
} else {
    if (!empty($_POST)) {
        $success = $sub->execute();
        if (is_bool($success) && $success == true) {
            App::redirectTo("?welcome");
        }
    }
}
?>
<section id="footer">
    <div class="inner">
        <h2 class="major">SignUp!</h2>
        <p>The best way to get back your documents and report! This will make it easier!</p>
        <form method="POST">
            <input type="hidden" name="action" value="subscriber"/>

            <div class="field">
                <label for="name">Name</label>
                <input type="text" class="letterInput" maxlength="100" name="name" id="name" required/>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" maxlength="100" id="email" required/>
            </div>
            <div class="field">
                <label for="tel">Mobile No.</label>
                <input type="tel" class="numberInput" maxlength="10" name="tel" id="tel" required/>
            </div>
            <div class="field">
                <label for="username">Username</label>
                <span id="user-result"></span>
                <input type="text" name="username" maxlength="80" id="username" value="<?php
                if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                } else
                    echo 'Session Unset';
                ?>" readonly/>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" name="password" maxlength="100" id="password" required/>
            </div>

            <ul class="actions">
                <li><input type="submit" value="Submit" /></li>
            </ul>
        </form>
    </div>
</section>
