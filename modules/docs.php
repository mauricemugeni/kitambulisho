<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
if (!isset($_SESSION['user'])) {
    App::redirectTo("?login");
} else {
    if (!empty($_POST)) {
        $success = $sub->execute();
        if (is_bool($success) && $success == true) {
            App::redirectTo("?docs");
        }
    }
}
?>
<section id="banner">

</section>
<section id="footer">
    <div class="inner">
        <h2 class="major">Your Important Documents</h2>
        <p>See all the documents you have added for Lost & Found safe keeping.<a href="?adding">   Add Another Document</a></p>

            <?php echo $sub->getDocs(); ?>
        
        <a href="?adding" class="special">Add Document</a>
    </div>
    <div class="inner">


    </div>
</section>

