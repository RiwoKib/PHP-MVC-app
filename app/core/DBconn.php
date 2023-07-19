<?php

require_once 'Config.php';

/**
 * Database connection
 */

class DBConnection
{
    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DBPASSWORD, DB_NAME);

        if ($this->connection->connect_error) {
            die("Could not connect to the database: " . $this->connection->connect_error);
        }
    }

    
    public function __destruct(){
        $this->connection->close();
    }

    // public function query($query, $data = array(), $data_type = "object")
    // {
    //     $stmt = $this->connection->prepare($query);

    //     if ($stmt) {
    //         if (!empty($data)) {
    //             $types = str_repeat('s', count($data));
    //             $stmt->bind_param($types, ...$data);
    //         }

    //         if ($stmt->execute()) {
    //             $result = $stmt->get_result();

    //             if ($data_type === "object") {
    //                 $data = array();
    //                 while ($row = $result->fetch_object()) {
    //                     $data[] = $row;
    //                 }
    //             } else {
    //                 $data = $result->fetch_all(MYSQLI_ASSOC);
    //             }

    //             $stmt->close();

    //             if (is_array($data) && count($data) > 0) {
    //                 return $data;
    //             }
    //         } else {
    //             $stmt->close();
    //         }
    //     }

    //     return false;
    // }
}
