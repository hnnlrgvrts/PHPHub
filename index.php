<?php    
    // load the config file
    require_once("/resources/config.php");
     
	// load the header
    require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container-fluid">
    
    <!-- This loads the body depending on the URL. Default view is always the home screen. -->
    <?php 
        if (isset($_GET['page'])) { 
            $page = $_GET['page']; 
            if (file_exists(PAGES_PATH . '/' . $page . '.php')) {
				include(PAGES_PATH . '/' . $page . '.php'); 
            } else {
				include(PAGES_PATH . '/error.php'); 
            }
		} else { 
        	include(PAGES_PATH . '/home.php'); 
        } 
    ?>
    
</div>
<?php
    require_once(TEMPLATES_PATH . "/footer.php");
?>