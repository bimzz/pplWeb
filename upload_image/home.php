<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:index.php');
  exit;
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="wrapper">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin</a>
        </div>
      </nav>
      <aside class="sidebar">
        <menu>
          <ul class="menu-content">
            <li><a href="home.php?page=home"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="home.php?page=data"><i class="fa fa-cube"></i> Data Master</a></li>
            <li><a href="#"><i class="fa fa-cube"></i> <span>Data Ditolak</span></a></li>
	    <li><a href="home.php?page=logout"><span>Logout</span></a></li>
          </ul>
        </menu>
      </aside>
      <section class="content">
        <div class="inner">
          <p>
<?php
$page=(isset($_GET['page']))?$_GET['page'] : "main";
switch($page){
case 'home': include "isi.php";   break;	
case 'data' : include "data.php"; break;
case 'delete' : include "delete.php"; break; 
case 'logout' : include "logout.php"; break;
case 'main' : default : include "isi.php";
break; 
}
?>
          </p>
        </div>
      </section>
    </div>
    
    <script src=”https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js”></script>
<!– Include all compiled plugins (below), or include individual files as needed –>
<!– Latest compiled and minified JavaScript –>
<script src=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js” integrity=”sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa” crossorigin=”anonymous”></script>
<script>
$(“menu li > a”).click(function(e){
$(“menu ul ul”).slideUp(),$(this).next().is(“:visible”) || $(this).next().slideDown(),e.stopPropagation()
});
</script>
    
    </body>
</html>
