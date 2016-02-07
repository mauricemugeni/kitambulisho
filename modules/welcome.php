<?php
if (!isset($_SESSION['username'])) {
    App::redirectTo("?signing");
}else {
    //session_unset();
}
?>
<!-- Banner -->
<section id="banner">
    <div class="inner">
        <div class="logo"> <img src="images/Kitambulisho.png" width="300"></div>
        <h2 class="major">WELCOME, JITAMBULISHE!</h2>
        <p>Thank you and Welcome! You will be the first to know of how you can find you lost document. If reported here. <a href="?login"> Login </a></p>
    </div>
</section>

