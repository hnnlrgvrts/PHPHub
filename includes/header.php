Navbar -->
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
                <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <?php if(isset($_SESSION['loggedin_user'])):?>
            <li><a href="logout.php">Logout</a>
        </li>
        <?php else: ?>
        <li><a href="login.php">
            Login
        </a></li>
        <li><a href="signup.php">
            Sign Up!
        </a></li>
        <?php endif; ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">
                <?php
                if (isset($_SESSION['loggedin_user'])) {
                echo $_SESSION['loggedin_user'];
                echo $_SESSION['loggedin_role'];
                } else {
                echo '';
                }
                ?>
            </a></li>
            <?php if(isset($_SESSION['loggedin_role'])): ?>
                <?php if($_SESSION['loggedin_role']==1):?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actions <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="addproject.php">Add new project</a>
                        </li>
                        <li>
                            <a href="#">Edit Admins</a>
                        </li>
                        <li>   
                            <a href="#">Something else here</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="#">Separated link</a>
                        </li>
                    </ul>
                </li>
                <?php else: ?>
                <!-- Role not admin -->
                <?php endif; ?>
            <?php else: ?>
            <!-- Session not set -->
            <?php endif; ?>
</ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
</nav>
<!-- End of navbar-->