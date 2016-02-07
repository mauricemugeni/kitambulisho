<?php

require WPATH . "core/include.php";
$currentPage = "";

if ( is_menu_set('logout') != "" ) 
    App::logOut();

else if ( is_menu_set('home') != ""){
    $currentPage = WPATH . "modules/home.php";
    set_title("Reflex | Home");
}

else if ( is_menu_set('report') != ""){
    $currentPage = WPATH . "modules/report.php";
    set_title("Reflex | Report");
}

else if ( is_menu_set('reporting') != ""){
    $currentPage = WPATH . "modules/reporting.php";
    set_title("Reflex | Reporting");
}

else if ( is_menu_set('search') != ""){
    $currentPage = WPATH . "modules/search.php";
    set_title("Reflex | Search Lost & Found");
}

else if ( is_menu_set('thanks') != ""){
    $currentPage = WPATH . "modules/thanks.php";
    set_title("Reflex | Thank You!");
}

else if ( is_menu_set('report_view') != ""){
    $currentPage = WPATH . "modules/report_view.php";
    set_title("Reflex | Your Document Pickup Details");
}

else if ( is_menu_set('contact') != ""){
    $currentPage = WPATH . "modules/contact.php";
    set_title("Reflex | Contact US!");
}

else if ( is_menu_set('signing') != ""){
    $currentPage = WPATH . "modules/signing.php";
    set_title("Reflex | Choose Username");
}

else if ( is_menu_set('signup') != ""){
    $currentPage = WPATH . "modules/signup.php";
    set_title("Reflex | Signup");
}

else if ( is_menu_set('welcome') != ""){
    $currentPage = WPATH . "modules/welcome.php";
    set_title("Reflex | Jitambulishe!");
}

else if ( is_menu_set('login') != ""){
    $currentPage = WPATH . "modules/login.php";
    set_title("Reflex | Jikaribishe!");
}

else if ( is_menu_set('logout') != ""){
    $currentPage = WPATH . "modules/logout.php";
    set_title("Reflex | Kwaheri!");
}

else if ( is_menu_set('profile') != ""){
    $currentPage = WPATH . "modules/profile.php";
    set_title($_SESSION['user']."'s Profile!");
}

else if ( is_menu_set('about') != ""){
    $currentPage = WPATH . "modules/about.php";
    set_title("About KITAMBULISHO.COM");
}

else if ( is_menu_set('adding') != ""){
    $currentPage = WPATH . "modules/adding.php";
    set_title("Add Document");
}

else if ( is_menu_set('addDoc') != ""){
    $currentPage = WPATH . "modules/addDoc.php";
    set_title("Add Document");
}

else if ( is_menu_set('addSuccess') != ""){
    $currentPage = WPATH . "modules/addSuccess.php";
    set_title("Add Successful");
}

else if ( is_menu_set('docs') != ""){
    $currentPage = WPATH . "modules/docs.php";
    set_title($_SESSION['user']."'s Documents");
}

else if ( is_menu_set('claimSuccess') != ""){
    $currentPage = WPATH . "modules/claimSuccess.php";
    set_title("Claim Successful!");
}

else if ( is_menu_set('my_reports') != ""){
    $currentPage = WPATH . "modules/my_reports.php";
    set_title("Your reports so far!");
}

else if ( is_menu_set('editDoc') != ""){
    $currentPage = WPATH . "modules/editDoc.php";
    set_title("Update Document Details");
}

else if ( is_menu_set('admin') != ""){
    $currentPage = WPATH . "modules/admin/index.php";
    set_title("ADMIN");
}

else if ( is_menu_set('ad_profile') != ""){
    $currentPage = WPATH . "modules/admin/ad_profile.php";
    set_title("ADMIN PROFILE");
}

else if (!empty($_GET)) {
    App::redirectTo("?");
}

else{
    $currentPage = WPATH . "modules/home.php";
    if ( App::isLoggedIn() ) {
		set_title("Home | Reflex");                
	}        
}

if (App::isAjaxRequest())
    include $currentPage;
else {
    require WPATH . "core/template/layout.php";
}

