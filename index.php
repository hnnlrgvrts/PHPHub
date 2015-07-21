<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Bootstrap CSS & Theme -->
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css'>

    <title>PHP Hub</title>
</head>

<body>

    <!-- This loads the header - error occurs when file isn't found -->
    <?php require_once('includes/header.php'); ?>
    
    <!-- This loads the body depending on the URL. Default view is always the home screen. -->
    <?php 
        if (isset($_GET['page'])) { 
            $page = $_GET['page']; 
            if (file_exists('pages/' . $page . '.php')) { 
                include('pages/' . $page . '.php'); 
            } else { 
                include('pages/home.php'); 
            } } else { 
                include('pages/home.php'); 
        } 
    ?>

    <!-- jQuery -->
    <script src='//code.jquery.com/jquery-2.1.4.min.js'></script>
    <!-- Bootstrap JS -->
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>

</html>