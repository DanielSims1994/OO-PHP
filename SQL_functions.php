

<?php
class Sql_functions{

	public function all_user_info($email)
	{
		include("db_connect.php");
		$no_results = "No results in database for user.";


        $records = $dbh->prepare('SELECT email, password, firstname, surname, age, status FROM users WHERE email = :email');
        $records->bindParam(':email', $email);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        return $results;
	}
}
?>