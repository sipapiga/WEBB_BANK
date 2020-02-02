<?php
session_start();
include 'Database.php';
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function login($data)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');
        // Bind values
        $this->db->bind(':username', $data['username']);
        // Execute

        $result = $this->db->single();
        if (empty($result)) {
            return false;
        }
        
        if (($data['password']== $result->password)) {
            return $result;
        } else {
            return false;
        }
    }

    public function logout()
    {
        unset($_SESSION['username']);
        session_destroy();
        header('Location: /WEBB_BANK/index.php');
    }

    public function getUsers(){
        $this->db->query('SELECT * FROM users');
  
        $results = $this->db->resultSet();
  
        return $results;
      }
}
