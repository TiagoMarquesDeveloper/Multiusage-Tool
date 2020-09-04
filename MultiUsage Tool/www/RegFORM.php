<?php
if( $_POST )
{
  $con = mysql_connect("127.0.0.1","root","internet");

  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db("multiusagetoolDB", $con);

  $users_name = $_POST['Username'];
  $users_email = $_POST['Email'];
  $users_password = $_POST['Password'];

  $users_name = mysql_real_escape_string($users_name);
  $users_email = mysql_real_escape_string($users_email);
  $users_password = mysql_real_escape_string($users_password);

  $query = "
  INSERT INTO `multiusagetoolDB`.`Utilizador` (`IDutilizador`, `Nome`, `Password`, `email`) VALUES (NULL, '$users_name',
        '$users_password','$users_email');";

  $query2 = "SELECT * FROM multiusagetoolDB.Utilizador where Nome = '$users_name'";
  
  $result = mysql_query($query2); 		
  $number_of_rows = mysql_num_rows($result);

	if ($number_of_rows == 0) {
		mysql_query($query);
		echo "<h2>Registrado!</h2>";
	}

  mysql_close($con);
  header("location:javascript://history.go(-1)");
  exit;
}
?>