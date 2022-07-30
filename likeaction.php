 <?php   
	session_start();  
	$user_id=$_GET['user_id'];
	$review_id=$_GET['review_id'];

	$connect = mysqli_connect("localhost", "root", "", "meta");  
	$query = " SELECT * FROM like_info WHERE user_id='$user_id' AND review_id='$review_id'" ;
    $result = mysqli_query($connect, $query);  
	$rowcount=mysqli_num_rows($result);
	$data="";
    if($rowcount>0){
		$data=0; 
	}
	else{
 
		$query2 = " update game_user_review set likes =likes+1 WHERE review_id='$review_id'" ;
		$result2 = mysqli_query($connect, $query2); 
		
		$query3 = " insert into like_info (review_id,user_id) values('$review_id','$user_id')" ;
		$result3 = mysqli_query($connect, $query3); 
		
		$query4 = " select likes from game_user_review where review_id='$review_id'" ;
		$result4 = mysqli_query($connect, $query4);
		
		while($r=mysqli_fetch_assoc($result4)){
			echo $data=$data.$r['likes'];	
		}
			
	}
	
	

 ?> 