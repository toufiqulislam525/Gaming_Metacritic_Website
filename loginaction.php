 <?php   
	session_start();  
	$username=$_GET['username'];
	$password=$_GET['password'];
	$connect = mysqli_connect("localhost", "root", "", "meta");  
	$query = " SELECT * FROM user WHERE username='$username' AND password='$password'" ;
    $result = mysqli_query($connect, $query);  
	$data="";
     while($r=mysqli_fetch_assoc($result)){
		$data=$data.$r['user_id'];
		$_SESSION['user_id'] = $data; 
	}
	echo $data; 
	

 ?> 