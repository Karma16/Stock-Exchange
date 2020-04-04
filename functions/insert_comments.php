 <?php 
		
	$con = mysqli_connect('localhost','root','');

	if(!$con)
	{
		echo ('Not Connected To Server');
	}

	if(!mysqli_select_db($con,'stock'))
	{
		echo ('Database Not Selected');
	}

	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_comment = $_POST['user_comment'];
		
	$sql = "INSERT INTO COMMENTS (user_name, user_email,user_comment) VALUES ('$user_name', '$user_email', '$user_comment')";

?>
<html>

		alert("Submit");
    	redirect("contectUs.php");
 </html>
