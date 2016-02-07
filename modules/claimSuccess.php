<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
$id = $_SESSION['id'];
$details = $sub->claimSucces($id);
?>
<!-- Banner -->
<section id="banner">
    <div class="inner">
        <div class="logo"> <img src="images/Kitambulisho.png" width="300"></div>
        <h2 class="major"><a class="link_to" href="?search"> &lt;BACK</a> | CLAIM SUCCESSFUL!</h2>
        <h3>Here are the details of your claim.<?php 
        if(!isset($_SESSION['user'])){ echo '<a href="?login">Login</a> to manage your account.</h3> '; } ?> 
        <br/><br/>
        <span><b>DOCUMENT TYPE: </b><?php echo "&emsp;&emsp;".$details['item_type']; ?></span><br/>
        <span><b>HOLDER'S NAME:</b><?php echo "&emsp;&emsp;&emsp;".$details['item_name']; ?></span><br/>
        <span><b>DOCUMENT NO.:</b><?php echo "&emsp;&emsp;&emsp;".$details['item_no']; ?></span><br/>
        <span><b>GOTO MAP HERE.:</b><?php echo  "&emsp;&emsp;<a class='link_to' href='https://www.google.co.ke/maps/place/".$details['drop_point']."' target='_blank'>". $details["drop_point"]."</a>"; ?></span><br/>
    </div>
</section>

