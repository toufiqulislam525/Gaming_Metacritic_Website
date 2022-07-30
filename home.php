<!DOCTYPE html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="jquery.js"></script>  
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  
  .carousel-inner>.item>img, .carousel-inner>.item>a>img {
		width: 80%;
		overflow: hidden;
        }

  </style>
</head>


<body>
<?php
	
	include("navbar.html");

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/gow.jpg" alt="Image">
        <div class="carousel-caption">
          <h2>ALL YOUR GAMING INFORMATION IN ONE PLACE</h2>
          <p>From review scores from all gaming sites to requirements and trailers..</p>
        </div>      
      </div>

      <div class="item">
        <img src="img/kb.jpg" alt="Image" width: "80%" >
        <div class="carousel-caption">
          <h2>MAKE YOUR VOICE HEARD</h2>
          <p>Review and give score to games,like what others say.. </p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center">    
  <h1>TRENDING</h1><br>
  <div class="row">
    <div class="col-sm-4">
      <a href="detail.php?id=1"><img src="img/fifa.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
      <p style="color:floralwhite"></p>
    </div>
    <div class="col-sm-4"> 
      <a href="detail.php?id=2"><img src="img/ij2.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
      <p style="color:floralwhite" ></p>    
    </div>
    <div class="col-sm-4">
      <div>
       <h1>Features</h1>
      </div>
      <div >
       <h4 style="color:floralwhite">*Sign up today to be able to like and post your own review<br><br><br></h4>
      </div>
	  <div >
       <h4 style="color:floralwhite">*Sign up today to be able to like and post your own review<br><br><br></h4>
      </div>
	  <div style="color:floralwhite">
       <h4>*Sign up today to be able to like and post your own review<br><br><br></h4>
      </div>
	  <div style="color:floralwhite">
       <h4>*Sign up today to be able to like and post your own review<br><br><br></h4>
      </div>
	  
    </div>
  </div>
</div><br>

  <?php
	include("footer.html");
  ?>

</body>
</html>
