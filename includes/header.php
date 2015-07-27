<!-- Navbar -->
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PHP Hub</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a>
            </li>
            <?php if(!isset($_SESSION['loggedin_user'])):?>
            <li><a href="includes/login.php">Log In</a>
        </li>
        <?php else: ?>
        <li><a href="includes/logout.php">
            Logout
        </a></li>
        <?endif;?>
        
        <li><a href="includes/signup.php">
            Sign Up!
        </a></li>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">
                <?php
                session_start();
                if (isset($_SESSION['loggedin_user'])) {
                echo $_SESSION['loggedin_user'];
                echo $_SESSION['loggedin_role'];
                } else {
                echo 'banaan';
                }
                ?>
            </a></li>
            <?php if($_SESSION['loggedin_role']==1):?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Add new project</a>
                </li>
                <li><a href="#">Edit Admins</a>
            </li>
            <li><a href="#">Something else here</a>
        </li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a>
    </li>
</ul>
</li>
<?php endif; ?>
</ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
</nav>
<!-- End of navbar -->