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
        include("db_connect.php");

        $sql_stmt = new Sql_functions();
        $result = $sql_tmt->all_user_info();
        var_dump($result);
    }
}   
?>













<?php
    
/*    private $password;

    private function setPassword($password){
        $this->password = $password;
    }


    private function login($email){
        include("db_connect.php");

        $records = $dbh->prepare('SELECT email, password, firstname, surname, age, status FROM users WHERE email = :email');
        $records->bindParam(':email', $email);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        if($results["password"] === $this->password):
            $_SESSION['name'] = $results ['firstname'] . " " . $results['surname'];
            $_SESSION['email'] = $results['email'];
            $_SESSION['firstname'] = $results ['firstname'];
            $_SESSION['surname'] = $results ['surname'];
            $_SESSION['age'] = $results ['age'];
            $_SESSION['status'] = $results ['status'];
            header('Location: http://localhost/Site_2/index.php');
            exit;
        else:
            $errMsg .= '<p class="issues_text"> Username and Password are not found<br> </p>';
        endif;
    }

}*/
?>