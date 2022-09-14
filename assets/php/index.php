<?php
header('Location: ../../index.html');
include "dbConnect.php";

  if (	isset($_POST['name']) AND
  		isset($_POST['firstname']) AND
  		isset($_POST['email']) AND
  		// isset($_POST['file']) AND
  		isset($_POST['description'])) {

			try {
			    $request = $db->prepare("INSERT INTO support (`name`, `firstname`, `email`, `file`, `description`)
					VALUES ( ?, ?, ?, ?, ?)");
			    $request->execute(array(
				    $_POST['name'],
				    $_POST['firstname'],
				    $_POST['email'],
				    $_POST['file'],
				    $_POST['description']));

			    echo "Your request has been successfully sent.";
		    } catch (Exception $e) {
			    echo $e->getMessage();
		    }
	}
exit();
?>
