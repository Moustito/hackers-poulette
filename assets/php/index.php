<a href="../../index.html">Retour au formulaire</a>
<?php
  if (	isset($_POST['name']) AND
  		isset($_POST['firstname']) AND
  		isset($_POST['email']) AND
  		isset($_POST['description'])) {

        if (!(empty($_POST['name'])) AND
            !(empty($_POST['firstname'])) AND
            !(empty($_POST['email'])) AND
            !(empty($_POST['description']))) {
			
				// SANITIZE
				$name = htmlspecialchars($_POST['name']);
				$firstname = htmlspecialchars($_POST['firstname']);
				$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
				$description = htmlspecialchars($_POST['description']);
	
				// VALIDATE
				if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$errors['email'] = "This email is invalid.";
				}

				include "uploadPicture.php";
				$uploadOk = uploadPicture();
				include "dbConnect.php";

				if ($uploadOk == 1) {
				try {
					$request = $db->prepare("INSERT INTO support (`name`, `firstname`, `email`, `file`, `description`)
						VALUES ( ?, ?, ?, ?, ?)");
					$request->execute(array(
						$name,
						$firstname,
						$email,
						$_FILES['file']['name'],
						$description));
	
					echo "Your request has been successfully sent.";
				} catch (Exception $e) {
					echo $e->getMessage();
				}
				} else {
					echo "Your request has been NOT successfully sent.";
				}

        } else {
            echo "Variable is empty.<br>";
        }
	}
?>
