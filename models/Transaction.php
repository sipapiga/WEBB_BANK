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
        $this->db = $database;
    }

/*     public function readTransaction()
{
$this->db->query('SELECT * FROM bank.transactions AS t JOIN users ON users.id WHERE users.id = :userid');
$this->db->bind(':userid',$_SESSION['user_id']);

$results = $this->db->resultSet();

return $results;
} */

    public function readTransaction($id = null, $limit = null)
    {
        // Setup query.
        $sql = 'SELECT * FROM bank.transactions AS t JOIN users ON users.id';
        $parameters = null;

        if ($id !== null) {
            // If caller has provided id, then let's just look for that one product.
            $sql .= " WHERE users.id = :userid ";
            $parameters = [':userid' => $id];
        } elseif ($limit !== null) {
            // If caller want's to limit the number of products.
            $sql .= ' LIMIT ' . $limit;
        }

        $statement = $this->db->query($sql);
        $statement = $this->db->bind(':userid', $id);
       
        $transaction_arr['data'] = [];
        while ($row = $statement->resultSet()) {
            // Extract $row['productCode'] to $productCode etc.
            extract($row);

            // Setup structure for product item.
            $transaction_item = [
                'id' => $id,
                'date' => $date,
                'from' => $firstName,
                'to' => $to_account,
                'amount' => $to_amount,
            ];

            // Add product item to products array.
            array_push($transaction_arr['data'], $transaction_item);
        }

        return $transaction_arr['data'];
    }
}
