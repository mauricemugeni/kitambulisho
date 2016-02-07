<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
if (!isset($_SESSION['user'])) {
    App::redirectTo("?login");
} else {
    if (!empty($_POST)) {
        $success = $sub->execute();
        if (is_bool($success) && $success == true) {
            App::redirectTo("?addDoc");
            //$username = $_GET['username'];
            //$_SESSION['team'] = $code_name;
        }
    }
}
?>
<section id="banner">

</section>
<section id="footer">
    <div class="inner">
        <h2 class="major">Add important documents</h2>
        <p>To make it convenient add the documents you wish to find easily when lost here.</p>
        <form method="POST">
            <input type="hidden" name="action" value="adding"/>
            <div class="field">
                <label for="category">SELECT Document Type</label>
                <select name="category">
                    <?php echo $sub->getDocTypes(); ?>
                </select>
            </div>
            <ul class="actions">
                <li><input type="submit" value="Start" /></li>
            </ul>
        </form>
    </div>
</section>