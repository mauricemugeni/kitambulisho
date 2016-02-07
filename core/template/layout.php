<?php
// Before anything is sent, set the appropriate header
header('Content-Type: text/html; charset=UTF-8');
?>
<?php
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//require WPATH . "core/template/template_functions.php";
//$set = new TemplateResource();
//$my_page = $set->set_title($title);
?>
<!DOCTYPE HTML>
<html>
	<head>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '721143557986070');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=721143557986070&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
		<link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16 32x32">
	    	<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16 32x32">
		<title>Kitambulisho Yetu</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="web/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="web/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
                




	</head>
    <!--    <body>-->
        
        <?php
        require "header.php";
        ?>

        <?php
        require $currentPage;
        ?>

        <?php
        require "footer.php";
        ?>

        <!-- Basic scripts -->  
        <script src="../../material.min.js"></script>
        <!-- End of basic scripts -->
        <?php
        /*         * *
         * Specify the scripts that are to be added.
         */
        if ($templateResource = TemplateResource::getResource('js')) {
            ?>
            <!-- Additional Scripts -->
            <?php
            foreach ($templateResource as $js) {
                $js = "web/$js";
                ?>
                <script src="<?php echo $js; ?>"></script>
                <?php
            }
            ?>
            <?php
        }
        ?>
        <?php if (!App::isLoggedIn()) { ?>
            <script>
                jQuery(document).ready(function () {
                    App.initLogin();
                });
            </script>
        <?php } else { ?>
            <script>
                jQuery(document).ready(function () {
                    // initiate layout and plugins
                    App.init();
                    //App.setMainPage(true);

                });
            </script>
            <?php
        }
        ?>
	<script src="//platform.twitter.com/oct.js" type="text/javascript"></script>
<script type="text/javascript">twttr.conversion.trackPid('nu4ve', { tw_sale_amount: 0, tw_order_quantity: 0 });</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=nu4ve&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
<img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=nu4ve&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
</noscript>
    </body>
</html>
