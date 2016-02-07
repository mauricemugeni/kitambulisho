<?php
    require WPATH . "modules/process/form_processor.php";
    $sub = new Form_Process;
    if (!empty($_POST)) {
        $success = $sub->execute();
        if (is_bool($success) && $success == true) {
            App::redirectTo("?reporting");
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
            <input type="hidden" name="action" value="report"/>
            <div class="field">
                <label for="category">Document Type You have Picked</label>
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

