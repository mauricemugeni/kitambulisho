<?php
if (!isset($_SESSION['user'])) {
    App::redirectTo("?login");
} else {
    require WPATH . "modules/process/form_processor.php";
    $sub = new Form_Process;
    $id = $_GET['id'];
    $details = $sub->fetchMyDocumentDetails($id);
    if (!empty($_POST)) {
        $success = $sub->execute();
        if (is_bool($success) && $success == true) {
            $_SESSION['update_success'] = "Successfully updated details";
        } else if (is_bool($success) && $success == false) {
            $_SESSION['update_error'] = "Failed updating details";
        }
        App::redirectTo("?docs");
    }
}
?>

<section id="banner"></section>
<section id="footer">
    <div class="inner">
        <h2 class="major">Edit document Details</h2>
        <p>We made it convenient to change this document details.</p>

        <form method="POST">
            <input type="hidden" name="action" value="editDoc"/>
            <input type="hidden" name="id" value="<?php echo $details['id']; ?>">
            <div class="field">
                <label for="item_type">Document Type</label>
                <input type="text" name="item_type" id="item_type" value="<?php echo $details['item_type']; ?>" readonly/>
            </div>
            <div class="field">
                <label for="item_no">DOCUMENT No.</label>
                <input type="number" name="item_no" id="item_no" maxlength="20" class="numberInput" value="<?php echo $details['item_no']; ?>" required/>
            </div>
            <div class="field">
                <label for="item_name">Holder's Names</label>
                <input type="text" name="item_name" id="item_name" maxlength="120" class="letterInput" value="<?php echo $details['item_name']; ?>" required/>
            </div>
            <input type="hidden" name="owner" id="item_type" value="<?php echo $details['owner']; ?>" readonly/>
            <div class = "field">
                <label for="description">Description</label>
                <textarea name = "description" maxlength="799" id = "message" rows = "4" required/> <?php echo $details['description']; ?> </textarea>
            </div>

            <ul class="actions">
                <li><input type="submit" value="Submit" /></li>
            </ul>
        </form>
    </div>
</section>
