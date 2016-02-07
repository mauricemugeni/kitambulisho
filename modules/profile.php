<?php
require WPATH . "modules/process/form_processor.php";
$sub = new Form_Process;
if (!isset($_SESSION['user'])) {
    App::redirectTo("?login");
}
?>
<section id="banner"></section>
<section id="four" class="wrapper alt style1">
    <div class="inner">
        <h2 class="major"> Hey, <?php
            if (isset($_SESSION['user'])) {
                echo $_SESSION['user'];
            } else
                echo 'Session Unset';
            ?></h2>
        <p>Welcome to your profile. Here you can do two main things: <a href="?adding">add your important documents</a> and <a href="?report">report a found document</a>.</p>
        <section class="features">
            <article>
                <a href="?adding" class="image"><img src="images/profile-01.png" alt="" /></a>
                <h3 class="major">Add important documents</h3>
                <p>To make it convenient add the documents you wish to find easily when lost.</p>
                <a href="?adding" class="special">Start Here</a>
            </article>
            <article>
                <a href="?docs" class="image"><img src="images/profile-02.png" alt="" /></a>
                <h3 class="major">View your Documents</h3>
                <p>See all the documents you have added for Lost & Found safe keeping.</p>
                <a href="?docs" class="special">View Here</a>
            </article>
            <article>
                <a href="?report" class="image"><img src="images/profile-03.png" alt="" /></a>
                <h3 class="major">Report L & F</h3>
                <p>Report a Lost & Found document. Simplify someone's life.</p>
                <a href="?report" class="special">Report Now!</a>
            </article>
            <article>
                <a href="?contact" class="image"><img src="images/profile-04.png" alt="" /></a>
                <h3 class="major">Feedback</h3>
                <p>We appreciate you on board. And we would like to here your thoughts.</p>
                <a href="?contact" class="special">Build, Customise!</a>
            </article>
        </section>

        <ul class="actions">
            <li><a href="?about" class="button">About Kitambulisho Yetu!</a></li>
        </ul>

    </div>
</section>

</section>