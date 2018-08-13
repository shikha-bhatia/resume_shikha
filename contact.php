<?php
	error_reporting(0);
	$post_data = file_get_contents("php://input");
	$data = json_decode($post_data);
	$name = $data->name;
	$email_id = $data->email;
	$mobile_no = $data->mobile;
	$message = $data->message;
	if(isset($name) && isset($email_id) && isset($mobile_no) && isset($message))
	{
		$msg = "Thank you Sir/Madam ".$name." ,for contacting. For any queries call 7381408658. Have a great day.";
		include "db/db_connection.php"; 
	    date_default_timezone_set('Asia/Calcutta');
		
		$result = $dbConnection->prepare("INSERT INTO contact(name,email_address,mobile_no,message)VALUES(?,?,?,?)");
		$result->execute(array($name,$email_id,$mobile_no,$message));
		if($result) 
		{
			$response = 1;
			$to = "saha.santanu5@gmail.com";
			$from = "noreply@shikhawebhost.net23.net";
			$email_subject = "Website Contact Form: ".$name;
			$email_body = '<p><strong>You have received a new message from your website contact form.</p></strong><p>Here are the details:</p><p>Name:' .$name.'</p><p>Email: '.$email_id.'</p><p>Phone: '.$mobile_no.'</p><p>Message: '.$message.'</p><p><strong>This is an auto generated mail. Do not reply for this!!</p><strong>';
			$email_subject1 ="Thank you for Contacting";
			$email_body1 = '<p>I have recieved your message<strong>' .$name.'</strong></p><p>I will contact you shortly...</p><p><strong>This is an auto generated mail. Do not reply for this!!<strong></p>'; 
			$headers1 = "MIME-Version: 1.0" . "\r\n";
			$headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers1 .= "Reply-To:" .$email_id."\n";
			$headers1 .= "From: ".$from; 
			$headers2 = "MIME-Version: 1.0" . "\r\n";
			$headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers2 .= "Reply-To: ".$to."\n";
			$headers2 .= 'From: '.$from;
			mail($to,$email_subject,$email_body,$headers1);
			mail($email_id,$email_subject1,$email_body1,$headers2);
			
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