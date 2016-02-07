
<body>
    <!-- Page Wrapper -->
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <h1><a href="?home"><img style="padding-top: 8px;" src="images/pic01.png" width="40"></a></h1>
            <nav>
                <?php if (isset($_SESSION['user'])) { ?>    
                   
                    <a class="link_to" href='?profile'>
                        <img src="images/favicon.png" width="15"> 
                        <?php echo $_SESSION['user']; ?></a>
                    |<a class="warning" href='?logout'>Logout</a>
                <?php } else { ?>
                    <a href='?signing'>SignUp! </a> | <a href='?login'>Login </a> 
                <?php } ?>
                <a href="#menu">Menu</a>
            </nav>
        </header>
        <!-- Menu -->
        <nav id="menu">
            <div class="inner">
                <h2>Menu</h2>
                <ul class="links">
			<?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="?profile">My Profile</a></li>
		<?php } else { ?>
			<li><a href="?home">Home</a></li>
		<?php } ?>
                    <li><a href="?report">Report L & F</a></li>
                    <li><a href="?search">Search L & F</a></li>
                    <?php if (isset($_SESSION['user'])) { ?>    
                    <li><a href='?adding'>Add Document</a></li>
                    <li><a href='?docs'>My Documents</a></li>
		<li><a href='?my_reports'>My Reports</a></li> 
                    <li><a class="warning" href='?logout'>Logout</a></li>
                    <?php } else { ?>
                    <li><a href='?signing'>SignUp! </a></li>
                    <li><a href='?login'>Login </a></li> 
                    <?php } ?>
                    <li><a href="?about">About Kitambulisho Yetu!</a></li>
                    <li><a href="?contact">Contact Us!</a></li>
                </ul>
                <a href="#" class="close">Close</a>
            </div>
        </nav>
