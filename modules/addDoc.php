<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
if (!isset($_SESSION['user'])) {
    App::redirectTo("?login");
} else {
    if (!empty($_POST)) {
        $success = $sub->execute();
        if (is_bool($success) && $success == true) {
            App::redirectTo("?addSuccess");
        }
    }
}
?>
<section id="banner"></section>
<section id="footer">
    <div class="inner">
        <h2 class="major">Add important document</h2>
        <p>To make it convenient add the documents you wish to find easily when lost here.</p>
        <form method="POST">
            <input type="hidden" name="action" value="addDoc"/>

            <div class="field">
                <label for="item_type">Document Type</label>
                <input type="text" name="item_type" id="item_type" value="<?php
                if (isset($_SESSION['item_type'])) {
                    echo $_SESSION['item_type'];
                } else
                    echo 'Session Unset';
                ?>" readonly/>
            </div>
            <?php if ($_SESSION['item_type'] === "STUDENT ID") { ?>
                <div class="field">
                    <label for="institution_name">Institution Name</label>
                    <input type="text" name="institution_name" id="drop_point" maxlength="120" placeholder="E.g. University of Nairobi" required/>
                </div>
            <?php } ?>
            <div class="field">
                <label for="item_no">DOCUMENT No.</label>
                <input type="tel" name="item_no" id="item_no" maxlength="20" class="numberInput" placeholder="E.g. the ID No" required/>
            </div>
            <div class="field">
                <label for="item_name">Holder's Names</label>
                <input type="text" name="item_name" id="item_name" maxlength="120" class="letterInput" placeholder="As indicated on the document" required/>
            </div>
            <input type="hidden" name="owner" id="item_type" value="<?php
            if (isset($_SESSION['user'])) {
                echo $_SESSION['user'];
            } else
                echo 'Session Unset';
            ?>" readonly/>
            <div class = "field">
                <label for="description">Description</label>
                <textarea name = "description" maxlength="799" id = "message" rows = "4" placeholder="Describe the document briefly" required/></textarea>
            </div>


            <ul class="actions">
                <li><input type="submit" value="Submit" /></li>
            </ul>
        </form>
    </div>
</section>
