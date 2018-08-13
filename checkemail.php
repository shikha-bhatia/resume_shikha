<?php
	$post_data = file_get_contents("php://input");
	$data = json_decode($post_data);
	$email_id = $data->email;
	if(isset($email_id))
	{
		include "db/db_connection.php"; 
	    date_default_timezone_set('Asia/Calcutta');
		
		$result = $dbConnection->prepare("SELECT email_address FROM contact where email_address=?");
		$result->execute(array($email_id));
		$num1 = $result->rowCount();
		if($num1>0) 
		{
			$response = 1;
		} 
		else
		{
			$response = 0;
		}
	}
	else
	{
		$response = 0;
	}
    echo json_encode($response);
?>