<!DOCTYPE html>
<html lang='en'>

<head>
    <?php require_once('head_content.php'); ?>

    <title>PHP Hub</title>
</head>

<body>
    <?php session_start();
     /* This loads the header - error occurs when file isn't found because we need the header for navigation purposes */
     require_once('header.php'); ?>
    
    <!-- This loads the body depending on the URL. Default view is always the home screen. -->
    <?php 
        if (isset($_GET['page'])) { 
            $page = $_GET['page']; 
            if (file_exists('../pages/' . $page . '.php')) { 
                include('../pages/' . $page . '.php'); 
            } else { 
                include('../pages/home.php'); 
            } } else { 
                include('../pages/home.php'); 
        } 
    ?>

    <!-- jQuery -->
    <script src='//code.jquery.com/jquery-2.1.4.min.js'></script>
    <!-- Bootstrap JS -->
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>

</html>