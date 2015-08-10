<!-- Jumbotron - used for displaying blurry header foto and brand -->

<div class="jumbotron">
  <div class="container">
    <h1>PHP Hub</h1>
    <p>On this website you'll be able to request features which you think are missing for a posted project. Our admins will keep an eye out so there wont be any inapropriate requests.</p>
    <p>You can either sign up for a new account, or log in if you're a returning user!</p>
    <a class="btn btn-primary" href="../includes/signup.php">Sign up!</a>
    <a href="../includes/login.php" class="btn btn-default">Login</a>
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
      echo 
        '<div class="col-xs-6 col-md-3">'.
          '<h1 class="title">'.$i->project_name.'</h1>'.
          '<a href="project.php?id='.$i->id.'" class="thumbnail">'.
            '<img src="http://placehold.it/480x270" alt="'.$i->project_name.'" />'.
          '</a>'.
          '<div class="description">'.$i->project_description.'</div>'.
        '</div>';
      # code...
    }
  }
?>