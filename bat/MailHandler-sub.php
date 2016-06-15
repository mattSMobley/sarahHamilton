<?php
	$sbj_visitor='Newsletter subscription confirmation email from ';
	$sbj_owner='Newsletter subscription request from ';
	$header="Content-type: text/html; charset=utf-8 \r\n";

	$name=$_POST['name'];
	$email=$_POST['email'];
	$owner=$_POST['Sarah Hamilton'];
	$owner_email=$_POST['mattsmobley@gmail.com'];
	$sitename=$_POST['Sarah Hamilton Photography'];
	$sbj_visitor.=$sitename;
	$sbj_owner.=$sitename;

	$msg_visitor='<a href="http://'.$sitename.'">'.$sitename.'</a>'."\n".'<br>'.'Hi, '.$name."\n".'<br>'.'Thanks for submitting a query on our website. I will be in contact with you as soon as possible with answers to all your questions!';
	$msg_owner='<a href="http://'.$sitename.'">'.$sitename.'</a>'."\n".'<br>'.'This email has been sent via the contact form on your website. A new visitor has questions'."\n".'<br>'.'Visitor name: '.$name."\n".'<br>'.'Visitor email: '.$email."\n".'<br>';

	try{
		if(!mail($email,$sbj_visitor,$msg_visitor,$header.'From: '.$owner_email)){
			throw new Exception('mail failed');
		}else{
			echo "mail to visitor sent \n";
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}

	try{
		if(!mail($owner_email,$sbj_owner,$msg_owner,$header.'From: '.$email)){
			throw new Exception('mail failed');
		}else{
			echo "mail to owner sent";
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}
?>
