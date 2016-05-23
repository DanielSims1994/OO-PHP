<?php
class User_session {

    private $password;
    private $email;

    public function __construct($email, $password)
    {
        $this->setDetails($email, $password);
    }


    public function setDetails($email, $password)
    {
        $this->password = $password;
        $this->email = $email;
        $this->start_user_session();
    }


    public function start_user_session()
    {
        include ("SQL_functions.php");
        $errorMessage = "<p class= \"error_message\"> Sorry mate, that's incorrect! </p>";



        $sql = new Sql_functions();
        $records = $sql->all_user_info($this->email);

        if (!$records){
            echo $errorMessage;
        }

        elseif ($this->password == $records['password']){
            session_start();

            $_SESSION['name'] = $records ['firstname'] . " " . $records['surname'];
            $_SESSION['email'] = $records['email'];
            $_SESSION['firstname'] = $records ['firstname'];
            $_SESSION['surname'] = $records ['surname'];
            $_SESSION['age'] = $records ['age'];
            $_SESSION['status'] = $records ['status'];

            header('Location: http://localhost/Site_2/index.php');
        } else {
            echo $errorMessage;
        }
    }
}


class Sign_Up{

    private $firstname;
    private $surname;
    private $email;
    private $password;
    private $confirmPassword;
    private $defaultStatus = "User";

    public function __construct(){
        $this->setUserDetails($_POST);
    }

    public function GetDetails(){

    }
    public function setUserDetails($userDetails){

        $this->firstname = $userDetails['firstname'];
        $this->firstname = $userDetails['surname'];
        $this->firstname = $userDetails['email'];
        $this->firstname = $userDetails['password'];
        $this->firstname = $userDetails['confirmPassword'];
        $this->checkDetails();
    }

    public function checkDetails(){
        echo $this->firstname;
    }





}



?>













<?php
   /*if (isset($_POST['submit'])){
$firstname =  $_POST['firstname'];
$surname =  $_POST['surname'];
$age =  $_POST['age'];
$email =  $_POST['email'];
$password =  $_POST['password'];
$confirmpassword =  $_POST['confirmpassword'];  
validateFields($firstname, $surname, $age, $email, $password, $confirmpassword);
}
function validateFields($firstname, $surname, $age, $email, $password, $confirmpassword){
$invalid = false;
if (isset($firstname) && trim($firstname) == ""){
$invalid = true;
} else if (isset($surname) && trim($surname) == ""){
$invalid = true;
} else if (isset($age) && trim($age) == ""){
$invalid = true;
} else if (isset($email) && trim($email) == ""){
$invalid = true;
} else if (isset($password) && trim($password) == ""){
$invalid = true;
} else if (isset($confirmpassword) && trim($confirmpassword) == ""){
$invalid = true;
}
if($invalid == true){
echo "<p  class=\"issues_text\"> Please fill in all options!. </p>";
} else {
validateInput($firstname, $surname, $age, $email, $password, $confirmpassword);
}
}
function validateInput($firstname, $surname, $age, $email, $password, $confirmpassword){
$issue = "";
$issueState = false;
if($password != $confirmpassword){
$issue = $issue . " " . "<p class=\"issues_text\"> The passwords don't match!<br/> </p>";
$issueState = true;
}
if (strlen($password) <= 8 || strlen($confirmpassword) <= 8){
$issue = $issue . " " . "<p class=\"issues_text\"> The passwords must be more than 8 characters! <br/> </p>";
$issueState = true;
}
if($age < 12 || $age > 130 || !is_numeric($age)){
$issue = $issue . " " . "<p class=\"issues_text\"> The age is invalid! <br/> </p>";
$issuestate = true;
}
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
$issue = $issue . " " . "<p class=\"issues_text\"> Email addres isn't valid! <br/> </p>";
$issuestate = true;
} 
if ($issuestate == true){
echo $issue;
} else {
addUser();
after_Signup();
}
}
function addUser(){
include ("db_connect.php");
$defaultStatus = "User";

$sql = "INSERT INTO users (firstname, surname, age, email, password, status) 
VALUES (:firstname, :surname, :age, :email, :password, :status)";

$dbh->prepare($sql)->execute([
'firstname' => $_POST['firstname'],
'surname' => $_POST['surname'],
'age' => $_POST['age'],
'email' => $_POST['email'],
'password' => $_POST['password'],
'status' => $defaultStatus,
]);
session_start();
$records = $dbh->prepare('SELECT email, password, firstname, surname, age, status FROM users WHERE email = :email');
$records->bindParam(':email', $email);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
$_SESSION['name'] = $results ['firstname'] . " " . $results['surname'];
$_SESSION['email'] = $results['email'];
$_SESSION['firstname'] = $results ['firstname'];
$_SESSION['surname'] = $results ['surname'];
$_SESSION['age'] = $results ['age'];
$_SESSION['status'] = $results ['status'];
header('Location: http://localhost/website/index.php');
}*/

?>