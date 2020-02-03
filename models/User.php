<?php
class User
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
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

      public function getUsers($id){
        $this->db->query('SELECT * FROM bank.vw_users WHERE id = :id');
        $this->db->bind(':id', $id);
  
        $result = $this->db->single();
  
        return $result;
      }
}
