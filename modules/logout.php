<?php
// set the expiration date to one hour ago
setcookie("username", "", time() - 3600);
session_destroy();
App::redirectTo("?");
?>
