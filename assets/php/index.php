<a href="../../index.html">Retour au formulaire</a>
<?php
include "dbConnect.php";
var_dump($_POST);
  if (	isset($_POST['name']) AND
  		isset($_POST['firstname']) AND
  		isset($_POST['email']) AND
        isset($_POST['file']) AND
  		isset($_POST['description'])) {

        if (empty($_POST['name']) AND
            empty($_POST['firstname']) AND
            empty($_POST['email']) AND
            empty($_POST['description'])) {
            echo "Variable empty.<br>";
        } else {
            
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
	}
?>
