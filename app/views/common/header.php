<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <link rel="shortcut icon" href="img/ico.png" />
    <title>CoverZone</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/cz.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <?php 
  	echo "<script>var base_url = '" . BASE_URL . "';</script>";
  ?>

<!-- Barra do topo -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img src="img/sz.png" width="130px" height="28px"></a>
            </div>
          </div>
           <div class="col-md-10"  style="margin: 0 auto;">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu-select" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">

                  <!--<form class="navbar-form" role="search">
                    <div class="form-group">

                      <select class="selectpicker">
                        <option>Rock</option>
                        <option>Grunge</option>
                        <option>Pop</option>
                        <option>Heavy Metal</option>
                        <option>Eletrônica</option>
                      </select> 

                      <select class="selectpicker">
                        <option>Led Zeppelin</option>
                        <option>Grunge</option>
                        <option>Pop</option>
                        <option>Sertanejo</option>
                        <option>Eletrônica</option>
                      </select>

                      <select class="selectpicker">
                        <option>Stairway to Heaven</option>
                        <option>Grunge</option>
                        <option>Pop</option>
                        <option>Sertanejo</option>
                        <option>Eletrônica</option>
                      </select>

                      <select class="selectpicker">
                        <option>Qualquer</option>
                        <option>Grunge</option>
                        <option>Pop</option>
                        <option>Sertanejo</option>
                        <option>Eletrônica</option>
                      </select>
                    </div>
                  </form> -->
            </div>
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>