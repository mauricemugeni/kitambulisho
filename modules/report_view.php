<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
if (!isset($_SESSION['item_type'])) {
    App::redirectTo("?report");
}else {
    //session_unset();
}
?>
<!-- Banner -->
<section id="banner">
    <div class="inner">
        <div class="logo"> <img src="images/Kitambulisho.png" width="300"></div>
        <h2>YOUR DOCUMENT DETAILS</h2>
        <p>You can find where to pick it on the map from <a href="?map">Here</a></p>
        <?php echo $sub->viewDetails(); ?> 
    </div>
</section>

