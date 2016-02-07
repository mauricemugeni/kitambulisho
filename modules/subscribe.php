<?php 
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
if(!empty($_POST)){
    $success = $sub->execute();
    if(is_bool($success) && $success == true){
        App::redirectTo("?nothing");
    }
}
?>

<section id="footer">
    <div class="inner">
            <h2 class="major">Subscribe</h2>
            <p>The best way to get back your ID is to help them find you!</p>
            <form method="POST">
                <input type="hidden" name="action" value="subscriber"/>
                    <div class="field">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" />
                    </div>
                    <div class="field">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" />
                    </div>
                    <div class="field">
                            <label for="tel">Tel.</label>
                            <input type="tel" name="tel" id="tel"/>
                    </div>
                    <ul class="actions">
                            <li><input type="submit" value="Submit" /></li>
                    </ul>
            </form>
    </div>
</section>

        