<a href="../../index.html">Retour au formulaire</a>
<?php
var_dump($_POST);
  if (	isset($_POST['name']) AND
  		isset($_POST['firstname']) AND
  		isset($_POST['email']) AND
        isset($_POST['file']) AND
  		isset($_POST['description'])) {

        if (!empty($_POST['name']) AND
            !empty($_POST['firstname']) AND
            !empty($_POST['email']) AND
            !empty($_POST['description'])) {
            
				include "dbConnect.php";

				// SANITIZE
				$name = htmlspecialchars($_POST['name']);
				$firstname = htmlspecialchars($_POST['firstname']);
				$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
				$description = htmlspecialchars($_POST['description']);
	
				// VALIDATE
				if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$errors['email'] = "This email is invalid.";
				}
			
	
				try {
					$request = $db->prepare("INSERT INTO support (`name`, `firstname`, `email`, `file`, `description`)
						VALUES ( ?, ?, ?, ?, ?)");
					$request->execute(array(
						$name,
						$firstname,
						$email,
						$_POST['file'],
						$description));
	
					echo "Your request has been successfully sent.";
				} catch (Exception $e) {
					echo $e->getMessage();
				}	

        } else {
            echo "Variable is empty.<br>";
        }
	}
?>
