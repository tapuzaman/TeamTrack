<?php 
 
    class DBOperations{
 
        private $con; 
 
        function __construct(){
 
            require_once dirname(__FILE__).'/DBConnect.php';
            $db = new DBConnect();
            $this->con = $db->connect();
        }
 
        /*CRUD -> C -> CREATE */
        
        # Creates a New User
        public function createUser($name, $email,$pass){
            if($this->isUserExist($name,$email)){
                return 0; 
            }else{
                $password = md5($pass);
                #$password =password_hash($pass, PASSWORD_DEFAULT);
                $stmt = $this->con->prepare("INSERT INTO `users`(`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL,?,?,NULL,?,NULL,NULL,NULL)");
                $stmt->bind_param("sss", $name, $email, $password);
 
                if($stmt->execute()){
                    return 1; 
                }else{
                    return 2; 
                }
            }
        }
 
        # Handles User Login
        public function userLogin($email, $pass){
            $password = md5($pass);
            #$password =password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $this->con->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
            $stmt->bind_param("ss",$email,$password);
            $stmt->execute();
            $stmt->store_result(); 
            return $stmt->num_rows > 0; 
        }
 
        # Gets a User by Email Address
        public function getUserByEmail($email){
            $stmt = $this->con->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s",$email);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }
         
        # Checks Whether The Username and Password exists or not
        private function isUserExist($name, $email){
            $stmt = $this->con->prepare("SELECT id FROM users WHERE name = ? OR email = ?");
            $stmt->bind_param("ss", $name, $email);
            $stmt->execute(); 
            $stmt->store_result(); 
            return $stmt->num_rows > 0; 
        }

        # Gets All The Tasks From Database
        public function getAllEvents(){
            $today = date("Y-m-d");
            $stmt = $this->con->prepare("select * from tasks where task_date >= ?");
            $stmt->bind_param("s", $today);
            $stmt->execute();
            return $stmt->get_result()->fetch_all();
        }
 
    }


           # public function userLogin($email, $pass){
            #$password = md5($pass);
            #$password =password_hash($pass, PASSWORD_DEFAULT);
            #$hash= $this->con->prepare("SELECT password FROM users WHERE email = ?");

            #if (password_verify($pass, $hash)) {
    		#$stmt = $this->con->prepare("SELECT id FROM users WHERE email = ?");
            #$stmt->bind_param("ss",$email,$hash);
            #$stmt->execute();
            #$stmt->store_result(); 
            #return $stmt->num_rows > 0; 
			#	} 

 #       }
 