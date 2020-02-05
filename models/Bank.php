<?php

class Bank
{
    private $db;

    public $id;
    public $date;
    public $from;
    public $to;
    public $amount;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function readTransaction($id = null)
    {
        // Setup query.
        $sql = 'SELECT * FROM bank.transactions AS t JOIN users ON users.id=t.from_account WHERE users.id = :userid';

        $statement = $this->db->prepare($sql);
        $statement->bindValue(':userid', $id, PDO::PARAM_STR);
        $statement->execute();

        $num = $statement->rowCount();

        if ($num > 0) {

            $transaction_arr['data'] = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $transaction_item = [
                    'id' => $id,
                    'date' => $date,
                    'from' => $firstName,
                    'to' => $to_account,
                    'amount' => $to_amount,
                ];
                array_push($transaction_arr['data'], $transaction_item);
            }

            return $transaction_arr['data'];
        }
    }

    public function readDepositTransaction($id = null)
    {
        // Setup query.
        $sql = 'SELECT * FROM bank.transactions AS t JOIN users ON users.id=t.to_account WHERE users.id = :userid';

        $statement = $this->db->prepare($sql);
        $statement->bindValue(':userid', $id, PDO::PARAM_STR);
        $statement->execute();

        $num = $statement->rowCount();

        if ($num > 0) {

            $transaction_arr['data'] = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $transaction_item = [
                    'id' => $id,
                    'date' => $date,
                    'from' => $from_account,
                    'to' => $firstName,
                    'amount' => $to_amount,
                ];
                array_push($transaction_arr['data'], $transaction_item);
            }

            return $transaction_arr['data'];
        }
    }


    public function transfer()
    {
        try{

            // Setup query.
            $sql = 'INSERT INTO bank.transactions (from_amount, from_account, from_currency, ' .
            'to_amount, to_account, to_currency, currency_rate, date) ' .
            'VALUES (:from_amount, :account_id, :from_currency, :to_amount, ' .
            ':to_account, :to_currency,  :currency_rate, :date)';
            
            // Prepare query.
            $statement = $this->db->prepare($sql);
    
            $statement-> bindParam(":from_amount", $this->from_amount);
            $statement-> bindParam(":account_id", $this->account_id);
            $statement-> bindParam(":to_amount", $this->to_amount);
            $statement-> bindParam(":to_account", $this->to_account);
            $statement-> bindParam(":from_currency", $this->from_currency);
            $statement-> bindParam(":to_currency", $this->to_currency);
            $statement-> bindParam(":currency_rate", $this->currency_rate);
            $statement-> bindParam(":date", $this->date);
               
            // execute query
            if ($statement->execute()) {
                return true;
            }
    
            return false;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return 'You dont have enough money';
        }

    }
}
