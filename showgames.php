
<DOCTYPE! html>
	<head>
	
	</head>
	<body>
	<?php
		include("navbar.html");
		
		$data  = $_GET["data"];

		
		if(isset($_GET["submit"])){
			$data=$_GET["val2"];
		}
		
		
		$connect = mysqli_connect("localhost", "root", "", "meta");
		$query="select * from game_info";
		
		
		
		
		
		//GENRE
		if($data == "action")
		{
			$query="select * from game_info where genre ='Action'";
		}
		if($data == "sports")
		{
			$query="select * from game_info where genre ='Sports'";
		}
		if($data == "fighting")
		{
			$query="select * from game_info where genre ='Fighting'";
		}
		if($data == "adventure")
		{
			$query="select * from game_info where genre ='Adventure'";
		}
		if($data == "racing")
		{
			$query="select * from game_info where genre ='racing'";
		}
		if($data == "all")
		{
			$query="select * from game_info";
		}
		
		//SORTING
		if($data == 1)
		{
			$query="SELECT DISTINCT game_info.name as name,game_info.image as image,game_info.game_id as game_id
			FROM game_info LEFT JOIN game_critic_review ON game_info.game_id=game_critic_review.game_id ORDER BY game_critic_review.score DESC";
		}
		if($data == 2)
		{
			$query="SELECT DISTINCT game_info.name as name,game_info.image as image,game_info.game_id as game_id
			FROM game_info LEFT JOIN game_critic_review ON game_info.game_id=game_critic_review.game_id ORDER BY game_critic_review.score";
		}
		if($data == 3)
		{
			$query="SELECT DISTINCT game_info.name as name,game_info.image as image,game_info.game_id as game_id
			FROM game_info LEFT JOIN game_user_review ON game_info.game_id=game_user_review.game_id ORDER BY game_user_review.score DESC";
		}
		if($data == 4)
		{
			$query="SELECT DISTINCT game_info.name as name,game_info.image as image,game_info.game_id as game_id
			FROM game_info LEFT JOIN game_user_review ON game_info.game_id=game_user_review.game_id ORDER BY game_user_review.score";
		}
		if($data == 5)
		{
			
			if(isset($_GET["submit"])){
			$data=$_GET["submit"];
			}
			$query="select name from game_info";
			
			
		}
		
		
		else{
			
		}
		
		$result = mysqli_query($connect, $query);
		
		
	?>
	
	
	<h1>All games</h1>
	
	<form action="search.php" method="POST">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
			
		</form>
	
	
	
	<div class="container">
	<table class="table" data-link="row">
		<thead>
			<tr>
			 	<th></th>
				<th>Name</th>
				<th>Average score by user</th>
				<th>Average score by Critic</th>
			</tr>
		</thead>
		<tbody>
<?php
	while($row=mysqli_fetch_assoc($result)){
?>
		<tr>
			<?php $game_id= $row["game_id"];?>
			<td><a href="detail.php?id="><img class="img" src="<?php echo $row["image"]; ?>" height ="100" width="100"></a></td>
			<td><a href='detail.php?id=<?php echo $game_id; ?>' ><?php echo $row['name']."<br>"; ?></a></td>
			<td><a href='detail.php?id=<?php echo $game_id; ?>' >
				<?php
					$query2="SELECT AVG(score) FROM game_user_review where game_id='$game_id'";
					$result2 = mysqli_query($connect, $query2);
					while($row2=mysqli_fetch_assoc($result2)){
						echo round(($row2['AVG(score)']*10))."<br>"; 
					}
				?>
			</a></td>
				<td><a href='detail.php?id=<?php echo $game_id; ?>' >
				<?php
					$query3="SELECT AVG(score) FROM game_critic_review where game_id='$game_id'";
					$result3 = mysqli_query($connect, $query3);
					while($row3=mysqli_fetch_assoc($result3)){
						echo round($row3['AVG(score)'])."<br>"; 
					}
				?>
			</a></td>
		</tr>
<?php
	}
?>

		</tbody>	
	</table>
	</div>
		
	
	</body>
</html>		
