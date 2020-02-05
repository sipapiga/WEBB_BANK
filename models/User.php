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
        $statement = 'SELECT *,account.id as account_id FROM users JOIN account ON users.id = account.user_id  WHERE username = :username';
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

    }

    public function getUsers($id)
    {
        $statement = 'SELECT * FROM bank.vw_users WHERE account_id = :id';
        try {
            $statement = $this->db->prepare($statement);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_OBJ);
            return $result;

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }

    }

    public function getRecipient()
    {
        $statement = 'SELECT *,account.id as account_id  FROM account JOIN users ON users.id = account.user_id';
        try {
            $statement = $this->db->prepare($statement);
            $statement->execute();
            $num = $statement->rowCount();

            if ($num > 0) {

                $recipient_arr['data'] = [];
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $recipient_list = [
                        'id' => $account_id,
                        'firstname' => $firstName,
                        'lastname' => $lastName,

                    ];
                    array_push($recipient_arr['data'], $recipient_list);
                }

                return $recipient_arr['data'];
            }

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }

    }

}
