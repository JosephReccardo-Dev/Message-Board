<!-- Chapter 6 Message Board project -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post a Message</title>
</head>
<body style="text-align: center;">
	<?php
		//Check first to see if the form has even been submitted
		if (isset($_POST["submit"])){
			$name = stripslashes($_POST["name"]);
			$subject = stripslashes($_POST["subject"]);
			$message = stripslashes($_POST["message"]);
			
			//Replace any '~' characters with '-'
			$name = str_replace("~", "-", $name);
			$subject = str_replace("~", "-", $subject);
			$message = str_replace("~", "-", $message);

			//Combine the 3 variables into 1 string
			$mesageRecord = "$name~$subject~$message\n";

			//let's create a veriable to store a new files data
			$messageFile = fopen("messages.txt", "ab");

			//Check that there are no issues with the file before we add the new message to it
			if($messageFile === False){
				echo "<h3 style='color: red;'>There was an error saving your message!</h3>";
			} else {
				fwrite($messageFile, $mesageRecord);
				fclose($messageFile);
				echo "<h3>Your message has been saved.</h3>";

			}//end of nested if...else
		}//end of main if statement
	?>

	<h1>Post New Message</h1>
	<hr/>
	<form action="PostMessage.php" method="POST">
	<label style="font-weight: bold" for="user">Users Name:</label>
		<input type="text" id="user" name="name" />
		<br/>
		<br/>
		<label style="font-weight: bold;" for="subject">Subject:</label>
		<input type="text" id="subject" name="subject" />
		<br/>
		<br/>
		<textarea name="message" rows="6" cols="80" placeholder="Your comment"></textarea>
		<br/>
		<br/>
		<input type="submit" name="submit" value="Post Message" /> &nbsp; &nbsp;<input type="reset" name="reset" value="Reset Form" />	
	</form>
	<hr/>
	<p>
		<a href="MessageBoard.php">View Messages</a>
	</p>
</body>
</html>