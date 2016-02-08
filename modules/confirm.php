<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
//if (!isset($_SESSION['username'])) {
//  App::redirectTo("?signing");
//} else {
if (!empty($_POST)) {
    $success = $sub->execute();
    if (is_bool($success) && $success == true) {
        App::redirectTo("?welcome");
    }
}
//}

?>
<section id="footer">
    <div class="inner">
        <h2 class="major"><?php if (isset($_GET["user"]))  echo $_GET["user"]; ?>,  CONFIRM ACCOUNT</h2>
        <p>Please click button to confirm account.</p>
        <form method="POST">

            <input type="hidden" name="action" value="confirm_subscriber"/>
            <input type="hidden" name="user" value="<?php if (isset($_GET["user"]))  echo $_GET["user"]; ?>"/>
            <input type="hidden" name="code" value="<?php if (isset($_GET["code"]))  echo $_GET["code"]; ?>"/>
            <ul class="actions">
                <li><input type="submit" value="Confirm" /></li>
            </ul>
        </form>
    </div>
</section>
