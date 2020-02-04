<?php
class User
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function login($data)
    {
        $statement = 'SELECT * FROM users WHERE username = :username';
        try {
            $statement = $this->db->prepare($statement);
            $statement->bindValue(':username', $data['username'], PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_OBJ);
            if (empty($result)) {
                return false;
            }

            if (($data['password'] == $result->password)) {
                return $result;
            } else {
                return false;
            }

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
/*
$this->db->query('SELECT * FROM users WHERE username = :username');
// Bind values
$this->db->bind(':username', $data['username']);
// Execute

$result = $this->db->single();
if (empty($result)) {
return false;
}

if (($data['password'] == $result->password)) {
return $result;
} else {
return false;
} */
    }

    public function getUsers($id)
    {
        $statement = 'SELECT * FROM bank.vw_users WHERE id = :id';
        try {
            $statement = $this->db->prepare($statement);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_OBJ);
            return $result;

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }

        /*      $this->db->query('SELECT * FROM bank.vw_users WHERE id = :id');
    $this->db->bind(':id', $id);

    $result = $this->db->single();

    return $result; */
    }
}
