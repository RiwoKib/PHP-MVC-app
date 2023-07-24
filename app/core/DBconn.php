<?php

require_once 'Config.php';

/**
 * Database connection
 */

class DBConnection
{
    private $conn;
    private $errorMessage;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("Could not connect to the database: " . $this->conn->connect_error);
        }

        // echo "Connection Successfully";
        return $this->conn;
    }
    

    public function query($query, $data = array(), $data_type = "object")
    {
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            if (!empty($data)) {
                $types = str_repeat('s', count($data));
                $params = array();
                $params[] = &$types;
                foreach ($data as $key => $value) { 
                    if (is_resource($value)) {
                        $params[] = $value;
                    } else {
                        $params[] = &$data[$key];
                    }
                }
                call_user_func_array(array($stmt, 'bind_param'), $params);
            }

            if ($stmt->execute()) {
                if (stripos($query, 'INSERT') === 0 || stripos($query, 'DELETE') === 0 || stripos($query, 'UPDATE') === 0) {
                    // return the number of affected rows
                    $affectedRows = $stmt->affected_rows;
                    $stmt->close();
                    return $affectedRows;
                } else {
                    $result = $stmt->get_result();

                    if ($data_type === "object") {
                        $data = array();
                        while ($row = $result->fetch_object()) {
                            $data[] = $row;
                        }
                    } else {
                        $data = $result->fetch_all(MYSQLI_ASSOC);
                    }

                    $stmt->close();

                    if (is_array($data) && count($data) > 0) {
                        return $data;
                    }
                }
            } else {
                $this->errorMessage = "Query execution error: " . $stmt->error;
                $stmt->close();
            }
        }else {
            $this->errorMessage = "Query preparation error: " . $this->conn->error;
        }
        

        return false;
    }


    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

 
}
