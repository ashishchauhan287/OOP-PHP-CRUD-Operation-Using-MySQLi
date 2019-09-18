<?php 
	require_once 'class.php';
	if(ISSET($_POST['update'])){	
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$mem_id = $_POST['mem_id'];
		$conn = new db_class();
		$conn->update($firstname, $lastname, $mem_id);
		echo '
			<script>alert("Updated Successfully")</script>;
			<script>window.location = "index.php"</script>;
		';
	}	
?>