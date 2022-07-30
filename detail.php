
<DOCTYPE! html>
	<head>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="jquery.js"></script>  
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
<?php
	
	include("navbar.html");
	$game_id  = $_GET["id"];
	$connect = mysqli_connect("localhost", "root", "", "meta");
	$query="SELECT game_user_review.review_id,game_user_review.user_id,user.username,game_user_review.review,game_user_review.score,game_user_review.likes
	FROM game_user_review INNER JOIN user ON game_user_review.user_id=user.user_id where game_id='$game_id'";
	$result = mysqli_query($connect, $query);
	
	$query2="SELECT * FROM game_info where game_id='$game_id'";
	$result2 = mysqli_query($connect, $query2);
	
	
	$query5="SELECT * FROM game_critic_review where game_id='$game_id'";
	$result5 = mysqli_query($connect, $query5);

?>
	<body>
	
	<?php
		while($row2=mysqli_fetch_assoc($result2)){
	?>
		<img class="img" id="image_detail" src="<?php echo $row2["image"]; ?>" height ="100" width="100">
		<h1><?php echo $row2["name"]; ?></h1>
		
					
	<?php
		}
	?>
	
	
	<div class="container">
		<ul class="nav nav-tabs nav-justified" role="tablist">
			<li role="presentation" class="active"><a href="#critic" data-toggle="tab">Critic Review</a></li>
			<li role="presentation" ><a href="#user" data-toggle="tab">User Review</a></li>
			<li role="presentation"><a href="#sreq" data-toggle="tab">System Requirements</a></li>
			<li role="presentation"><a href="#trailer" data-toggle="tab">Trailer</a></li>
		</ul>
		
		

		<div class="tab-content">
		
		<!-- CRITIC REVIEW -->
			<div role="tabpanel" class ="tab-pane active" id="critic">
				<?php
					while($row=mysqli_fetch_assoc($result5)){
				?>
				<div class="panel">
					<h4 id="critic" ><?php echo $row["critic_name"]; ?></h4>
					<h4 id="critic_score">Score:<?php echo $row["score"]; ?></h4>
					<p id="critic_review"><u>Review:</u><?php echo $row["review_sum"]; ?></p>
					<h4 id="link"><a href="<?php echo $row["link"]; ?>">READ FULL REVIEW HERE</a></h4>
					<h4><?php echo "<br><br>"; ?></h4>
					</div>
					
				<?php
				}
				?>
			</div>
			
			
			<!-- USER REVIEW -->
			<div role="tabpanel" class ="tab-pane active" id="user">
				
				<?php
					while($row=mysqli_fetch_assoc($result)){
						 //print_r( $row ); 
						$review_id=$row["review_id"];
					
				?>
				<div id="user_rev" class="panel">
					<h4 id="user"><?php echo $row["username"]; ?></h4>
					<h4 id= "score">Score:<?php echo $row["score"]; ?>/10</h4>
					<p id="user_review"><u>Review:</u><?php echo $row["review"]; ?></p>
					<div id="<?php echo $row["review_id"]."#"; ?>"><h4 id="likes">Likes:<?php echo $row["likes"]; ?></h4></div>
					<?php
						if(isset($_SESSION['user_id'])){
					?>
						<input type="button" id="<?php echo "$review_id" ?>"  onclick="likefunc(this.id)" class="btn btn-info" value="like" />
					<?php
						}
					?>
						
					<h4><?php echo "<br><br>"; ?></h4>
					</div>
					
				<?php
				}
				?>
				
			<?php	
			 if(isset($_SESSION['user_id'])){
				
				$uid=$_SESSION['user_id'];
				$query3="SELECT * FROM game_user_review where game_id='$game_id' AND user_id='$uid'";
				$result3 = mysqli_query($connect, $query3);
				$num_row = mysqli_num_rows($result3);
				if($num_row > 0)
				{ ?>
				 
				 <h4 id="info">*You already have a review</h4>
				 
				<?php
				}
				
				
				
				else{
				?>
				<div class="container">
				<form method="POST" id="review_form">
				
				<div id="select_score">
					<h4>Select a score:</h4> 
				</div>
				<select class="form-control" id="user_score">
					
					<option value="1">1</option>
					<option value="2" >2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>

					<textarea name="review_text" id="review_text"class="form-control" placeholder="Enter Review" rows="7"></textarea>
				</div>
				<div class="form-group">
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $uid ?>" />
					<input type="hidden" name="game_id" id="game_id" value="<?php echo $game_id ?>" />
					<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
				</div>
			   </form>
				
				<?php
				}
				?>
				<br />
				<div class="panel" id="display_reviews">
				
				</div>
				
				
			<?php 
			   } 
			else{
			?>	<h4>Login to post reviews</h4>				
			
			<?php  
                }  
			?>
			</div>
				
				
				<div role="tabpanel" class ="tab-pane active" id="sreq">
					<?php 
							$query5="SELECT sreq FROM game_info where game_id='$game_id'";
							$result5 = mysqli_query($connect, $query5);
							while($row5=mysqli_fetch_assoc($result5)){
								$sreq=$row5["sreq"];
							}
						?>
					<p> <?php echo "$sreq" ?>  </p>
				</div>
				
				<div  role="tabpanel" class ="tab-pane active" id="trailer">
						<?php 
							$query4="SELECT trailer FROM game_info where game_id='$game_id'";
							$result4 = mysqli_query($connect, $query4);
							while($row4=mysqli_fetch_assoc($result4)){
								$trailer=$row4["trailer"];
							}
						?>
						<iframe width="560" height="315" src="<?php echo "$trailer" ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
				
			</div>
			
		</div>
	
	
	
	
			
	<script>  
 $(document).ready(function(){  
      $('#submit').click(function(){  
           var user_id = $('#user_id').val();
		   var game_id=$('#game_id').val();
		   var review_text = $('#review_text').val(); 
           var review_score = $('#user_score').val();  
		   
           if(review_text != '')  
           {  
			line="addreview.php?user_id="+user_id+"&game_id="+game_id+"&review_text="+review_text+"&review_score="+review_score;
				
                var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
        				if (this.readyState == 4 && this.status == 200) {
            					data=this.responseText;	
								$('#review_text').hide();
								$('#user_score').hide();
								$('#submit').hide();
								
                               //location.reload();
							   //document.getElementById("display_reviews").innerHTML=data;
							   
							   //var val[];
							   //alert(data);
							   val=data.split("#");
							   //alert(val);
							   
							   //document.getElementById("display_reviews").innerHTML=val[0]+val[1]+val[2]+val[3];
							   document.getElementById("display_reviews").innerHTML="<h4>User:"+val[0]+"</h4> <p>Review:"+val[1]+"</p> <h4>Score:"+val[2]+"</h4>" ;
							  
							  
							   document.getElementById("select_score").innerHTML="<h4>*Your Review is posted:</h4>";
							   
						}
    				};
				xhttp.open("GET", line, true);
    			xhttp.send();	
           }  
           else  
           {  
                alert("All Fields are required !");  
           }  
      });
		activaTab('user');
 });
 
 function activaTab(tab){
		$('.nav-tabs a[href="#' + tab + '"]').tab('show');
	};
 </script> 
 
 <script>
  
		function likefunc(clicked_id){
			
				var u = <?php echo $_SESSION['user_id'] ?>;
				var r = clicked_id;
				//alert(u+r);
				line="likeaction.php?user_id="+u+"&review_id="+r;
			
				var xhttp = new XMLHttpRequest();
    			xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
        				data=this.responseText;
						
						if(data==0){
							alert("You already liked this review");
						}
						else{
							document.getElementById(clicked_id+"#").innerHTML="<h4>Likes:"+data+"</h4>";
							//alert(data);
						}
						
					}
    			};
				xhttp.open("GET", line, true);
    			xhttp.send();
 
 
		}
	
 
  </script> 
 
 

</body>


  <?php
	include("footer.html");
  ?>

</html>		



