<!-- Footer -->
<section id="footer">

    <div class="inner">
        <!--<h2>Footer Menu</h2>
        <div id="footer_mnu">
            <div id="box1">Menu1</div>
            <div id="box2">Menu2</div>
            <div id="box3">Menu3</div>
            <div id="box4">Menu4</div>
            <span class="stretch"></span>
        </div>-->
        <h5 class="link_to">*Police Stations, Hospitals, Hotels, Booking Offices, Airports, Govt. Offices, etc. 
            <ul><li>Do not meet anyone to pick the document.</li>
                <li>Only reported documents will be found in our database <a href="?search">Here</a></li></ul></h5>
        <ul class="copyright">
            <li>&copy; Kitambulisho Yetu v2.0!. All rights reserved <?php echo date('Y'); ?>.</li>
            <li>Powered by: <a href="http://reflexconcepts.co.ke" target="_blank">
                    <img src="images/reflex_logo.png" width="60"></a>
            </li>
            <li><a href="https://twitter.com/KitambulishoCom" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="http://instagram.com/reflex.concepts" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="https://www.facebook.com/KitambulishoYetu" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="mailto:info@kitambulisho.com" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>
    </div>
</section>
</div>
<!-- Scripts -->
<script src="web/js/skel.min.js"></script>
<script src="web/js/jquery.min.js"></script>
<script src="web/js/jquery.scrollex.min.js"></script>
<script src="web/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="web/js/main.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<SCRIPT language=Javascript>
    <!--
      function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
    //-->
</SCRIPT>
<script>
$(document).ready(function(){
    $("#inputTextBox,#inputTextBox2").keypress(function(event){
        var inputValue = event.charCode;
        if((inputValue > 47 && inputValue < 58) && (inputValue != 32)){
            event.preventDefault();
        }
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var x_timer;
        $("#username").keyup(function (e) {
            clearTimeout(x_timer);
            var user_name = $(this).val();
            x_timer = setTimeout(function () {
                check_username_ajax(user_name);
            }, 1000);
        });

        function check_username_ajax(username) {
            $("#user-result").html('Checking...');
            $.post('username-checker.php', {'username': username}, function (data) {
                $("#user-result").html(data);
            });
        }
    });
</script>

