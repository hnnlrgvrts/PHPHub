<!-- Jumbotron - used for displaying blurry header foto and brand -->

<div class="jumbotron">
    <div class="container">
        <h1>PHP Hub</h1>
        <p>On this website you will be able to request features you're missing at each posted project. Our admins will keep an eye out so there wont be any inapropriate requests on your or on others' project.</p>
        <button class="btn btn-primary">Button</button>
    </div>
</div>
<!-- End of jumbotron -->

<!-- Thumbnails - project overviews -->
<?php 

        $conn = new mysqli("localhost", "root", "root", "phphub");
        if (!$conn->connect_errno) {
            //connectie is ok
            $query = "SELECT * FROM db_project;";
            // $result haalt data uit tabel van databank 
            $result=$conn->query($query);        
            while ($i=$result->fetch_object()) {
             
                echo '<div class="col-xs-6 col-md-3">'.
                '<h1 class="title">'.$i->project_name.'</h1>'.
                '<a href="project.php?id='.$i->id.'" class="thumbnail">'.
                '<img src="http://placehold.it/480x270" alt="'.$i->project_name.'" />'.
                '</a>'.'<div class="description">'.$i->project_description.'</div>'.'</div>';
                # code...
            }
        }
?>
