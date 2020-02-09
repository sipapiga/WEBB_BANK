<?php

class Bank
{
    private $db;

    public $id;
    public $date;
    public $from;
    public $to;
    public $amount;
    public $balance;
    public $num;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function readWithdrawalTransaction($id = null)
    {
        try {

            // Setup query.
            $sql = 'SELECT * FROM bank.transactions AS t
            JOIN account ON account.id =t.from_account
            JOIN users ON account.user_id = users.id
            WHERE account.id = :account_id';

            $statement = $this->db->prepare($sql);
            $statement->bindValue(':account_id', $id, PDO::PARAM_STR);
            $statement->execute();

            $num = $statement->rowCount();

            if ($num > 0) {

                $transaction_arr['data'] = [];
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $transaction_item = [
                        'id' => $transaction_id,
                        'date' => $date,
                        'from' => $firstName,
                        'to' => $to_account,
                        'amount' => $to_amount,
                    ];
                    array_push($transaction_arr['data'], $transaction_item);
                }

                return $transaction_arr['data'];
            }
        } catch (\Exception $error) {
            throw new \Exception("Failed : " . $error->getMessage());
        }

    }

    public function readDepositTransaction($id = null)
    {
        try {
            // Setup query.
            $sql = 'SELECT * FROM bank.transactions AS t
        JOIN account ON account.id =t.to_account
        JOIN users ON account.user_id = users.id
        WHERE account.id = :account_id';

            $statement = $this->db->prepare($sql);
            $statement->bindValue(':account_id', $id, PDO::PARAM_STR);
            $statement->execute();

            $num = $statement->rowCount();

            if ($num > 0) {

                $transaction_arr['data'] = [];
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $transaction_item = [
                        'id' => $transaction_id,
                        'date' => $date,
                        'from' => $from_account,
                        'to' => $firstName,
                        'amount' => $to_amount,
                    ];
                    array_push($transaction_arr['data'], $transaction_item);
                }

                return $transaction_arr['data'];
            }
        } catch (\Exception $error) {
            throw new \Exception("Failed : " . $error->getMessage());
        }

    }

    public function transfer()
    {
        try {

            // Setup query.
            $sql = 'INSERT INTO bank.transactions (from_amount, from_account, from_currency, ' .
                'to_amount, to_account, to_currency, currency_rate, date) ' .
                'VALUES (:from_amount, :account_id, :from_currency, :to_amount, ' .
                ':to_account, :to_currency,  :currency_rate, :date)';

            // Prepare query.
            $statement = $this->db->prepare($sql);
            // sanitize
            $this->from_amount = htmlspecialchars(strip_tags($this->from_amount));
            $this->to_amount = htmlspecialchars(strip_tags($this->to_amount));
            $this->to_account = htmlspecialchars(strip_tags($this->to_account));

            $statement->bindParam(":from_amount", $this->from_amount);
            $statement->bindParam(":account_id", $this->account_id);
            $statement->bindParam(":to_amount", $this->to_amount);
            $statement->bindParam(":to_account", $this->to_account);
            $statement->bindParam(":from_currency", $this->from_currency);
            $statement->bindParam(":to_currency", $this->to_currency);
            $statement->bindParam(":currency_rate", $this->currency_rate);
            $statement->bindParam(":date", $this->date);

            $balance = $this->getUserBalance($this->account_id);

            if ($balance['balance'] > $this->from_amount) {
                // execute query
                $statement->execute();
                return true;
            } else {
                return false;
            }

        } catch (\Exception $error) {
            throw new \Exception("Failed : " . $error->getMessage());
        }

    }

    public function getUserBalance($id)
    {
        $sql = "SELECT balance FROM bank.vw_users WHERE account_id = :id";

        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
