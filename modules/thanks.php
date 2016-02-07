<?php
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
        <h2 class="major">THANK YOU!</h2> 
        <p>You have just simplified somebody's life. Documents <?php if (isset($_SESSION['user'])) { ?><a href="?my_reports">Reported by You</a> <?php }else { ?>    
            <a href="?signing">Sign Up</a> to be informed if you lost document is found, as soon as it is found.<?php } ?></p>
    </div>
</section>

