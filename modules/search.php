<?php 
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
if(!empty($_POST)){
    $success = $sub->execute();
    if(is_bool($success) && $success == true){
       ////App::redirectTo("?self");
    }
}
?>
<section id="banner"></section>
<section id="footer">
    <div class="inner">
        <h2 class="major">Find Lost &AMP; Found</h2>
        <p>Search here for you found document, using the document no. i.e. Passport no., ID no., etc.<?php if(isset($_POST['submit'])){ echo '<a href="?search">  Search Again</a>';} ?></p>
        <?php if(!isset($_POST['submit'])){
         echo '<form method="POST" id="form_search">
                <input type="hidden" name="action" value="searching"/>
                    <div class="search">
                        <input type="search" name="search" placeholder="E.g. ID No." required/>
                    </div>
                    <div class="search">
                        <input type="submit" name="submit" value="Search"/>
                    </div>
               </form>';
             }
         ?>
         <?php if(isset($_POST['submit'])){
            echo "<h3 class='major'>Records Found</h3>";   
            echo $sub->getReports();
            
                //App::redirectTo("?claimSuccess");
            
         }
         ?>
    </div>
    <div class="inner"></div>
</section>

