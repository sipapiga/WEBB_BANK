<?php

class Transaction
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

    public function transfer($data)
    {
        // Setup query.
        $sql = 'INSERT INTO bank.transactions'
            SET 
            from_amount = :from,
            from_account= :accout_id,
            from_currency= 'SEK',
            to_amount = :to_amout,
            to_account= :to_accout,
            to_currency= "SEK",
            currency_rate = "1.000",
            date = Date();

        // Prepare query.
        $statement = $this->db->prepare($sql);

        // Bind values.
        $statement->bindValue('productCode', filter_var($data->productCode, FILTER_SANITIZE_STRING));
        $statement->bindValue('productName', filter_var($data->productName, FILTER_SANITIZE_STRING));
        $statement->bindValue('productLine', filter_var($data->productLine, FILTER_SANITIZE_STRING));
        $statement->bindValue('productScale', filter_var($data->productScale, FILTER_SANITIZE_STRING));
        $statement->bindValue('productVendor', filter_var($data->productVendor, FILTER_SANITIZE_STRING));
        $statement->bindValue('productDescription', filter_var($data->productDescription, FILTER_SANITIZE_STRING));
        $statement->bindValue('quantityInStock', filter_var($data->quantityInStock, FILTER_SANITIZE_STRING));
        $statement->bindValue('buyPrice', filter_var($data->buyPrice, FILTER_SANITIZE_STRING));
        $statement->bindValue('MSRP', filter_var($data->MSRP, FILTER_SANITIZE_STRING));

        // Execute query and return result.
        return $statement->execute();
    }
}
