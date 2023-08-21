<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Message Board</title>
</head>
<body style="background-color: lightcyan;">
	<h1>Message Board</h1>
	<?php
	// first check if there is even file data to work with
		if(file_exists("messages.txt") === false || 
			filesize("messages.txt") === 0){
			echo "<p>Sorry, there are no messages posted.</p>";
		} else {
			$messageArray = file("messages.txt");
			echo "<table style='background-color: lightgray;' border='1' width='100%'>\n";
			//variable that determines the total messages overall
			$count = count($messageArray);

			//loop through each post in the messageArray and build a table row
			for ($i = 0; $i < $count; ++$i) {
				$currMsg = explode("~", $messageArray[$i]);

				echo "<tr>\n";

				echo "<th width='5%''>", ($i+1), "</th>\n";

				echo "<td width='95%'>Name: ", htmlentities($currMsg[0]), "<br/>\n";
				echo "<span style='font-weight: bold; text-decoration: underline'>Subject:</span> ", htmlentities($currMsg[1]), "<br/>\n";
				echo "<strong>Message: </strong><br/>", htmlentities($currMsg[2]), "</td>\n";
				echo "</tr>\n";
			}//end of FOR loop
			echo "</table>\n";
		}//End of if/else

	?>

	<p><a href="PostMessage.php">Post New Message</a>
	</p>
</body>
</html>