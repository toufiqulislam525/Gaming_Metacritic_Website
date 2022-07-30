 <?php   
	$user_id=$_GET['user_id'];
	$game_id=$_GET['game_id'];
	$review_text=$_GET['review_text'];
	$review_score=$_GET['review_score'];
	$connect = mysqli_connect("localhost", "root", "", "meta"); 
	$query = " insert into game_user_review(user_id,game_id,review,score) values('$user_id','$game_id','$review_text','$review_score')"; 
	$result=mysqli_query($connect,$query);
	
	
	$query2="SELECT game_user_review.user_id,user.username,game_user_review.review,game_user_review.score,game_user_review.likes 
	FROM game_user_review INNER JOIN user ON game_user_review.user_id=user.user_id where game_id='$game_id' and game_user_review.user_id='$user_id'";
	$result2=mysqli_query($connect,$query2);
	$data="";
	while($r=mysqli_fetch_assoc($result2)){
		$data=$data.$r['username']."#";
		$data=$data.$r['review']."#";
		$data=$data.$r['score']."#";
		$data=$data.$r['likes']."#";
	}
	echo $data;
	
 ?> 