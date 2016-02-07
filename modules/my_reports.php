<?php 
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
if (!isset($_SESSION['user'])) {
    App::redirectTo("?login");
}
?>
<section id="banner"></section>
<section id="footer">
    <div class="inner">
        <h2 class="major">REPORTED DOCUMENTS</h2>
        <p>What I have reported</p>
        
         <?php 
            //echo $_SESSION['iname'];
            echo "<h3 class='major'>Records Found</h3>";   
            echo $sub->myReports();
         ?>
    </div>
    <div class="inner"></div>
</section>

