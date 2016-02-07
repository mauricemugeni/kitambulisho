<?php
if (!isset($_SESSION['user'])) {
    App::redirectTo("?login");
}
?>
<!-- Banner -->
<section id="banner">
    <div class="inner">
        <div class="logo"> <img src="images/Kitambulisho.png" width="300"></div>
        <h2 class="major">THANK YOU!</h2>
        <p>You have just added a document to your <a href="?docs">Doc Log!</a></p>
    </div>
</section>

